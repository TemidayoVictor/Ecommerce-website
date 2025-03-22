@extends('admin.layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="product-continer admin-section">
        @if ($onSale)
            <div class="admin flex section-title">
                <h3 class="">{{ $sale->name }} <span style="color: green">[Running]</span></h3>
                @include('admin.partials.settinglinks')
            </div>

            <div>
                @if($sale->brand)
                    <div class="input-field">
                        <h4>Sales for Products in - {{ $sale->category->name }} || {{ $sale->brand->name }}</h4>
                    </div>
                @elseif ($sale->category)
                    <h4>Sales for Products in - {{ $sale->category->name }}</h4>
                @else
                    <div class="input-field">
                        <h4>Sales for all Products</h4>
                    </div>
                @endif

                @if($sale->discount)
                    <div class="input-field">
                        <h4>Discount Type - {{ $sale->type }}</h4>
                    </div>
                    <div class="input-field">
                        <h4>Discount Value - {{ $sale->discount }}</h4>
                    </div>
                @endif

                <div class="input-field">
                    <h4>Start Date: {{ \Carbon\Carbon::parse($sale->start_time)->format('F d, Y') }}</h4>
                </div>

                @if($sale->end_time)
                    <div class="input-field">
                        <h4>End Date: {{ \Carbon\Carbon::parse($sale->end_time)->format('F d, Y') }}</h4>
                    </div>
                @else
                    <div class="input-field">
                        <h4>End Date: Not End Date Set</h4>
                    </div>
                @endif

                <div class="input-field">
                    <h4>Revenue - {{ $sale->revenue }}</h4>
                </div>

            </div>

            <form action="{{ route('admin.settings.update-sales', ['id' => $sale->id]) }}" method="post">
                @csrf
                <div class="input-field">
                    <label for=""> <h4>Extend Sales</h4> </label>
                    <input type="date" class="form-control" id="end" name="end" required value="{{ old('end') }}">
                    <div class="input-field">
                        <button type="submit" class="btn btn--md" style="margin-top: .5rem">Extend</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('admin.settings.end-sales', ['id' => $sale->id]) }}" method="post">
                @csrf
                <h3>End Sales</h3>
                <div class="input-field">
                    <button type="submit" onclick="return confirm('Are you sure you want to end this sale?')" class="btn btn--md delete" style="margin-top: .5rem">End Sales</button>
                </div>
            </form>
        @else
            <div class="admin flex section-title">
                <h3 class="">Start Sales</h3>
                @include('admin.partials.settinglinks')
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-field">
                    <label for=""><h4>Name</h4></label>
                    <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                </div>
                <div class="flex">
                    <div class="input-field">
                        <label for=""> <h4>Category</h4> </label>
                        <select name="category" id="category">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-field">
                        <label for=""> <h4>Brand</h4> </label>
                        <select id="brand" name="brand">
                            <option value="">Select Brand</option>
                        </select>
                    </div>
                </div>
                <div class="flex">
                    <div class="input-field">
                        <label for=""><h4>Discount Type</h4> </label>
                        <select name="type" id="">
                            <option value="percentage">Percentage (%)</option>
                            <option value="fixed">Fixed Amount ($)</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for=""> <h4>Discount Value</h4> </label>
                        <input type="number" class="form-control" id="discount" name="discount" placeholder="Enter discount value" value="{{ old('discount') }}">
                    </div>
                </div>

                <div class="flex">
                    <div class="input-field">
                        <label for="">  <h4>Start Date</h4> </label>
                        <input type="date" class="form-control" id="start" name="start" required value="{{ old('start') }}">
                    </div>

                    <div class="input-field">
                        <label for=""><h4>End Date</h4></label>
                        <input type="date" class="form-control" id="end" name="end" value="{{ old('end') }}">
                    </div>
                </div>

                <div class="input-field">
                    <button type="submit" class="btn btn--md" style="margin-top: 1rem">Run Sales</button>
                </div>
            </form>
        @endif
        <div class="data">
            <h3>All Sales</h3>
            <div>
                @forelse ($sales as $sale)
                    <div class="data-body">
                        <div class="">
                            <h4> {{ $sale->name }} </h4>
                            <div class="flex" style="margin-top: .5rem">
                                <p>Started - {{ \Carbon\Carbon::parse($sale->start_time)->format('F d, Y') }}</p>
                                @if($sale->status == 'running')
                                    <p style="color: green">Running</p>
                                @else
                                    <p>Ended - {{ \Carbon\Carbon::parse($sale->end_time)->format('F d, Y') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p>You have not generated any coupon code yet.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('scripts.category-brand')
@endpush