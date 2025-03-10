<?php

namespace App\Providers;

use App\Filament\Resources\ProductResource;
use App\Http\Middleware\Authenticate;
use App\Models\User;
use Filament\Tables\Columns\Layout\Panel;
use Illuminate\Support\ServiceProvider;

class AdminPanelProvider extends ServiceProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->authMiddleware([Authenticate::class])
            ->login()
            ->user(fn () => auth()->user())
            ->canAccess(fn (User $user) => $user->is_admin);
    }

}
