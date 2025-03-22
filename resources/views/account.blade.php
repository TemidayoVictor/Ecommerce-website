@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')

 <section class="breadcrumb">
    <ul class="breadcrumb__list flex-1 container">
        <li><a href="" class="breadcrumb__link">Home</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Account</span></li>
    </ul>
</section>

<div class="account-container">
            @if(auth()->check())
            <h3>Welcome, {{ auth()->user()->name }}</h3>
                @endif
    <!-- Sidebar Navigation -->
    <aside class="account-sidebar">
        <h2>My Account</h2>
        <ul>
            <li class="active"><a href="#" data-target="profile">Profile</a></li>
            <li><a href="#" data-target="orders">Orders</a></li>
            <li><a href="#" data-target="wishlist">Wishlist</a></li>
            <li><a href="#" data-target="address">Shipping Address</a></li>
            <li><a href="#" data-target="password">Change Password</a></li>
            <li><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
            </a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="account-content">
        <!-- Profile Section -->
        <section id="profile" class="account-section active">
            <h3>Profile Information</h3>
            <form action="{{ route('account.updateProfile') }}" method="POST" class="account-form">
                @csrf
                <input type="text" name="name" id="name" class="form__input" value="{{ old('name', auth()->user()->name) }}" placeholder="Full Name">
                <input type="email" id="email" class="form__input" value="{{ old('email', auth()->user()->email) }}" placeholder="Email">
                <button type="submit">Update Profile</button>
            </form>
        </section>

        <!-- Orders Section -->
        <section id="orders" class="account-section">
            <h3>Your Orders</h3>
            @if($orders->isEmpty())
        <p>You have no orders yet.</p>
            @else
            <table class="account-table">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>#{{ $order->order_number }}</td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td>{{ $order->status }}</td>
                        <td>NGN{{ number_format($order->total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </section>

        <!-- Wishlist Section -->
        <section id="wishlist" class="account-section">
            <h3>Wishlist</h3>
            @if(isset($wishlistItems) && $wishlistItems->isEmpty())
        <p>Your wishlist is empty.</p>
            @else
            <ul class="wishlist-list">
           
            @foreach($wishlistItems as $item)
                <li>
                    <img src="{{ asset('storage/' . ($item->product->productImage->last()->image ?? 'default.png')) }}" alt="Product" class="wishlist-img">
                    <a>
                    <span>{{ $item->product->name }}</span>
                    <span>NGN{{ number_format($item->product->price, 2) }}</span> <br>
                    <a href="{{ route('product.show', $item->product->id) }}"><button class="remove-wishlist" style="background-color: hwb(123 18% 51%);">View</button></a>
                    <button class="remove-wishlist">Remove</button>
                </li>
                @endforeach
            </ul>
            @endif
        </section>

        <!-- Address Section -->
        <section id="address" class="account-section">
        <div id="address-display">
            @if($address)
                    <address class="address">
                    {{ $address->address }} <br/>
                    {{-- {{ $address->address_line2 ? $address->address_line2 . '<br/>' : '' }} --}}
                    {{ $address->city }}, {{ $address->state }} <br />
                    {{ $address->zipcode }}, {{ $address->country }}
                    </address>
                    <p class="city">{{ $address->country }}</p>
                    @else
                     <p>No shipping address found.</p>
                    @endif
                    <a href="#" id="edit-address-btn" class="edit-address">Edit</a>
        </div>

        <div id="address-form" style="display: none;">
        <h3 class="tab__header">Edit Shipping Address</h3>
        <div class="tab__body">
        <form action="{{ route('account.shipping-address') }}" method="POST" class="edit-address-form">
        @csrf
        <table class="address-table">
            <tr>
            <td><label>Address Line 1</label></td>
            <td><input type="text" name="address_line1" value="{{ $address->address_line1 ?? '' }}" required></td>
            </tr>
        <tr>
            <td><label>Address Line 2</label></td>
            <td><input type="text" name="address_line2" value="{{ $address->address_line2 ?? '' }}"></td>
        </tr>
        <tr>
            <td><label>City</label></td>
            <td><input type="text" name="city" value="{{ $address->city ?? '' }}" required></td>
        </tr>
        <tr>
            <td><label>State</label></td>
            <td><input type="text" name="state" value="{{ $address->state ?? '' }}" required></td>
        </tr>
        <tr>
            <td><label>Zip Code</label></td>
            <td><input type="text" name="zipcode" value="{{ $address->zipcode ?? '' }}" required></td>
        </tr>
        <tr>
            <td><label>Country</label></td>
            <td><input type="text" name="country" value="{{ $address->country ?? '' }}" required></td>
        </tr>
        </table>
        <button type="submit" class="save-address-btn">Save Address</button>
        </form>
        </div>
        </div>
        </section>

        <section id="password" class="account-section">
            <h3>Change Password</h3>
            <form method="POST" action="{{ route('account.change-password') }}" class="password-form">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" class="form__input" placeholder="Current Password" required>
                    </div>
                        
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" class="form__input" placeholder="New Password" required>
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirmation">Confirm Password</label>
                        <input type="password" name="new_password_confirmation" class="form__input" placeholder="Confirm Password" required> 
                    </div>

                    <button type="submit" class="btn btn--md">Save</button>
            </form>
        </section>


    </div>
</div>

@endsection