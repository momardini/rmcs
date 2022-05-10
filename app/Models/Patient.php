<?php

namespace App\Models;

use App\Enums\BloodType;
use App\Enums\City;
use App\Enums\DiseaseType;
use App\Enums\GenderType;
use App\Enums\MaritalType;
use App\Enums\PatientStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'status' => PatientStatus::class, 
        'city'=>City::class,
        'gender' => GenderType::class,
        'marital' => MaritalType::class,
        'blood_group' => BloodType::class,
    ];
    /**
     * Get the station that owns the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    /**
     * Get all of the appointments for the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    /**
     * Get all of the interviews for the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function interviews()
    {
        return $this->hasManyThrough(Interview::class, Appointment::class);
    }
    
}
