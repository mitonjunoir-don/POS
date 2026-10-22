<?php

namespace App\Enums;

enum StockMovementType: string
{
    case Purchase = 'purchase';
    case Sale = 'sale';
    case SaleVoid = 'sale_void';
    case Adjustment = 'adjustment';
    case Wastage = 'wastage';
    case ReturnStock = 'return';
}
