<x-filament::page>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Sales Report</h1>

        <!-- Dropdown for Filtering -->
        <div>
            <label for="category" class="mr-2">Filter by Category:</label>
            <select id="category" wire:model.live="selectedCategory" class="form-control">
                <option value="">All Categories</option>
                @foreach(App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Total Sales -->
    <div class="mb-6">
        <h2 class="text-lg font-semibold">Total Sales for the Current Month: </h2>
        <p class="text-2xl font-bold">
            ${{ number_format($this->getSalesData()['totalSales'], 2) }}
        </p>
    </div>

    <div>
        @livewire(App\Filament\Widgets\ProductWidget::class, ['selectedCategory' => $selectedCategory])
    </div>
    <!-- Chart Container -->
    <div>
        <canvas id="dailySalesChart" style="width:100%; height:400px;"></canvas>
    </div>
</x-filament::page>
