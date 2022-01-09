<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Website
 *
 * @method static Builder|Website newModelQuery()
 * @method static Builder|Website newQuery()
 * @method static Builder|Website query()
 * @mixin Eloquent
 * @mixin Builder
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Website whereCreatedAt($value)
 * @method static Builder|Website whereDescription($value)
 * @method static Builder|Website whereId($value)
 * @method static Builder|Website whereName($value)
 * @method static Builder|Website whereUpdatedAt($value)
 */
class Website extends Model
{
    use HasFactory;
}
