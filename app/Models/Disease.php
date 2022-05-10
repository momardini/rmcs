<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Disease
 *
 * @property int $id
 * @property string $category
 * @property string $code
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DiseaseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Disease newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disease newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disease query()
 * @method static \Illuminate\Database\Eloquent\Builder|Disease whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disease whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disease whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disease whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disease whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disease whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Disease extends Model
{
    use HasFactory;
    protected $guarded = [];
}
