<?php

// Test script untuk Midtrans Snap Token Generation
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Helpers\MidtransHelper;
use Midtrans\Config;

// Set Midtrans Configuration
Config::$serverKey = config('midtrans.server_key');
Config::$isProduction = config('midtrans.is_production', false);
Config::$isSanitized = config('midtrans.is_sanitized', true);
Config::$is3ds = config('midtrans.is_3ds', true);

// Disable SSL verification for development only
Config::$curlOptions = [];

echo "Testing Midtrans Configuration:\n";
echo "================================\n";
echo "Server Key: " . Config::$serverKey . "\n";
echo "Client Key: " . config('midtrans.client_key') . "\n";
echo "Is Production: " . (Config::$isProduction ? 'Yes' : 'No') . "\n";
echo "\n";

// Test Generate Snap Token
echo "Generating Snap Token...\n";

$params = [
    'transaction_details' => [
        'order_id' => 'TEST-' . time(),
        'gross_amount' => 100000,
    ],
    'customer_details' => [
        'first_name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '08123456789',
    ],
    'item_details' => [
        [
            'id' => 1,
            'price' => 100000,
            'quantity' => 1,
            'name' => 'Test Product',
        ]
    ],
];

try {
    $result = MidtransHelper::getSnapToken($params);
    $snapToken = $result['token'];
    echo "\n✅ SUCCESS!\n";
    echo "Snap Token: " . $snapToken . "\n";
    echo "\nSnap URL untuk test:\n";
    echo "https://app.sandbox.midtrans.com/snap/v2/vtweb/" . $snapToken . "\n";
} catch (\Exception $e) {
    echo "\n❌ ERROR!\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "Code: " . $e->getCode() . "\n";
}
