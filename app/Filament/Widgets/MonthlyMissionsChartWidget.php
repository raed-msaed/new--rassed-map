<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MonthlyMissionsChartWidget extends ChartWidget
{
    protected static ?string $heading = 'عدد المهمات حسب الشهر';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $today = Carbon::today();
        $startOfYear = $today->copy()->startOfYear(); // Start of the current year

        // Fetch missions grouped by year and month from the start of the year
        $missions = DB::table('missions')
            ->whereDate('datefinmission', '>=', $startOfYear) // Only missions from this year onward
            ->where('accordgrci', '=', 'نعم')
            ->where('statusaccord', '=', 'نعم')
            ->select(
                DB::raw('YEAR(datedebutmission) as year'),
                DB::raw('MONTH(datedebutmission) as month'),
                DB::raw('count(*) as count')
            )
            ->groupBy(DB::raw('YEAR(datedebutmission), MONTH(datedebutmission)'))
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Prepare the labels (Month-Year) and data (Number of Missions)
        $labels = $missions->map(function ($mission) {
            return Carbon::createFromDate($mission->year, $mission->month, 1)->format('M Y');
        })->toArray();

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
