<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class AnnualMissionsChartWidget extends ChartWidget
{
    protected static ?string $heading = 'عدد المهمات المعتمدة حسب السنة';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $today = Carbon::today();
        $startOfYear = $today->copy()->startOfYear(); // Start of the current year

        // Fetch missions grouped by year from the start of the years when missions are registered
        $missions = DB::table('missions')
            ->whereDate('datefinmission', '>=', $startOfYear) // Only include missions starting from the beginning of the current year
            ->where('accordgrci', '=', 'نعم')
            ->where('statusaccord', '=', 'نعم')
            ->select(
                DB::raw('YEAR(datedebutmission) as year'),
                DB::raw('count(*) as count')
            )
            ->groupBy(DB::raw('YEAR(datedebutmission)'))
            ->orderBy('year', 'asc')
            ->get();

        // Prepare the labels (Year) and data (Number of Missions)
        $labels = $missions->pluck('year')->toArray();
        $counts = $missions->pluck('count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'المهمات',
                    'data' => $counts,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<JS
        {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1, // Force ticks to increment by 1
                        callback: (value) => Math.floor(value),
                    },
                    beginAtZero: true // Ensures the scale starts at 0
                },
            },
        }
    JS);
    }
}