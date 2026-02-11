<!-- Analytics -->
<div class="services">
    <div class="container-fluid">
        <div class="row">

            {{-- Today Sales --}}
            <div class="col-md-4">
                <div class="service-item first-item text-center">
                    <h4>Today Sales</h4>
                    <strong style="font-size:30px;">
                        {{ number_format($stats['today_revenue'], 2) }}
                    </strong>
                </div>
            </div>

            {{-- Monthly Sales --}}
            <div class="col-md-4">
                <div class="service-item second-item text-center">
                    <h4>Monthly Sales</h4>
                    <strong style="font-size:30px;">
                        {{ number_format($stats['monthly_revenue'], 2) }}
                    </strong>
                </div>
            </div>

            {{-- Orders Today --}}
            <div class="col-md-4">
                <div class="service-item third-item text-center">
                    <h4>Orders Today</h4>
                    <strong style="font-size:30px;">
                        {{ $stats['today_orders'] }}
                    </strong>
                </div>
            </div>

            {{-- Active Products --}}
            <div class="col-md-4">
                <div class="service-item fourth-item text-center">
                    <h4>Active Products</h4>
                    <strong style="font-size:30px;">
                        {{ $stats['active_products'] }}
                    </strong>
                </div>
            </div>

            {{-- Low Stock --}}
            <div class="col-md-4">
                <div class="service-item fivth-item text-center">
                    <h4>Low Stock Products</h4>
                    <strong style="font-size:30px;">
                        {{ $stats['low_stock_products'] }}
                    </strong>
                </div>
            </div>

            {{-- Active Customers --}}
            <div class="col-md-4">
                <div class="service-item sixth-item text-center">
                    <h4>Active Customers</h4>
                    <strong style="font-size:30px;">
                        {{ $stats['active_customers'] }}
                    </strong>
                </div>
            </div>

        </div>
    </div>
</div>