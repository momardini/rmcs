<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Interview
 *
 * @property int $id
 * @property int $appointment_id
 * @property string|null $clinical_examination
 * @property string|null $impression
 * @property string|null $action_request
 * @property string|null $xray_request
 * @property string|null $note
 * @property string|null $discovered
 * @property mixed|null $docs
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\InterviewFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Interview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Interview query()
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereActionRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereAppointmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereClinicalExamination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereDiscovered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereDocs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereImpression($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interview whereXrayRequest($value)
 * @mixin \Eloquent
 */
class Interview extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * Get all of the analytics for the Interview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function analytics()
    {
        return $this->BelongsToMany(Analytic::class)->withPivot('result');
    }
    /**
     * Get appointment of the Interview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
    /**
     * Get the analytics that has value for the Interview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function analytic_results(){
        return $this->belongsToMany(Analytic::class)->wherePivot('result','!=','null')->withPivot('result');
    }
    /**
     * Get all of the recipes for the Interview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
