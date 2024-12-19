<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class DailyMissionsChartWidget extends ChartWidget
{
    protected static ?string $heading = 'عدد المهمات المعتمدة حسب اليوم';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $today = Carbon::today();

        // Fetch missions grouped by date from today onward
        $missions = DB::table('missions')
            ->whereDate('datefinmission', '>=', $today)
            ->where('accordgrci', '=', 'نعم')
            ->where('statusaccord', '=', 'نعم')
            ->select(
                DB::raw('DATE(datedebutmission) as date'),
                DB::raw('count(*) as count')
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Prepare chart data
        $labels = $missions->pluck('date')->map(fn ($date) => Carbon::parse($date)->format('Y-m-d'))->toArray();
        $counts = $missions->pluck('count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'المهمات',
                    'data' => $counts,
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $labels,
        ];
    }


    protected function getType(): string
    {
        return 'line';
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