<?php

namespace App\Jobs;

use App\Service\Helper;
use App\Service\SmsService\SmsService;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    public function __construct(
        protected array  $users,
        protected string $message,
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (!empty($this->users)) {

            $phones = array_map(function ($user) {
                return Helper::validatePhone($user["phone"]);
            }, $this->users);

            $sendSmsResult = SmsService::sendSms($phones, $this->message);

            $insert = collect($this->users)->map(function ($item) use ($sendSmsResult) {
                return [
                    "user_id" => $item["id"],
                    "status" => $sendSmsResult["status"],
                    "status_code" => $sendSmsResult["code"],
                    "message_id" => $sendSmsResult["messageId"],
                    "message" => $this->message,
                    "send_date" => now(),
                ];
            })->toArray();

            DB::table("sms")->insert($insert);
        }
    }
}
