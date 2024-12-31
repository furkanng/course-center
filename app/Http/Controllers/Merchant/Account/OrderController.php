<?php

namespace App\Http\Controllers\Merchant\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Service\Helper;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('merchant.pages.account.order.index');
    }


    public function billing($orderId): View
    {
        auth()->user()->orders()->findOrFail($orderId);

        $order = Order::query()->findOrFail($orderId);
        return view('merchant.pages.account.order.edit', compact('order'));
    }

    public function payment($orderId): View
    {
        auth()->user()->orders()->findOrFail($orderId);

        $order = Order::query()->findOrFail($orderId);
        return view('merchant.pages.account.order.payment', compact('order'));
    }

    public function paymentPost(Request $request, $orderId)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "address" => "required|string",
            "phone" => "required",
            "postal_code" => "required",
            "city" => "required",
            "district" => "required",
        ]);

        auth()->user()->orders()->findOrFail($orderId);

        $shippingAddress = [
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "address" => $request->get("address"),
            "city" => $request->get("city"),
            "district" => $request->get("district"),
            "postal_code" => $request->get("postal_code"),
            "phone" => $request->get("phone"),
            "order_notes" => $request->get("notes"),
        ];

        $order = Order::query()->findOrFail($orderId);

        $orderId = Helper::generateRandomCode();

        $order->forceFill([
            "code" => $orderId,
            "shipping_address" => json_encode($shippingAddress),
        ])->save();

        ## 1. ADIM için örnek kodlar ##

        ####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
        #
        ## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
        $merchant_id = config('paytr.merchant_id');
        $merchant_key = config('paytr.merchant_key');
        $merchant_salt = config('paytr.merchant_salt');

        #
        ## Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
        $email = $request->get("email");
        #
        ## Tahsil edilecek tutar.
        $payment_amount = $order->price * 100; //9.99 için 9.99 * 100 = 999 gönderilmelidir.
        #
        ## Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
        $merchant_oid = $order->code;
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
        $user_name = $request->get("name");
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız adres bilgisi
        $user_address = $request->get("address") . $request->get("city") . $request->get("district") . $request->get("postal_code");
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız telefon bilgisi
        $user_phone = Helper::validatePhone($request->get("phone"));
        #
        ## Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi onaylayacağınız sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi onaylayacağız sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_ok_url = Helper::parseUrl(config("app.url") . "/user/merchant/finance/plans/payment/success");
        #
        ## Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_fail_url = Helper::parseUrl(config("app.url") . "/user/merchant/finance/plans/payment/error");
        #
        ## Müşterinin sepet/sipariş içeriği
        $user_basket = base64_encode(json_encode(array(
            array($order->plan_type->label(), $order->price, $order->piece)
        )));


        #
        /* ÖRNEK $user_basket oluşturma - Ürün adedine göre array'leri çoğaltabilirsiniz
        $user_basket = base64_encode(json_encode(array(
            array("Örnek ürün 1", "18.00", 1), // 1. ürün (Ürün Ad - Birim Fiyat - Adet )
            array("Örnek ürün 2", "33.25", 2), // 2. ürün (Ürün Ad - Birim Fiyat - Adet )
            array("Örnek ürün 3", "45.42", 1)  // 3. ürün (Ürün Ad - Birim Fiyat - Adet )
        )));
        */
        ############################################################################################

        ## Kullanıcının IP adresi
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }

        ## !!! Eğer bu örnek kodu sunucuda değil local makinanızda çalıştırıyorsanız
        ## buraya dış ip adresinizi (https://www.whatismyip.com/) yazmalısınız. Aksi halde geçersiz paytr_token hatası alırsınız.
        //$user_ip = $ip;
        $user_ip = $ip;
        ##

        ## İşlem zaman aşımı süresi - dakika cinsinden
        $timeout_limit = "5";

        ## Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde 1 olarak bırakın. Daha sonra 0 yapabilirsiniz.
        $debug_on = 1;

        ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
        $test_mode = 0;

        $no_installment = 1; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın

        ## Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
        ## Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
        $max_installment = 0;

        $currency = "TL";

        ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        $hash_str = $merchant_id . $user_ip . $merchant_oid . $email . $payment_amount . $user_basket . $no_installment . $max_installment . $currency . $test_mode;
        $paytr_token = base64_encode(hash_hmac('sha256', $hash_str . $merchant_salt, $merchant_key, true));
        $data_vals = array(
            'merchant_id' => $merchant_id,
            'user_ip' => $user_ip,
            'merchant_oid' => $merchant_oid,
            'email' => $email,
            'payment_amount' => $payment_amount,
            'paytr_token' => $paytr_token,
            'user_basket' => $user_basket,
            'debug_on' => $debug_on,
            'no_installment' => $no_installment,
            'max_installment' => $max_installment,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'merchant_ok_url' => $merchant_ok_url,
            'merchant_fail_url' => $merchant_fail_url,
            'timeout_limit' => $timeout_limit,
            'currency' => $currency,
            'test_mode' => $test_mode
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_vals);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        // XXX: DİKKAT: lokal makinanızda "SSL certificate problem: unable to get local issuer certificate" uyarısı alırsanız eğer
        // aşağıdaki kodu açıp deneyebilirsiniz. ANCAK, güvenlik nedeniyle sunucunuzda (gerçek ortamınızda) bu kodun kapalı kalması çok önemlidir!
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result = @curl_exec($ch);

        if (curl_errno($ch))
            die("PAYTR IFRAME connection error. err:" . curl_error($ch));

        curl_close($ch);

        $result = json_decode($result, 1);

        if ($result['status'] == 'success')
            $token = $result['token'];
        else
            die("PAYTR IFRAME failed. reason:" . $result['reason']);

        return view("merchant.pages.finance.payment.index", compact("token"));
    }
}
