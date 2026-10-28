<?php
return [
    'driver' => env('SESSION_DRIVER', 'file'), 'lifetime' => 120,
    'expire_on_close' => false, 'encrypt' => false,
    'files' => storage_path('framework/sessions'),
    'connection' => null, 'table' => 'sessions', 'store' => null,
    'lottery' => [2, 100], 'cookie' => 'swiftpos_session', 'path' => '/',
    'domain' => null, 'secure' => env('APP_ENV') === 'production',
    'http_only' => true, 'same_site' => 'lax', 'partitioned' => false,
];
