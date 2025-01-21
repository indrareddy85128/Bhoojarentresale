<?php

namespace App\Console\Commands;

use App\Models\DailyUpdate;
use Filament\Notifications\Notification;
use Illuminate\Console\Command;

class SendDailyUpdateNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-daily-update-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    // public function handle()
    // {
    //     $dailyUpdates = DailyUpdate::where('next_call_date', now()->format('Y-m-d'))->where('next_call_time', now()->format('H:i'))->get();
    //     $dailyUpdates->each(function (DailyUpdate $dailyUpdate) {
    //         $recipient = $dailyUpdate->lead->user;
    //         Notification::make()
    //             ->title('Daily Update')
    //             ->body("You have a daily update for {$dailyUpdate->lead->name} at {$dailyUpdate->next_call_date} with the following comment: {$dailyUpdate->comment}")
    //             ->sendToDatabase($recipient);
    //     });
    // }

    public function handle()
    {

        $todayDate = now()->format('Y-m-d');
        $currentTime = now()->format('H:i');

        $dailyUpdates = DailyUpdate::where('next_call_date', $todayDate)
            ->where('next_call_time', $currentTime)
            ->get();

        $dailyUpdates->each(function (DailyUpdate $dailyUpdate) {
            $recipient = $dailyUpdate->lead->user;

            Notification::make()
                ->title('Daily Update')
                ->body("You have a call scheduled with {$dailyUpdate->lead->name} on {$dailyUpdate->next_call_date} at {$dailyUpdate->next_call_time}.")
                ->sendToDatabase($recipient);
        });
    }
}
