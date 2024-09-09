<?php

namespace App\Events;

use App\Jobs\SendSmsJob;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\LazyCollection;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class SmsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private array $return = [];

    public function __construct(
        protected $users = null,
        protected $message = null,
        protected $model = null,
        protected $batch = null
    )
    {
        $this->return = ['builder', $this->users];
    }

    protected function process(): array
    {
        return $this->return;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws \Throwable
     */
    public function handle($batch = false): void
    {
        if ($this->batch === true) $batch = true;

        list($type, $users) = $this->process();

        if ($type === 'builder') {
            ini_set('memory_limit', '2048M');

            $jobs = $users
                ->lazy()
                ->chunk(250)
                ->map(function (LazyCollection $users) {
                    return $users;
                });

            if ($batch === true) {
                Bus::batch($jobs->map(function ($users) {
                    return new SendSmsJob($users->toArray(), $this->message);
                }))->name('send-sms')->dispatch();
            } else {
                foreach ($jobs->toArray() as $users) {
                    dispatch_sync(new SendSmsJob($users, $this->message));
                }
            }
        }
    }

}
