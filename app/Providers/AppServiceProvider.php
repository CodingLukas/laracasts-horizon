<?php

namespace App\Providers;

use App\Mail\JobFailedMailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Events\JobFailed;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::failing(function (JobFailed $event) {
            Log::info('WORKED!');
            // $event->connectionName
            // $event->job
            // $event->exception
            Mail::to('test@gmail.com')->send(new JobFailedMailable($event));
        });
    }
}
