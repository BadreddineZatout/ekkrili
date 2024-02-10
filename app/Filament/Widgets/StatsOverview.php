<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Annonces Totales', Ad::count()),
            Stat::make('Annonces Premiumes Totales', Ad::premium()->count()),
            Stat::make('Annonces De Vente Totales', Ad::sale()->count()),
            Stat::make('Annonces De Location Totales', Ad::renting()->count()),
        ];
    }
}
