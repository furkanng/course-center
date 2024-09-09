<?php

use App\Events\SmsEvent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get("furkan", function () {

    $users = User::query()->where("role","admin")->get();
    event(
        new SmsEvent(
            $users, "test mesajı 3 furkanng",
            User::class,
            true
        )
    );

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
