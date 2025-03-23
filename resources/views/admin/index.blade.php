@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="quick-views admin-section">
        <div class="view">
            <div class="number">
                <h3>{{ number_format($users) }}</h3>
            </div>
            <p>Users</p>
        </div>

        <div class="view">
            <div class="number">
                <h3>250</h3>
            </div>
            <p>Products Sold</p>
        </div>

        <div class="view">
            <div class="number">
                <h3>NGN {{ number_format($totalRevenue) }}</h3>
            </div>
            <p>Monthly Revenue</p>
        </div>

        <div class="view">
            <div class="number">
                <h3>{{ number_format($pendingOrders) }}</h3>
            </div>
            <p>Pending Orders</p>
        </div>

        <div class="view">
            <div class="number">
                <h3>{{ number_format($unfulilledfOrders) }}</h3>
            </div>
            <p>Unfulfilled Orders</p>
        </div>
    </div>

@endsection
