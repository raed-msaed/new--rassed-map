<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MissionsChartWidget extends ChartWidget
{
    protected static ?string $heading = 'عدد المهمات اليومية';

    protected static ?int $sort = 1;
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
                    'label' => 'عدد المهمات',
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
}
