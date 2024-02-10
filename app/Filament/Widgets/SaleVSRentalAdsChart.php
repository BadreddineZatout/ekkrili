<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use Filament\Widgets\ChartWidget;

class SaleVSRentalAdsChart extends ChartWidget
{
    protected static ?int $sort = 4;

    protected static ?string $heading = 'Ventes VS Locations';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Ventes VS Locations',
                    'data' => [Ad::sale()->count(), Ad::renting()->count()],
                    'backgroundColor' => ['#f7f1ce', '#d99e27'],
                ],
            ],
            'labels' => ['Ventes', 'Locations'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
