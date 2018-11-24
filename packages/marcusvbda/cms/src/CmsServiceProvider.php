<?php

namespace marcusvbda\commonModels;

use Illuminate\Support\ServiceProvider;

class StoreModelsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations/'),
        ]);
        $this->publishes([
            __DIR__.'/database/seeds' => database_path('migrations/seeds'),
        ]);
    }
}
