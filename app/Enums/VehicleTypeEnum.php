<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum VehicleTypeEnum: string implements HasIcon, HasColor, HasLabel
{
    case Car = 'car';

    case Motorcycle = 'motorcycle';

    case Other = 'other';


    public function getLabel(): string
    {
        return match ($this) {
            self::Car => 'Car',
            self::Motorcycle => 'Motorcycle',
            self::Other => 'Other',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Car => 'primary',
            self::Motorcycle => 'success',
            self::Other => 'warning',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Car => 'heroicon-m-check-circle',
            self::Motorcycle => 'heroicon-m-check-circle',
            self::Other => 'heroicon-m-check-circle',
        };
    }
}



