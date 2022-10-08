<?php

namespace App\Models;

use App\Actions\patients\AddAnalyticsResult;
use App\Actions\patients\DoInterview;
use App\Actions\patients\EditAppointment;
use App\Actions\patients\EditInterview;
use App\Actions\patients\EditPatient;
use App\Actions\patients\EditSign;
use App\Actions\patients\AddAnalytics;
use App\Actions\patients\FollowInterview;
use App\Actions\patients\MakeAppointment;
use App\Actions\patients\TakeSign;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $role_id
 * @property string $name
 * @property string $email
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $locale
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \TCG\Voyager\Models\Role|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//    protected $fillable = [
//        'id',
//        'name',
//        'email',
//        'password',
//    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeTodayActiveDoctor($query)
    {
        $ids = Calendar::whereWorkingDay(today())->pluck('user_id')->toArray();

        return ($ids)?$query->whereIn('id',$ids):$query->where('role_id', 2)->where('active',1);
    }

    /**
     * Get the employee associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    /**
     * Get all of the meetLogs for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meetLogs()
    {
        return $this->hasMany(MeetLog::class);
    }

    /**
     * Get the station that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function getActions($model){
        $permissions = [];
        foreach ($this->role->permissions->where('table_name',$model) as $permission){
            switch ($permission->key){
                case 'edit_patients':{
                    $permissions['edit_patients'] = EditPatient::class;
                    break;
                }
                case 'make_appointment_patients':{
                    $permissions['make_appointment_patients'] = MakeAppointment::class;
                    break;
                }
                case 'edit_appointment_patients':{
                    $permissions['edit_appointment_patients'] = EditAppointment::class;
                    break;
                }
                case 'take_sign_patients':{
                    $permissions['take_sign_patients'] = TakeSign::class;
                    break;
                }
                case 'edit_sign_patients':{
                    $permissions['edit_sign_patients'] = EditSign::class;
                    break;
                }
                case 'do_interview_patients':{
                    $permissions['do_interview_patients'] = DoInterview::class;
                    break;
                }
                case 'edit_interview_patients':{
                    $permissions['edit_interview_patients'] = EditInterview::class;
                    break;
                }
                case 'add_analytics_result_patients':{
                    $permissions['add_analytics_result_patients'] = AddAnalyticsResult::class;
                    break;
                }
                case 'follow_interview_patients':{
                    $permissions['follow_interview_patients'] = FollowInterview::class;
                    break;
                }
                default:{
                    break;
                }
            }
        }
        return $permissions;
    }
}
