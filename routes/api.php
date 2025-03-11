<?php

use App\Events\SmsEvent;
use App\Http\Controllers\Merchant\Finance\PaymentController;
use App\Mail\InfoMail;
use App\Mail\PaymentErrorMail;
use App\Mail\PaymentSuccessMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'payment'], function () {

    Route::post('notification', [PaymentController::class, 'notification']);

});


Route::get("furkan", function () {
/*
    $user = User::query()->findOrFail(5);
    event(
        new SmsEvent(
            $user, "Hangiderslig kullanıcı kayıt oldu : $user->name",
            User::class,
            false
        )
    );

    return response()->json([
        "message" => "ok",
    ]);
*/
});

/*
public function sendSms()
    {
        $client = new Client();

        $response = $client->request('POST', 'https://api.netgsm.com.tr/sms/send/get', [
            'form_params' => [
                'usercode' => '8503057510',
                'password' => 'F4.U53HF',
                'gsmno' => '5377245338',
                'message' => 'merhaba test',
                'msgheader' => '8503057510',
                'filter' => '0',
                'dil' => 'TR',
            ],
            'timeout' => 0,
            'allow_redirects' => true,
        ]);

        return $response->getBody()->getContents();
    }
 */
