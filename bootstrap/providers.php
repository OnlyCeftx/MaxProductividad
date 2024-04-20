<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\VoltServiceProvider::class,
    MongoDB\Laravel\MongoDBServiceProvider::class,
    App\Providers\SessionServiceProvider::class,
    MongoDB\Laravel\Auth\PasswordResetServiceProvider::class,
];
