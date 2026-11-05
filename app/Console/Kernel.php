<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Common;
use Illuminate\Support\Facades\Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('app:send-payout')->monthlyOn(1, '09:00');
        $schedule->command('app:update-commission')->monthly();
        $schedule->command('app:update-plan')->everyMinute()->withoutOverlapping();
        $schedule->command('app:update-trending-searches')->everyTenMinutes()->withoutOverlapping();
        $schedule->command('app:generate-summary')->weeklyOn(1, '00:00')->then(function () {
            Artisan::call('app:generate-sections');
        });
        $schedule->command('app:expire-coupon')->daily();

        $schedule->call(function () {
            $common = new Common();
            $common->TrendingContentSendNoti();
            $common->BookmarkContentSendNoti();
        })->dailyAt('10:00');
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
