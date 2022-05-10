<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Meet
 *
 * @property int $id
 * @property string $jwtToken
 * @property string $zoomUserId
 * @property int $employee_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MeetFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Meet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Meet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meet whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meet whereJwtToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meet whereZoomUserId($value)
 * @mixin \Eloquent
 */
class Meet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getEmployeeIdBrowseAttribute()
    {
        return $this->employee->user->name ?? 'Empty';
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
