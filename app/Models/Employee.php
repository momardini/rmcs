<?php

namespace App\Models;

use App\Enums\ScheduleType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string|null $mobile
 * @property string|null $address
 * @property string|null $specialist
 * @property string|null $education
 * @property string|null $work
 * @property string|null $photo
 * @property float $salary
 * @property int $schedule_type
 * @property mixed|null $docs
 * @property int $vacation
 * @property int $user_id
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\EmployeeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDocs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereScheduleType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSpecialist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereVacation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereWork($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'schedule_type' => ScheduleType::class,
    ];
    /**
     * Get the user that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the meet associated with the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function meet()
    {
        return $this->hasOne(Meet::class);
    }
    /**
     * Get all of the calendars for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calendars()
    {
        return $this->hasMany(Calendar::class);
    }
}
