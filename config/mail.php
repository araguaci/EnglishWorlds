<?php

return array(
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),
    'port' => env('MAIL_PORT', 587),
    'from' => array(
        'address' => env('MAIL_FROM_ADDRESS', 'caddydz4@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'English DZ'),
    ),
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => array(
        'theme' => 'default',
        'paths' => array(
            resource_path('views/vendor/mail'),
        ),
    ),
);
