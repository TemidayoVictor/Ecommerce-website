@extends('admin.layouts.app')

@section('title')
    All Users
@endsection

@section('content')


<div class="product-continer admin-section">
        <div class="admin flex section-title">
            <h3 class="">Users</h3>
            <a href="{{ route('admin.users.create') }}" class="btn btn--sm">Add a user</a>
        </div>

    <div class="admin-user-table">
        <h2>Users List</h2>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th> <!-- Numbering Column -->
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Joined</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $users->firstItem() + $loop->index }}</td> <!-- Auto-numbering -->
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection