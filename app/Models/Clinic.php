<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Clinic
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string|null $deleted_at
 * @method static \Database\Factories\ClinicFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Clinic extends Model
{
    use HasFactory;
    protected $guarded = [];
//    protected $connection = 'mysql2';

}

