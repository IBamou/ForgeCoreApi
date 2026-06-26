<?php

namespace App\Models;

use App\Enums\PostStatus;
use App\Enums\ProcessStatus;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'configuration_id',
        'title', 'hook_proposal', 'body_points',
        'suggested_hashtags', 'technical_readability_score',
        'tone_compliance_justification', 'process_status',
        'ai_payload', 'status',
    ];

    protected $casts = [
        'process_status' => ProcessStatus::class,
        'status' => PostStatus::class,
        'body_points' => 'array',
        'suggested_hashtags' => 'array',
        'ai_payload' => 'array',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function configuration(): BelongsTo
    {
        return $this->belongsTo(Configuration::class);
    }

    #[Scope]
    protected function ownedBy(Builder $query): void
    {
        $query->where('user_id', auth()->id());
    }
}
