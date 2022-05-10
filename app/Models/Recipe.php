<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Recipe
 *
 * @property int $id
 * @property int $interview_id
 * @property string $medicine_title
 * @property int $repeats
 * @property int $pharmaceutical_form
 * @property int $count
 * @property string|null $note
 * @property int|null $consume
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RecipeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereConsume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereInterviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereMedicineTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe wherePharmaceuticalForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereRepeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Recipe extends Model
{
    use HasFactory;
    protected $guarded = [];
}
