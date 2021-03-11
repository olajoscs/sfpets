<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    private const LOG_PATH = 'storage/logs/';
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];


    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $time = (new \DateTime())->format('Y-m-d-H-i-s');

        $schedule
            ->command('log:clean')
            ->dailyAt('00:00');

        $schedule
            ->command('user:invalidate')
            ->dailyAt('0:05')
            ->sendOutputTo(self::LOG_PATH . 'user-invalidate-' . $time);

        $schedule
            ->command('token:invalidate')
            ->dailyAt('0:10')
            ->sendOutputTo(self::LOG_PATH . 'token-invalidate-' . $time);

        $schedule
            ->command('token:remove')
            ->dailyAt('0:15')
            ->sendOutputTo(self::LOG_PATH . 'token-remove-' . $time);

        $schedule
            ->command('user:remove')
            ->dailyAt('0:20')
            ->sendOutputTo(self::LOG_PATH . 'user-remove-' . $time);
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
