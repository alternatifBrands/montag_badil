<?php

namespace App\Filament\Widgets;

use App\Models\Brand;
use App\Models\BrandAlternative;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAlternative;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserWidget extends BaseWidget
{    protected function getStats(): array
    {
        return [
            Stat::make('New Users', User::count())
                ->description('New users that have joined')
                ->descriptionIcon('heroicon-s-user-group', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 40])
                ->color('success'),
            Stat::make('Categories', Category::count())
                ->description('categories in our store')
                ->descriptionIcon('heroicon-s-rectangle-stack', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 40])
                ->color('info'),
            Stat::make('Products', Product::count())
                ->description('products in our store')
                ->descriptionIcon('heroicon-s-rectangle-stack', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 40])
                ->color('danger'),
            Stat::make('Alternative Products', ProductAlternative::count())
                ->description('alternative products')
                ->descriptionIcon('heroicon-s-rectangle-stack', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 40])
                ->color('success'),
            Stat::make('Brands', Brand::count())
                ->description('brands in our store')
                ->descriptionIcon('heroicon-s-rectangle-stack', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 40])
                ->color('danger'),
            Stat::make('Alternative Brands', BrandAlternative::count())
                ->description('alternative brands')
                ->descriptionIcon('heroicon-s-rectangle-stack', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 40])
                ->color('success'),
        ];
    }
}
