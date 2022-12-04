<?php

namespace App\Models;

use App\Enums\AppointmentStatus;
use App\Enums\BloodType;
use App\Enums\City;
use App\Enums\GenderType;
use App\Enums\MaritalType;
use App\Enums\PatientStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Str;

/**
 * App\Models\Patient
 *
 * @property int $id
 * @property string $full_name
 * @property string $birth
 * @property int $status
 * @property int $city
 * @property string|null $address
 * @property int $gender
 * @property int $marital
 * @property int|null $children
 * @property string|null $phone
 * @property int|null $blood_group
 * @property string|null $birth_place
 * @property string|null $work
 * @property mixed|null $previous_diseases
 * @property mixed|null $family_diseases
 * @property string|null $previous_surgery
 * @property string|null $previous_accidents
 * @property string|null $allergies
 * @property string|null $disabilities
 * @property int $station_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Database\Factories\PatientFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient query()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereAllergies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereBloodGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereDisabilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereFamilyDiseases($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereMarital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePreviousAccidents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePreviousDiseases($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePreviousSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereWork($value)
 * @mixin \Eloquent
 */
class Patient extends Model
{
    use HasFactory,\Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $guarded = [];
    protected $casts = [
        'status' => PatientStatus::class,
        'city'=>City::class,
        'gender' => GenderType::class,
        'marital' => MaritalType::class,
        'blood_group' => BloodType::class,
        'created_at' => 'date',
        'previous_diseases'=> 'array',
        'family_diseases' => 'array',
        'birth' => 'date',
    ];
    public $additional_attributes = ['age'];
    public function getStatusColorAttribute(): string
    {
        return [
                PatientStatus::READY => 'green',
                PatientStatus::IN_APPOINTMENT => 'red',
                PatientStatus::BLOCKED => 'cool-gray',
            ][$this->status->value] ?? 'cool-gray';
    }
    public function getGenderSymbolAttribute(): string
    {
        return [
                GenderType::MALE => 'male',
                GenderType::FEMALE => 'female',
            ][$this->gender->value] ?? 'male';
    }

    /**
     * @return string
     */
    public function getAgeAttribute() : string
    {
        if($this->birth){
            $current = Carbon::now();
            $birth = Carbon::parse($this->birth);
            if(!$birth->diffInYears($current)){
                return $birth->diff($current)->format('%m M');
            }
            else{
                return $birth->diff($current)->format('%yY - %mM');
            }
        }
        return '-';


    }

    public function getMaritalSymbolAttribute() : string
    {
        return [
                MaritalType::SINGLE => 'single',
                MaritalType::MARRIED => 'married',
            ][$this->marital->value] ?? 'single';
    }

    public function getHideNameAttribute()
    {
        $firstName = Str::of($this->full_name)->explode(' ')->first();
        $lastName = implode(' ',Str::of($this->full_name)->explode(' ')->slice(1)->toArray());
        return "<span>{$firstName} </span><span class='blur'>{$lastName}</span>";
//        return $firstName.' '. $lastName->map(function ($str) {return \Str::mask($str, '*', 3);})->implode(' ');
    }
    /**
     * Get the station that owns the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }
    /**
     * Get all of the appointments for the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
    /**
     * Get active appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function active_appointment(): HasOne
    {
        return $this->hasOne(Appointment::class)
            ->whereDate('created_at', Carbon::today())->orderByDesc('created_at');
    }
    /**
     * Get active appointment that can be editable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function editable_appointment(): HasOne
    {
        return $this->hasOne(Appointment::class)
            ->whereDate('created_at', Carbon::today())
            ->whereIn('status',[AppointmentStatus::coerce('NEW_APPOINTMENT'),AppointmentStatus::coerce('SIGN_DONE')])
            ->orderBy('created_at','desc');
    }
    /**
     * Get signs of Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function signs():hasMany
    {
        return $this->hasMany(Sign::class);
    }

    /**
     * Get active signs of Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function active_sign():hasOne
    {
        return $this->hasOne(Sign::class)
                    ->whereDate('created_at', Carbon::today());
    }

    /**
     * Get all of the interviews for the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function interviews(): HasManyThrough
    {
        return $this->hasManyThrough(Interview::class, Appointment::class)->orderByDesc('created_at');
    }
    public function analytics(){
        return $this->hasManyDeepFromRelations($this->interviews(),(new Interview())->analytics())
            ->withPivot('analytic_interview', ['result']);
    }
//    /**
//     * Get active Interview of Patient
//     *
//     * @return \Illuminate\Database\Eloquent\Relations\hasOne
//     */
//    public function active_interview()
//    {
//        return $this->active_appointment->interview;
//    }
    public function getDateForHumansAttribute(): string
    {
        return $this->created_at->format('M, d Y');
    }


}
