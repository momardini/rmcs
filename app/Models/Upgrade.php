<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Upgrade
 *
 * @property int $id
 * @property string $model
 * @property int $row_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereRowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Upgrade extends Model
{
    protected $guarded = [];
}
