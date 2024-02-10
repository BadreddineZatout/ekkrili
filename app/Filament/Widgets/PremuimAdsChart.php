<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PremuimAdsChart extends ChartWidget
{
    protected static ?int $sort = 3;

    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = Trend::query(Ad::premium())
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Ads',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
