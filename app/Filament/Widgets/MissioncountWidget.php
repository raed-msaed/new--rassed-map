<?php

namespace App\Filament\Widgets;

use App\Models\Mission;
use Carbon\Carbon;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MissioncountWidget extends BaseWidget
{
    //protected int | string | array $columnSpan = 3;
    protected static ?int $sort = 1;
    protected int | string | array $columns = 5;
    protected int | string | array $columnSpan = 'xl';
    protected function getStats(): array
    {

        $today = Carbon::today();
        $startOfYear = $today->copy()->startOfYear(); // Start of the current year

        // Query data from the database
        $totalMissions = Mission::count(); // Example query to count all missions

        // Example of querying a specific statistic
        $completedMissions = Mission::whereDate('datefinmission', '>=', $startOfYear) // Only include missions starting from the beginning of the current year
            ->where('accordgrci', '=', 'نعم')
            ->where('statusaccord', '=', 'نعم')->count();

        return [
            Stat::make('العدد', $totalMissions)
                ->description('عدد الجملي للمهمات لسنة الحالية')
                ->descriptionIcon('fas-plane', IconPosition::Before)
                ->chart([$totalMissions, $completedMissions, 30, 15, 20]),
        ];
    }
}