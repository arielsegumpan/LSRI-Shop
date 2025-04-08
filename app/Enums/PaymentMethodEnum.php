<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PaymentMethodEnum: string implements HasColor, HasLabel
{
    case COD = 'cod';

    case BANK_TRANSFER = 'bank_transfer';

    case CREDIT_CARD = 'credit_card';

    public function getLabel(): string
    {
        return match ($this) {
            self::COD => 'Cash on Delivery',
            self::BANK_TRANSFER => 'Bank Transfer',
            self::CREDIT_CARD => 'Credit Card',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::COD => 'info',
            self::BANK_TRANSFER => 'warning',
            self::CREDIT_CARD => 'success',
        };
    }

}



