<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Sign
 *
 * @property int $id
 * @property int $appointment_id
 * * @property int $patient_id
 * @property int|null $nurse_id
 * @property float|null $systolic_blood_pressure
 * @property float|null $diastolic_blood_pressure
 * @property float|null $heartbeat
 * @property float|null $temperature
 * @property float|null $weight
 * @property float|null $length
 * @property float|null $waistline
 * @property float|null $breathing
 * @property float|null $oxygen
 * @property float|null $peak_expiratory_flow
 * @property float|null $sugar
 * @property mixed|null $female_status
 * @property mixed|null $skins
 * @property mixed $ecg
 * @property mixed|null $docs
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SignFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereAppointmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereBreathing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereDiastolicBloodPressure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereDocs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereEcg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereFemaleStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereHeartbeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereNurseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereOxygen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign wherePeakExpiratoryFlow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereSkins($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereSugar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereSystolicBloodPressure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereWaistline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereWeight($value)
 * @mixin \Eloquent
 */
class Sign extends Model
{
    use HasFactory;
    public $additional_attributes = ['blood_pressure','bmi'];
    protected $guarded = [];
    protected $casts = [
        'female_status' => 'array',
        'ecg' => 'array',
        'skins' => 'array',
        'docs' => 'array',
    ];
    public function getBmiAttribute()
    {
        if($this->length && $this->weight && ($this->length != 0)){
             return round($this->weight/(($this->length / 100) * ($this->length / 100)),2) ;
        }
        return '-';
    }
    /**
     * Get the appointment that owns the Sign
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
    /**
     * Get the patient that owns the Sign
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    public function getDiastolicBloodPressureAttribute($value)
    {
        return ($value)?$value:'--';
    }
    public function getSystolicBloodPressureAttribute($value)
    {
        return ($value)?$value:'--';
    }
    public function getBloodPressureAttribute()
    {
        return "{$this->systolic_blood_pressure} / {$this->diastolic_blood_pressure}";
    }
    public static function arTOen($string) {
        return strtr($string, array('٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
    }
}
