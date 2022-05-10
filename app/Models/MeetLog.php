<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MeetLog
 *
 * @property int $id
 * @property string $meet_id
 * @property int $participants
 * @property int $doctor_active
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MeetLogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeetLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeetLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|MeetLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetLog whereDoctorActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetLog whereMeetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetLog whereParticipants($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetLog whereUserId($value)
 * @mixin \Eloquent
 */
class MeetLog extends Model
{
    use HasFactory;
    protected $guarded = [];
}
