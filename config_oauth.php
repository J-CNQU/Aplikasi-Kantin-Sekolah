<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

return [
    'callback' => 'http://localhost:3000/callback.php',

    'storage' => __DIR__ . '/hybridauth_storage',
    'debug_mode' => true,
    'debug_file' => __DIR__ . '/hybridauth.log',

    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys' => [
                'id'     => '523070165573-vragqgmqssr2uos6lffbugjnstj2720a.apps.googleusercontent.com',
                'secret' => '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',
            ],
            'scope' => 'openid profile email https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
        ],
    ],
];
