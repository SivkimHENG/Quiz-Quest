<?php

use Filament\Facades\Filament;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class
];
