<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Registered users')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make('Total Products', Product::count())
                ->description('Available products')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('success'),

            Stat::make('Total Orders', Order::count())
                ->description('All time orders')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('warning'),

            Stat::make('Total Categories', Category::count())
                ->description('Product categories')
                ->descriptionIcon('heroicon-m-tag')
                ->color('info'),
        ];
    }
}
