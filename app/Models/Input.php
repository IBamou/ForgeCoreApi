<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Input extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'raw_input', 'user_id', 'title'
    ];

    protected $casts = [
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blueprints(): BelongsToMany
    {
        return $this->belongsToMany(Blueprint::class, 'configurations');
    }

    public function configurations(): HasMany
    {
        return $this->hasMany(Configuration::class, 'input_id');
    }

    public function posts(): HasManyThrough
    {
        return $this->hasManyThrough(
            Post::class,           // 1. The final model you want to get
            Configuration::class,  // 2. The intermediate (bridge) model
            'input_id',        // 3. Foreign key on intermediate table (configurations)
            'configuration_id',    // 4. Foreign key on final table (posts)
            'id',                  // 5. Local key on this table (blueprints)
            'id'                   // 6. Local key on intermediate table (configurations)
        );
    }
}
