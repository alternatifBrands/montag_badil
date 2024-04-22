<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserType: string implements HasLabel {
    case INDIVIDUAL = 'individual';
    case ORGANIZATION = 'organization';
    public function getLabel(): ?string
    {
        return match ($this) {
            self::INDIVIDUAL => 'individual',
            self::ORGANIZATION => 'organization',
        };
    }
}