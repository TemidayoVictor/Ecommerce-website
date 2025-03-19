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

<section class="accounts section--lg">
        <div class="tabs__content">
            <div class="tab__content active-tab">
            @if(auth()->check())
            <h3 class="tab__header">Welcome, {{ auth()->user()->name }}</h3>
                @endif
            </div>
        </div>
        <br>
        <br>

    <div class="accounts__container container grid">
        <div class="account__tabs">
            <p class="account__tab" data-target="#dashboard">
                <i class="ri-delete-bin-line table__trash"></i> Messages
            </p>

            <p class="account__tab" data-target="#orders">
                <i class="ri-delete-bin-line table__trash"></i> Orders
            </p>

            <p class="account__tab" data-target="#update-profile">
                <i class="ri-delete-bin-line table__trash"></i> Update Profile
            </p>

            <p class="account__tab" data-target="#address">
                <i class="ri-delete-bin-line table__trash"></i> My Address
            </p>

            <p class="account__tab" data-target="#change-password">
                <i class="ri-delete-bin-line table__trash"></i> Change Password
            </p>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <p class="account__tab" >
                <i class="ri-delete-bin-line table__trash"></i> Logout
            </p>
            </a>
        </div>

        <div class="tabs__content">
            <div class="tab__content active-tab" content id="dashboard">
                 <h3 class="tab__header">Your Messages</h3>
                <div class="tab__body">
                    <p class="tab__description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam alias voluptates maxime labore ad ipsam, sed tempora iusto placeat ipsum?
                    </p>
                </div>
            </div>
        </div>

        <div class="tabs__content">
            <div class="tab__content active-tab" content id="orders">
                <h3 class="tab__header">Your Orders</h3>
                <div class="tab__body">
                    <table class="placed__order-table">
                        <tr>
                            <th>Orders</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>

                        <tr>
                            <td>#1357</td>
                            <td>March 5, 2020</td>
                            <td>Processing</td>
                            <td>$125</td>
                            <td class="view__order">View</td>
                        </tr>

                        <tr>
                            <td>#1357</td>
                            <td>March 5, 2020</td>
                            <td>Processing</td>
                            <td>$125</td>
                            <td class="view__order">View</td>
                        </tr>

                        <tr>
                            <td>#1357</td>
                            <td>March 5, 2020</td>
                            <td>Processing</td>
                            <td>$125</td>
                            <td class="view__order">View</td>
                        </tr>

                        <tr>
                            <td>#1357</td>
                            <td>March 5, 2020</td>
                            <td>Processing</td>
                            <td>$125</td>
                            <td class="view__order">View</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="tabs__content">
            <div class="tab__content active-tab" content id="update-profile">
                <h3 class="tab__header">Update Profile</h3>
                <div class="tab__body">
                    <form action="{{ route('account.updateProfile') }}" method="POST" class="form grid">
                    @csrf
                        <input type="text" name="name" id="name" class="form__input" value="{{ old('name', auth()->user()->name) }}" placeholder="Username">
                        <input type="email" name="email" id="email" class="form__input" value="{{ old('email', auth()->user()->email) }}" placeholder="Email">
                        <div class="form__btn"><button type="submit" class="btn btn--md">Save</button></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="tabs__content">
            <div class="tab__content active-tab" content id="address">
                <h3 class="tab__header">Shipping Address</h3>
                <div class="tab__body">
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
                    <a href="#" id="edit-address-btn" class="edit">Edit</a>
                </div>
            </div>
        </div>




        <div id="address-form" style="display: none;" class="tabs__content">
        <h3 class="tab__header">Edit Shipping Address</h3>
        <div class="tab__body">
    <form action="{{ route('account.shipping-address') }}" method="POST">
        @csrf
        <div>
            <label>Address Line 1</label>
            <input type="text" name="address_line1" value="{{ $address->address_line1 ?? '' }}" required>
        </div>
        <div>
            <label>Address Line 2</label>
            <input type="text" name="address_line2" value="{{ $address->address_line2 ?? '' }}">
        </div>
        <div>
            <label>City</label>
            <input type="text" name="city" value="{{ $address->city ?? '' }}" required>
        </div>
        <div>
            <label>State</label>
            <input type="text" name="state" value="{{ $address->state ?? '' }}" required>
        </div>
        <div>
            <label>Zip Code</label>
            <input type="text" name="zipcode" value="{{ $address->zipcode ?? '' }}" required>
        </div>
        <div>
            <label>Country</label>
            <input type="text" name="country" value="{{ $address->country ?? '' }}" required>
        </div>
        <button type="submit">Save Address</button>
    </form>
        </div>
</div>



        <div class="tabs__content">
            <div class="tab__content active-tab" content id="change-password">
                <h3 class="tab__header">Change Password</h3>
                <div class="tab__body">
                    <form method="POST" action="{{ route('account.change-password') }}" class="form grid">
                    @csrf

                        <input type="password" name="current_password" class="form__input" placeholder="Current Password" required>

                        <input type="password" name="new_password" class="form__input" placeholder="New Password" required>

                        <input type="password" name="new_password_confirmation" class="form__input" placeholder="Confirm Password" required>

                        <div class="form__btn"><button type="submit" class="btn btn--md">Save</button></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection