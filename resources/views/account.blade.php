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
    <div class="accounts__container container grid">
        <div class="account__tabs">
            <p class="account__tab" data-target="#dashboard">
                <i class="ri-delete-bin-line table__trash"></i> Dashboard
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
                <h3 class="tab__header">Hello Rosie</h3>
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
                    <form action="" class="form grid">
                        <input type="text" class="form__input" placeholder="Username">
                        <div class="form__btn"><button class="btn btn--md">Save</button></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="tabs__content">
            <div class="tab__content active-tab" content id="address">
                <h3 class="tab__header">Shipping Address</h3>
                <div class="tab__body">
                    <address class="address">
                        3522 Interstate <br/>
                        75 Business Spur, <br />
                        Saulte Ste. <br />
                        Marie, MI 49783
                    </address>
                    <p class="city">New York</p>
                    <a href="" class="edit">Edit</a>
                </div>
            </div>
        </div>

        <div class="tabs__content">
            <div class="tab__content active-tab" content id="change-password">
                <h3 class="tab__header">Change Password</h3>
                <div class="tab__body">
                    <form action="" class="form grid">
                        
                        <input type="text" class="form__input" placeholder="Current Password">

                        <input type="text" class="form__input" placeholder="New Password">

                        <input type="text" class="form__input" placeholder="Confirm Password">

                        <div class="form__btn"><button class="btn btn--md">Save</button></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection