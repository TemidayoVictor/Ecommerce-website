@extends('admin.layouts.app')

@section('title')
    All Users
@endsection

@section('content')

<div class="flex">
    <h3> {{ $pageTitle }} </h3>
    <a href="{{ route('admin.users.create') }}" class="btn btn--sm">Add a user</a>
</div>

<div class="orders">
    @forelse($users as $key => $user)
        <a href=" {{ route('admin.order-user', ['id' => $user->id]) }} " class="order-box">
            <div class="flex">
                <h3>{{ $user->name }}</h3>
                <h3>{{ number_format(count($user->order)) }} Order(s)</h3>
            </div>
            <div class="flex">
                <p>Joined At: {{ $user->created_at->format('F d, Y') }}</p>
                <p>Email: {{ $user->email }}</p>
            </div>
        </a>
    @empty
        <p>You do not have any orders currently</p>
    @endforelse
</div>

<!-- Pagination -->
<div class="pagination">
    {{ $users->links() }}
</div>

@endsection