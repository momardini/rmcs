<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

/**
 * App\Models\Station
 *
 * @property int $id
 * @property string $title
 * @property string|null $address
 * @property string|null $mobile
 * @property string|null $logo
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\StationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Station extends Model
{
    use HasFactory;
    use Translatable;
    protected $guarded = [];
    protected $translatable = ['title'];
    /**
     * Get all of the patients for the Station
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    /**
     * Get all of the users for the Station
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
