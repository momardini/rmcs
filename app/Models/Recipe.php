<?php

namespace App\Models;

use App\Enums\PharmaceuticalForm;
use App\Enums\RepeatType;
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
    protected $casts = [
        'pharmaceutical_form' => PharmaceuticalForm::class,
        'repeats' => RepeatType::class,
        ];
    public static function latin_number($i): string
    {
        $list = [
            "1"=>"I",
            "2"=>"II",
            "3"=>"III",
            "4"=>"IV",
            "5"=>"V",
            "6"=>"VI",
            "7"=>"VII",
            "8"=>"VIII",
            "9"=>"IX",
            "10"=>"X",
            "11"=>"XI",
            "12"=>"	XII",
            "13"=>"	XIII",
            "14"=>"	XIV",
            "15"=>"	XV",
            "16"=>"	XVI,",
            "17"=>"	XVII",
            "18"=>"	XVIII",
            "19"=>"	XIX",
            "20"=>"	XX",
            "21"=>"	XXI",
            "22"=>"	XXII",
            "23"=>"	XXIII",
            "24"=>"	XXIV",
            "25"=>"	XXV",
            "26"=>"	XXVI",
            "27"=>"	XXVII",
            "28"=>"	XXVIII",
            "29"=>"	XXIX",
            "30"=>"	XXX"];
        return $list[$i];
    }
}
