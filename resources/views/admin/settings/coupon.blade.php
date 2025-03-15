@extends('admin.layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="product-continer admin-section">

        <div class="admin flex section-title">
            <h3 class="">Generate Coupon Code</h3>
            @include('admin.partials.settinglinks')
        </div>
        <form action="{{ route('admin.settings.generate-coupon') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="input-field">
                    <label for=""><h4>Discount Type</h4> </label>
                    <select name="type" id="" required>
                        <option value="percentage">Percentage (%)</option>
                        <option value="fixed">Fixed Amount ($)</option>
                    </select>
                </div>
                <div class="input-field">
                    <label for="">  <h4>Discount Value</h4> </label>
                    <input type="number" class="form-control" id="discount" name="discount" required placeholder="Enter discount value" value="{{ old('discount') }}">
                </div>
            </div>

            <div class="flex">
                <div class="input-field">
                    <label for="">  <h4>Useage Limit</h4> </label>
                    <input type="number" class="form-control" id="usage_limit" name="usage_limit" required placeholder="Enter maximum usage count" value="{{ old('usage_limit') }}">
                </div>

                <div class="input-field">
                    <label for=""><h4>Expires At</h4></label>
                    <input type="date" class="form-control" id="expires_at" name="expires_at" required value="{{ old('expires_at') }}">
                </div>
            </div>

            <div class="input-field">
                <label for=""><h4>Amount</h4></label>
                <input type="number" class="form-control" id="amount" name="amount" required value="{{ old('amount') }}">
            </div>

            <div class="input-field">
                <button type="submit" class="btn btn--md" style="margin-top: 1rem">Generate Coupon Code</button>
            </div>
        </form>

        <div class="data">
            <h3>All Coupons Codes</h3>
            <div>
                @forelse ($coupons as $coupon)
                    <div class="data-body">
                        <div class="flex">
                            <h4 style="color: {{ $coupon->isValid() ? 'green' : 'red' }};"><strong>{{ $coupon->code }}</strong></h4>
                        </div>
                    </div>
                @empty
                    <p>You have not generated any coupon code yet.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
