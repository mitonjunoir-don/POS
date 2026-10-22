<?php

namespace App\Enums;

enum SaleStatus: string
{
    case PendingPayment = 'pending_payment';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
    case Voided = 'voided';
}
