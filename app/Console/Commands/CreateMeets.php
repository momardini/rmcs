<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\GoogleCalendar\Event;

class CreateMeets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:meet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Google Meet';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//create a new event
        $event = new Event;

        $event->name = 'A new event';
        $event->description = 'Event description';
        $event->startDateTime = Carbon::now();
        $event->endDateTime = Carbon::now()->addHour();
        $event->addAttendee([
            'email' => 'john@example.com',
            'name' => 'John Doe',
            'comment' => 'Lorum ipsum',
        ]);
        $event->addAttendee(['email' => 'saeed.work@gmail.com']);
        $newEvent = $event->save();

        info($newEvent->hangoutLink);
        return 1;
    }
}

