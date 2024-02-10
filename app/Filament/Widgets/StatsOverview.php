<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
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
