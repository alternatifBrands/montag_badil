<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatusType: string implements HasLabel {
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'pending',
            self::APPROVED => 'approved',
            self::REJECTED => 'rejected',
        };
    }
}