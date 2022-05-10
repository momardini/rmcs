<?php

namespace App\Console\Commands;

use App\Enums\ScheduleType;
use App\Models\Analytic;
use App\Models\AnalyticInterview;
use App\Models\Appointment;
use App\Models\Calendar;
use App\Models\Clinic;
use App\Models\Employee;
use App\Models\Interview;
use App\Models\Meet;
use App\Models\Patient;
use App\Models\Recipe;
use App\Models\Sign;
use App\Models\Station;
use App\Models\Upgrade;
use App\Models\User;
use DB;
use Illuminate\Console\Command;
use TCG\Voyager\Models\Role;

class UpgradeCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:tonew';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate old database with new one';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $perpage = 10000;
        // Role
        $role_count = Role::all()->count();
        if ($role_count < 11) {
            $old_models = Role::on('mysql2')->where('id', '>=', 3)->get();
            foreach ($old_models as $old_row) {
                $new_record = new Role();
                $new_record = $old_row->replicate();
                $new_record->save();
            }
        }
        //        Station
        $station_count = Station::all()->count();
        if ($station_count < 8) {
            $old_models = Station::on('mysql2')->where('id', '>=', 1)->get();
            foreach ($old_models as $old_row) {
                $new_record = new Station(
                    [
                        'id' => $old_row->id,
                        'title' => $old_row->title,
                        'address' => $old_row->location,
                        'mobile' => $old_row->mobile,
                        'logo' => $old_row->logo,
                        'active' => $old_row->active,
                    ]
                );
                $new_record->save();
            }
        }
        // User
        $user_count = User::all()->count();
        if ($user_count < 52) {
            $old_models = User::on('mysql2')->where('id', '>=', 2)->get();
            foreach ($old_models as $old_row) {
                $new_record = new User([
                    'id' => $old_row->id,
                    'role_id' => $old_row->role_id,
                    'name' => $old_row->name,
                    'email' => $old_row->email	,
                    'station_id' => $old_row->station_id,
                    'avatar' => $old_row->avatar	,
                    'email_verified_at' => $old_row->email_verified_at,
                    'password' => $old_row->password,
                    'remember_token' => $old_row->remember_token,
                    'settings' => $old_row->settings	,
                    'created_at' => $old_row->created_at	,
                    'updated_at' => $old_row->updated_at	,
                    'active' => $old_row->active,
                ]
                );
                $new_record->save();
            }
            return 0;
        }

