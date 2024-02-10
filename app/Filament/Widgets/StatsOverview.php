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
            Stat::make('Total Ads', Ad::count()),
            Stat::make('Total Premium Ads', Ad::premium()->count()),
            Stat::make('Total Sale Ads', Ad::sale()->count()),
            Stat::make('Total Rental Ads', Ad::renting()->count()),
        ];
    }
}
