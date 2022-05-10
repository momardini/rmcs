<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Calendar
 *
 * @property int $id
 * @property int $user_id
 * @property string $working_day
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CalendarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereWorkingDay($value)
 * @mixin \Eloquent
 */
class Calendar extends Model
{
    use HasFactory;
    protected $guarded = [];
}
