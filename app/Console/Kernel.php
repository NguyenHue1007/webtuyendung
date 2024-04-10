<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\EmployerPackageSubscription;
use App\Events\PackageExpired;
use Carbon\Carbon;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {

            $expiredSubscriptions = EmployerPackageSubscription::where('created_at', '<', Carbon::now()->subDays(30))
            ->where('status', 'on')
            ->get();

            foreach ($expiredSubscriptions as $subscription) {
                event(new PackageExpired($subscription));
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
