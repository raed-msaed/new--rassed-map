<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class DailyMissionsChartWidget extends ChartWidget
{
    protected static ?string $heading = 'عدد المهمات حسب اليوم';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $today = Carbon::today();

        // Fetch missions grouped by date from today onward
        $missions = DB::table('missions')
            ->whereDate('datefinmission', '>=', $today)
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
                    'label' => 'عدد المهمات',
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
}
