<?php

namespace App\Filament\Widgets;


use App\Models\Mission;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\DB;

class MissionAdminChart extends ChartWidget
{
    protected static ?string $heading = 'عدد البطاقات المنتهية الصلوحية حسب الشهر';

    protected static ?int $sort = 3;

    protected static string $color = 'info';

    protected function getData(): array
    {
        $latestBadgetsSubquery = Mission::select();

        $invalidBadgetsCount = Mission::where(function ($query) use ($latestBadgetsSubquery) {
            $query->where('accordgrci', 'نعم')
                ->where('statusaccord', 'نعم');
        });

        $data = Trend::query($invalidBadgetsCount)
            ->dateColumn('datedebutmission')
            ->between(
                start: now()->startOfDay(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'عدد البطاقات المنتهية الصلوحية',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
