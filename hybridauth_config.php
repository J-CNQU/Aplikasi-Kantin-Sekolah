<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

return [
    'callback' => 'http://localhost:3000/callback.php', // universal callback

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

        'Facebook' => [
            'enabled' => true,
            'keys' => [
                'id'     => '802906159218058',
                'secret' => '4c9f47f9144bd613f8059078363d8f02',
            ],
            'scope' => 'email, public_profile',
            'trustForwarded' => false,
        ],

        'Twitter' => [
            'enabled' => false,
            'keys' => ['key' => '', 'secret' => ''],
        ],
    ],
];
