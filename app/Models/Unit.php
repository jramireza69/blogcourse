<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Unit
 *
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property string $unit_type
 * @property string $title
 * @property string|null $content
 * @property string|null $file
 * @property string $free
 * @property int|null $unit_time total minutes is apply
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUnitTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUnitType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUserId($value)
 * @mixin \Eloquent
 */
class Unit extends Model
{
    const ZIP = 'ZIP';
    const VIDEO = 'VIDEO';
    const SECTION = 'SECTION';
}