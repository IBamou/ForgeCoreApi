<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Message extends Model
{
    protected $table = 'agent_conversation_messages';

    protected $fillable = [
        'conversation_id', 'role', 'content', 'agent',
        'attachments', 'tool_calls', 'tool_results', 'usage', 'meta',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $message) {
            if (empty($message->{$message->getKeyName()})) {
                $message->{$message->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }
}
