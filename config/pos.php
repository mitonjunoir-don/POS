<?php

return [
    // ISO-ish display currency. Always KES for this project (hard requirement).
    'currency' => env('POS_CURRENCY', 'KES'),

    // Prefix used for human-facing receipt numbers, e.g. RCP-20260926-0001.
    'receipt_prefix' => env('POS_RECEIPT_PREFIX', 'RCP'),

    // Whether stock is allowed to go below zero. Keep false in production.
    'negative_stock_allowed' => (bool) env('POS_NEGATIVE_STOCK_ALLOWED', false),

    // Default reorder level applied when a product doesn't specify its own.
    'low_stock_default_reorder' => (float) env('POS_LOW_STOCK_DEFAULT_REORDER', 5),

    // How long admin dashboard aggregates may be cached. Cashier "today" totals
    // are always computed live and must never use this cache.
    'admin_dashboard_cache_seconds' => (int) env('POS_ADMIN_DASHBOARD_CACHE_SECONDS', 60),

    'mpesa' => [
        'env' => env('MPESA_ENV', 'sandbox'),
        'consumer_key' => env('MPESA_CONSUMER_KEY'),
        'consumer_secret' => env('MPESA_CONSUMER_SECRET'),
        'shortcode' => env('MPESA_SHORTCODE'),
        'passkey' => env('MPESA_PASSKEY'),
        'callback_url' => env('MPESA_CALLBACK_URL'),
        'transaction_type' => env('MPESA_TRANSACTION_TYPE', 'CustomerPayBillOnline'),

        // Seconds a pending payment waits before the fallback STK Query job checks it.
        'query_after_seconds' => (int) env('POS_MPESA_QUERY_AFTER_SECONDS', 45),

        // Seconds after which a still-pending payment is expired and stock restored.
        'pending_timeout_seconds' => (int) env('POS_MPESA_PENDING_TIMEOUT_SECONDS', 120),
    ],
];
