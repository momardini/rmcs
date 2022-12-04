<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Appointment
 *
 * @property int $id
 * @property int $user_id
 * @property string $browser
 * @property string $device_type
 * @property boolean $verified
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AppointmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment query()
 * @mixin \Eloquent
 */

class Device extends Model
{
    protected $guarded = [];

    /**
     * Get the employee that owns the Device
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