//        Clinic
        $step = Upgrade::where('model','Clinic')->first();
        $old_models = Clinic::on('mysql2')->where('id', '>=', $step->row_id)->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = new Clinic(
                [
                    'id' => $old_row->id,
                    'title' => $old_row->title,
                    'description' => $old_row->description,
                ]
            );
            $new_record->save();
            $step->increment('row_id');
        }
        // return 0;
        // Patient

        $step = Upgrade::where('model','Patient')->first();
        /** @var Patient */
        $old_models = Patient::on('mysql2')->where('id', '>', $step->row_id)->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = new Patient(
                [
                    'id' => $old_row->id,
                    'full_name' => $old_row->full_name,
                    'station_id' => $old_row->station_id,
                    'birth' => $old_row->birth,
                    'status' => $old_row->status,
                    'city' => $old_row->city,
                    'address' => $old_row->address,
                    'gender' => $old_row->sex,
                    'marital' => $old_row->marital,
                    'children' => $old_row->children,
                    'phone' => $old_row->phone,
                    'blood_group' => $old_row->blood,
                    'birth_place' => $old_row->birth_place,
                    'work' => $old_row->work,
                    'previous_diseases' => $old_row->previous_diseases,
                    'family_diseases' => $old_row->family_diseases,
                    'previous_surgery' => $old_row->previous_surgery,
                    'previous_accidents' => $old_row->previous_accidents,
                    'allergies' => $old_row->allergies,
                    'disabilities' => $old_row->disabilities,
                    'created_at' => $old_row->created_at,
                    'updated_at' => $old_row->updated_at,
                ]
            );
            $new_record->save();
            $step->increment('row_id');

        }
        $last = ($old_models->last())?$old_models->last()->id:50000;
        $step->update(['row_id'=> $last]);
        $step->save();


        // employee
        $step = Upgrade::where('model','Employee')->first();
        /** @var Employee */
        $old_models = Employee::on('mysql2')->where('id', '>', $step->row_id)->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = new Employee(
                [
                    'id' => $old_row->id,
                    'user_id' => $old_row->user_id,
                    'mobile' => $old_row->mobile,
                    'address' => $old_row->location,
                    'specialist' => $old_row->specialist,
                    'education' => $old_row->education,
                    'work' => $old_row->work,
                    'photo' => $old_row->photo,
                    'salary' => ($old_row->daily_salary)?$old_row->daily_salary:$old_row->month_salary,
                    'schedule_type' => ($old_row->daily_salary)?ScheduleType::DAILY:ScheduleType::MONTHLY,
                    'docs' => $old_row->docs,
                    'vacation' => ($old_row->vacation)?$old_row->vacation:0,
                    'active' => $old_row->active,
                ]
            );
            $new_record->save();
        }
        $last = ($old_models->last())?$old_models->last()->id:50000;
        $step->update(['row_id'=> $last]);
        $step->save();

        // meet
        $step = Upgrade::where('model','Meet')->first();
        /** @var Employee */
        $old_models = Employee::on('mysql2')->where('id', '>', $step->row_id)->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = new Meet(
                [
                    'id' => $old_row->id,
                    'employee_id' => $old_row->id,
                    'jwtToken' => ($old_row->jwtToken)?$old_row->jwtToken:'',
                    'zoomUserId' => ($old_row->zoomUserId)?$old_row->zoomUserId:'',
                ]
            );
            $new_record->save();
        }
        $last = ($old_models->last())?$old_models->last()->id:50000;
        $step->update(['row_id'=> $last]);
        $step->save();

        // Calender
        $step = Upgrade::where('model','Calendar')->first();
        /** @var Collection */
        $old_models = DB::connection('mysql2')->table('events')->where('id', '>', $step->row_id)->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = new Calendar(
                [
                    'id' => $old_row->id,
                    'user_id' => $old_row->doctor_id,
                    'working_day' => $old_row->working_day,
                    'active' => $old_row->active,
                ]
            );
            $new_record->save();
        }
        $last = ($old_models->last())?$old_models->last()->id:50000;
        $step->update(['row_id'=> $last]);
        $step->save();

        // Appointment
        DB::connection('mysql2')->statement('UPDATE `appointments` set patient_id = 228 WHERE `patient_id` = 227');
        DB::connection('mysql2')->statement('UPDATE `appointments` set patient_id = 2025 WHERE `patient_id` = 2024');
        DB::connection('mysql2')->statement('UPDATE `appointments` set patient_id = 2414 WHERE `patient_id` = 2413');
        DB::connection('mysql2')->statement('UPDATE `appointments` set patient_id = 4599 WHERE `patient_id` = 4598');
        $step = Upgrade::where('model','Appointment')->first();
        /** @var Collection */
        $old_models = Appointment::on('mysql2')->where('id', '>', $step->row_id)->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = new Appointment(
                [
                    'id' => $old_row->id,
                    'patient_id' => $old_row->patient_id,
                    'doctor_id' => $old_row->doctor_id,
                    'reception_id' => $old_row->reception_id,
                    'station_id' => $old_row->station_id,
                    'clinic_id' => $old_row->clinic,
                    'status' => 3,
                    'login_time' => $old_row->login_time,
                    'complaint' => $old_row->complaint,
                    'created_at' => $old_row->created_at,
                    'updated_at' => $old_row->updated_at,
                ]
            );
            $new_record->save();
            $step->increment('row_id');
        }
        $last = ($old_models->last())?$old_models->last()->id:50000;
        $step->update(['row_id'=> $last]);
        $step->save();
        // return 0;
        // Interview
        $step = Upgrade::where('model','Interview')->first();
        /** @var Collection */
        $old_models = Interview::on('mysql2')->where('id', '>', $step->row_id)->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = new Interview(
                [
                    'id' => $old_row->id,
                    'appointment_id' => $old_row->appointment_id,
                    'clinical_examination' => $old_row->clinical_examination,
                    'impression' => $old_row->impression,
                    'action_request' => $old_row->action_request,
                    'xray_request' => $old_row->xray_request,
                    'note' => $old_row->note,
                    'docs' => $old_row->docs,
                    'created_at' => $old_row->created_at,
                    'updated_at' => $old_row->updated_at,
                ]
            );
            $new_record->save();
            $step->increment('row_id');

        }
        $last = ($old_models->last())?$old_models->last()->id:50000;
        $step->update(['row_id'=> $last]);
        $step->save();
        // return 0;
        // Sign
        $step = Upgrade::where('model','Sign')->first();

        DB::connection('mysql2')->statement('UPDATE `signs` set appointment_id = 12695 WHERE `appointment_id` = 12694');
        DB::connection('mysql2')->statement('UPDATE `signs` set appointment_id = 16442 WHERE `appointment_id` = 16441');
        /** @var Collection */
        $old_models = Sign::on('mysql2')->where('id', '>', $step->row_id)->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = new Sign(
                [
                    'id' => $old_row->id,
                    'appointment_id' => $old_row->appointment_id,
                    'nurse_id' => $old_row->nurse_id,
                    'systolic_blood_pressure' => abs($old_row->systolic_blood_pressure),
                    'diastolic_blood_pressure' => abs($old_row->diastolic_blood_pressure),
                    'heartbeat' => abs($old_row->heartbeat),
                    'temperature' => abs($old_row->temperature),
                    'weight' => abs($old_row->Weight),
                    'length' => abs($old_row->Length),
                    'waistline' => $old_row->waistline,
                    'breathing' => $old_row->Breathing,
                    'oxygen' => abs($old_row->oxygen),
                    'peak_expiratory_flow' => $old_row->pef,
                    'sugar' => $old_row->sugar,
                    'female_status' => $old_row->pregnant,
                    'skins' => $old_row->skins,
                    'ecg' => $old_row->ecg,
                    'docs' => $old_row->docs,
                    'comment' => $old_row->comment,
                    'created_at' => $old_row->created_at,
                    'updated_at' => $old_row->updated_at,

                ]
            );
            $new_record->save();
            $step->increment('row_id');

        }
        $last = ($old_models->last())?$old_models->last()->id:50000;
        $step->update(['row_id'=> $last]);
        $step->save();
        // return 0;
        // Recipe
        DB::connection('mysql2')->statement('UPDATE `recipes` set interview_id = 18593 WHERE `interview_id` = 18592');

        $step = Upgrade::where('model','Recipe')->first();
        /** @var Collection */
        $old_models = Recipe::on('mysql2')->where('id', '>', $step->row_id)->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = new Recipe(
                [
                    'id' => $old_row->id,
                    'interview_id' => $old_row->interview_id,
                    'medicine_title' => $old_row->medicine_title,
                    'repeats' => $old_row->repeats,
                    'pharmaceutical_form' => $old_row->how_use,
                    'count' => ($old_row->count)?$old_row->count:1,
                    'note' => $old_row->note,
                    'consume' => $old_row->dispensed,
                    'created_at' => $old_row->created_at,
                    'updated_at' => $old_row->updated_at,
                ]
            );
            $new_record->save();
            $step->update(['row_id'=>  $old_row->id]);
            $step->save();

        }
        $last = ($old_models->last())?$old_models->last()->id:50000;
        $step->update(['row_id'=> $last]);
        $step->save();
        // return 0;
        // Analytic
        $step = Upgrade::where('model','Analytic')->first();
        /** @var Collection */
        $old_models = Analytic::on('mysql2')->where('id', '>', $step->row_id)->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = new Analytic(
                [
                    'id' => $old_row->id,
                    'title' => $old_row->title,
                    'unit' => $old_row->unit,
                    'available' => $old_row->active,
                    'created_at' => $old_row->created_at,
                    'updated_at' => $old_row->updated_at,
                ]
            );
            $new_record->save();
            $step->update(['row_id'=>  $old_row->id]);
            $step->save();

        }
        $last = ($old_models->last())?$old_models->last()->id:50000;
        $step->update(['row_id'=> $last]);
        $step->save();
        // return 0;
        // Analytic_Interview
        $step = Upgrade::where('model','AnalyticInterview')->first();
        /** @var Collection */
        $old_models = Interview::on('mysql2')->where('id', '>', $step->row_id)->with('analytics')->paginate($perpage);
        foreach ($old_models as $old_row) {
            $new_record = Interview::find($old_row->id);
            foreach ($old_row->analytics as $analytic) {
                $new_record->analytics()->attach($analytic->id, ['result' => $analytic->pivot->result]);
            }

            $step->increment('row_id');

        }
        $last = ($old_models->last())?$old_models->last()->id:50000;
        $step->update(['row_id'=> $last]);
        $step->save();
        // return 0;


    }
}

