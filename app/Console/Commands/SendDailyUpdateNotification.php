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
    public function handle()
    {
        $dailyUpdates = DailyUpdate::where('next_call_date', now()->format('Y-m-d'))->get();
        $dailyUpdates->each(function (DailyUpdate $dailyUpdate) {
            $recipient = $dailyUpdate->lead->user;
            Notification::make()
                ->title('Daily Update')
                ->body("You have a daily update for {$dailyUpdate->lead->name} at {$dailyUpdate->next_call_date} with the following comment: {$dailyUpdate->comment}")
                ->sendToDatabase($recipient);
        });
    }
}
