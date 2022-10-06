<?php

namespace App\Models;

use App\Enums\AppointmentStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Appointment
 *
 * @property int $id
 * @property int $patient_id
 * @property int|null $doctor_id
 * @property int|null $reception_id
 * @property int $station_id
 * @property string $status
 * @property int|null $clinic_id
 * @property string|null $login_time
 * @property string|null $complaint
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Database\Factories\AppointmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereClinicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereComplaint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereReceptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'status' => AppointmentStatus::class,
        'docs' => 'array'
    ];
    /**
     * Get the patient that owns the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    /**
     * Get the doctor that owns the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(User::class,'doctor_id');
    }
    /**
     * Get the reception that owns the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reception(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reception_id');
    }
    /**
     * Get the station that owns the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }
    /**
     * Get the clinic that owns the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
    /**
     * Get the sign associated with the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sign(): HasOne
    {
        return $this->hasOne(Sign::class);
    }
    /**
     * Get the interview associated with the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function interview(): HasOne
    {
        return $this->hasOne(Interview::class);
    }

    public function getLoginTimeAttribute($value): ?string
    {
        return Carbon::parse($value)->format("g:i");
    }
    public function setLoginTimeAttribute($value)
    {
        $this->attributes['login_time'] =  Carbon::parse($value);
    }
}
