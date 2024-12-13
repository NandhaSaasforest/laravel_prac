<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Reactive;

class SalesReport extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar'; // Choose an appropriate icon.
    protected static string $view = 'filament.pages.sales-report'; // Points to the Blade view.
    
    public $selectedCategory = null;

    public function getSalesData()
    {
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        $totalSales = DB::table('sales')
            ->when($this->selectedCategory, function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $last7DaysSales = DB::table('sales')
            ->when($this->selectedCategory, function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->whereBetween('created_at', [now()->subDays(7), now()])
            ->selectRaw('DATE(created_at) as date, SUM(amount) as total')
            ->groupBy('date')
            ->pluck('total', 'date');

        return [
            'totalSales' => $totalSales,
            'dailySales' => $last7DaysSales,
        ];
    }
}
