<?php

namespace App\View\Components;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontAnalyticsComponent extends Component
{
    public array $stats;

    public function __construct()
    {
        $today = Carbon::today();
        $monthStart = Carbon::now()->startOfMonth();

        $this->stats = [

            // 1) Today Revenue
            'today_revenue' => (float) Sale::whereDate('sold_at', $today)
                ->sum('total_amount'),

            // 2) Monthly Revenue
            'monthly_revenue' => (float) Sale::whereBetween('sold_at', [$monthStart, now()])
                ->sum('total_amount'),

            // 3) Orders Today
            'today_orders' => (int) Sale::whereDate('sold_at', $today)
                ->count(),

            // 4) Active Products
            'active_products' => (int) Product::where('is_active', true)
                ->count(),

            // 5) Low Stock Products
            'low_stock_products' => (int) Product::where('is_active', true)
                ->where('stock', '<=', 5)
                ->count(),

            // 6) Active Customers
            'active_customers' => (int) Customer::where('is_active', true)
                ->count(),
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.front-analytics-component');
    }
}
