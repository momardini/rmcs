<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Analytic
 *
 * @property int $id
 * @property string $title
 * @property string|null $unit
 * @property int $available
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AnalyticFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Analytic extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    /**
     * The interviews that belong to the Analytic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function interviews()
    {
        return $this->belongsToMany(Interview::class);
    }
}
