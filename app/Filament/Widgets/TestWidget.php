<?php

namespace App\Filament\Widgets;

use App\Models\Mission;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TestWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('العدد', Mission::count())
                ->description('عدد الجملي للمهمات')
                ->descriptionIcon('fas-plane-departure', IconPosition::Before)
                ->chart([1, 3, 5, 9, 2])
        ];
    }
}
