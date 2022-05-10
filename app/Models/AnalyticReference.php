<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AnalyticReference
 *
 * @property int $id
 * @property int $analytic_id
 * @property int $gender
 * @property int $female_status
 * @property float|null $min
 * @property float|null $max
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AnalyticReferenceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference query()
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference whereAnalyticId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference whereFemaleStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference whereMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalyticReference whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AnalyticReference extends Model
{
    use HasFactory;
    protected $guarded = [];
}
