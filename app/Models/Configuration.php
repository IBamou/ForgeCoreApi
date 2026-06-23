<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Configuration extends Pivot
{
    protected $fillable = [
        'user_id', 'input_id', 'blueprint_id',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'configuration_id');
    }

    public function blueprint(): HasOneThrough
    {
        return $this->hasOneThrough(
            Blueprint::class,     // 1. The final model you want to reach
            Configuration::class, // 2. The intermediate (bridge) model
            'id',                 // 3. Foreign key on intermediate table (configurations.id)
            'id',                 // 4. Foreign key on final table (blueprints.id)
            'configuration_id',   // 5. Local key on this table (posts.configuration_id)
            'blueprint_id'        // 6. Local key on intermediate table (configurations.blueprint_id)
        );
    }

    public function input(): HasOneThrough
    {
        return $this->hasOneThrough(
            Blueprint::class,     // 1. The final model you want to reach
            Configuration::class, // 2. The intermediate (bridge) model
            'id',                 // 3. Foreign key on intermediate table (configurations.id)
            'id',                 // 4. Foreign key on final table (inputs.id)
            'configuration_id',   // 5. Local key on this table (posts.configuration_id)
            'input_id'            // 6. Local key on intermediate table (configurations.input_id)
        );
    }
}
