<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blueprint extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'name', 'description',
        'tone', 'target_platform', 'max_length',
        'structure_rules', 'style_rules', 'hashtag_strategy',
        'is_active',
    ];

    protected $casts = [
        'structure_rules' => 'array',
        'style_rules' => 'array',
        'hashtag_strategy' => 'array',
        'is_active' => 'boolean',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inputs(): BelongsToMany
    {
        return $this->belongsToMany(Input::class, 'configurations');
    }

    public function configurations(): HasMany
    {
        return $this->hasMany(Configuration::class, 'blueprint_id');
    }

    public function posts()
    {
        return $this->hasManyThrough(
            Post::class,           // 1. The final model you want to get
            Configuration::class,  // 2. The intermediate (bridge) model
            'blueprint_id',        // 3. Foreign key on intermediate table (configurations)
            'configuration_id',    // 4. Foreign key on final table (posts)
            'id',                  // 5. Local key on this table (blueprints)
            'id'                   // 6. Local key on intermediate table (configurations)
        );
    }
}
