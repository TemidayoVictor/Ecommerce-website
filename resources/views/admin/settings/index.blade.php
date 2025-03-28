@extends('admin.layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="product-continer admin-section">
        @if ($type == 'add')
            <div class="admin flex section-title">
                <h3 class="">Add Delivery Location</h3>
                @include('admin.partials.settinglinks')
            </div>
            <form action="{{ route('admin.settings.add-location') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex">
                    <div class="input-field">
                        <label for="">  <h4>Location</h4> </label>
                        <input type="text" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="input-field">
                        <label for="">  <h4>Price</h4> </label>
                        <input type="number" name="price" value="{{ old('price') }}" required>
                    </div>
                </div>

                <div class="input-field">
                    <label for=""> <h4>Description</h4> </label>
                    <input type="text" name="description" value="{{ old('description') }}" required>
                </div>

                <div class="input-field">
                    <button type="submit" class="btn btn--md" style="margin-top: 1rem">Add Location</button>
                </div>
            </form>
        @elseif($type == 'edit')
            <div class="admin flex section-title">
                <h3 class="">Edit {{ $location->name }}</h3>
                @include('admin.partials.settinglinks')
            </div>
            <form action="{{ route('admin.settings.edit-location', ['id' => $location->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex">
                    <div class="input-field">
                        <label for="">  <h4>Location</h4> </label>
                        <input type="text" name="name" value="{{ $location->name }}" required>
                    </div>
                    <div class="input-field">
                        <label for="">  <h4>Price</h4> </label>
                        <input type="number" name="price" value="{{ $location->price }}" required>
                    </div>
                </div>

                <div class="input-field">
                    <label for=""> <h4>Description</h4> </label>
                    <textarea name="description" required>{{ $location->description }}</textarea>
                </div>

                <div class="input-field">
                    <button type="submit" class="btn btn--md" style="margin-top: 1rem">Edit Location</button>
                </div>
            </form>
        @endif
        <div class="data">
            <h3>All Delivery Locations</h3>
            <div>
                @forelse ($deliveryLocations as $location)
                    <div class="data-body">
                        <div class="flex">
                            <h4><strong> {{ $location->name }} </strong></h4>
                            <p><strong>{{ number_format($location->price) }}</strong></p>
                        </div>

                        <div>
                            <p>{{ $location->description }}</p>
                        </div>

                        <form action="{{ route('admin.settings.delete-location', ['id' => $location->id]) }}" method="post" style="margin-bottom: .3rem;">
                            @csrf
                            <div class="flex-end">
                                <a href=" {{ route('admin.settings.edit-location', ['id' => $location->id]) }} " class="btn btn--sm">Edit</a>
                                <button class="btn btn--sm delete">Delete</button>
                            </div>

                        </form>
                    </div>
                @empty
                    <p>You have not added any delivery location yet</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
