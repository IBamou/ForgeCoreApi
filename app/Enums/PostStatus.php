<?php

namespace App\Enums;

enum PostStatus: string
{
    case InReview = 'in_review';
    case Draft = 'draft';
    case Posted = 'posted';
    case Archived = 'archived';

    // This method returns the human-readable label
    public function label(): string
    {
        return match($this) {
            self::InReview => 'In Review',
            self::Draft => 'Draft',
            self::Posted => 'Posted',
            self::Archived => 'Archived',
        };
    }
}

