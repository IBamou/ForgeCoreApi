<?php

namespace App\Enums;

enum ProcessStatus: string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Failed = 'failed';
    case Completed = 'completed';

    // This method returns the human-readable label
    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Processing => 'Processing',
            self::Failed => 'Failed',
            self::Completed => 'Completed',
        };
    }
}
