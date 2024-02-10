<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use Filament\Widgets\ChartWidget;

class SaleVSRentalAdsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Sales VS Rental',
                    'data' => [Ad::sale()->count(), Ad::renting()->count()],
                    'backgroundColor' => ['#f7f1ce', '#d99e27'],
                ],
            ],
            'labels' => ['Sales', 'Rental'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
