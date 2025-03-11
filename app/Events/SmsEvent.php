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
    }

    protected function process(): array
    {
        return ['builder', $this->users];
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

            // Kullanıcıların koleksiyon olduğunu kontrol et
            if (!is_object($users) || !method_exists($users, 'lazy')) {
                // Eğer koleksiyon değilse, koleksiyona çevir
                if (is_array($users)) {
                    $users = collect($users);
                } else {
                    // Tek bir kullanıcı ise, onu içeren bir koleksiyon oluştur
                    $users = collect([$users]);
                }
            }

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
