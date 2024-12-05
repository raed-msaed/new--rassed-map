<?php

namespace App\Providers\Filament;

use App\Filament\Resources\HistoryLogResource;
use App\Filament\Resources\MissionValidResource;
use App\Models\Icon;
use App\Models\Mission;
use App\Models\Point;
use App\Models\Suivmission;
use App\Observers\HistoryObserver;
use App\Observers\MissionObserver;
use App\Observers\PointObserver;
use App\Observers\SuivmissionObserver;
use Filament\Facades\Filament;
use Filament\FontProviders\LocalFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration()
            ->profile()
            ->font(
                'Inter',
                url: asset('css/filament/filament/fonts.css'),
                provider: LocalFontProvider::class,
            )
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('4rem')
            ->favicon(asset('images/logo.png'))
            ->maxContentWidth(MaxWidth::Full)
            ->sidebarFullyCollapsibleOnDesktop()
            ->colors([
                'primary' => Color::Indigo,
                'danger' => Color::Red,
                'gray' => Color::Slate,
                'info' => Color::Blue,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->navigationGroups([
                'إدارة المهمات',
                'متابعة تنفيذ المهمات',
                'الإعدادات',
                'تسيير',
                'تعريف المنظومة'
            ])
            ->brandName('رصد جيوفضائية')
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('3.5rem')
            ->favicon(asset('images/logo.png'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                /*Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,*/])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make()
            ]);
    }

    public function boot()
    {
        Filament::registerResources([
            MissionValidResource::class,
        ]);
        Mission::observe(MissionObserver::class);
        Suivmission::observe(SuivmissionObserver::class);
        Point::observe(PointObserver::class);
    }
    protected $listen = [
        \App\Events\ModelChanged::class => [
            \App\Listeners\LogModelChanges::class,
        ],
    ];
}
