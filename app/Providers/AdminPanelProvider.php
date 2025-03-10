<?php

namespace App\Providers;

use App\Filament\Resources\ProductResource;
use Filament\Tables\Columns\Layout\Panel;
use Illuminate\Support\ServiceProvider;

class AdminPanelProvider extends ServiceProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->authMiddleware(['auth'])
            ->userMenuItems([])
            ->navigation([])
            ->sidebarCollapsed(false)
            ->resources([
                ProductResource::class,
            ])
            ->middleware(['auth', 'can:access-filament']);
    }

}
