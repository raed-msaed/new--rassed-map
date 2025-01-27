<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MissionsChartWidget extends ChartWidget
{
    protected static ?string $heading = 'عدد المهمات المعتمدة لهذا اليوم';

    protected static ?int $sort = 3;
    protected function getData(): array
    {
        $today = Carbon::today();
        $nextDay = $today->copy()->addDay();

        // Fetch missions data
        $missions = DB::table('missions')
            ->where(function ($query) use ($today, $nextDay) {
                $query->whereDate('datedebutmission', '<=', $nextDay)
                    ->whereDate('datefinmission', '>=', $today)
                    ->where('accordgrci', '=', 'نعم')
                    ->where('statusaccord', '=', 'نعم');
            })
            ->select(DB::raw('DATE(datedebutmission) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->get();

        // Prepare chart data
        $labels = $missions->pluck('date')->map(fn ($date) => Carbon::parse($date)->format('Y-m-d'))->toArray();
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