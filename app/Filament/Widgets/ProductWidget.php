<?php

namespace App\Filament\Widgets;

use App\Models\Sales;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Livewire\Attributes\Reactive;

class ProductWidget extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    #[Reactive]

    public $selectedCategory = null;

    protected static ?string $pollingInterval = '1s';


    protected function getData(): array
    {
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        $totalSales = Sales::when($this->selectedCategory, function ($query) {
            $query->where('category_id', $this->selectedCategory);
        })
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        // dd($totalSales);

        $last7DaysSales = Sales::when($this->selectedCategory, function ($query) {
            $query->where('category_id', $this->selectedCategory);
        })
            ->whereBetween('created_at', [now()->subDays(7), now()])
            ->selectRaw('DAYNAME(created_at) as day, SUM(amount) as total')
            ->groupBy('day')
            ->pluck('total', 'day')->toArray();

        return
            [
                'labels' => array_keys($last7DaysSales),
                'datasets' => [
                    [
                        'label' => 'Sales',
                        'backgroundColor' => '#4CAF50',
                        'data' => array_values(($last7DaysSales)),

                    ],
                ],
            ];
    }

    protected function getType(): string
    {
        return 'line';
    }
    protected function getOptions(): array
    {
        return [
                'indexAxis' => 'y',
                'scales' => [
                    'x' => [
                        'beginAtZero' => true,
                    ],
                ],
                ];
    }
}
