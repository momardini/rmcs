<?php

namespace App\Console\Commands;

use App\Models\Calendar;
use App\Models\Employee;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Console\Command;

class CalendarFillCommand extends Command
{
    protected $signature = 'calendar:fill';

    protected $description = 'fill calender for current month';

    public function handle()
    {
        $month = Carbon::now(); //->subMonths(1);//addMonths(1);
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();
        $period = CarbonPeriod::create($start, $end);
        foreach ($period as $date) {
            $dt = $date->dayOfWeek;
            $employees = Employee::where('active', '=', 1)->whereHas('weekdays', function ($query) use ($dt) {
                $query->where('pid', '=', strval($dt));
            })->get();
            foreach ($employees as $employee) {
                $event = new Calendar([
                    'user_id' => $employee->user->id,
                    'working_day' => $date,
                    'active' => 1,
                ]);
                $event->save();
            }
        }
        return "calender created for ".$month->toString();
    }
}
