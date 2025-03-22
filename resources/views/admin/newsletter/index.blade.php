@extends('admin.layouts.app')

@section('content')

<div class="table-responsive">
    <h2>Newsletter Subscribers</h2>
    <table class="newsletter-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Subscribed On</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($subscribers as $index => $subscriber)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $subscriber->email }}</td>
                <td>{{ $subscriber->created_at->format('M d, Y') }}</td>
                <td data-label="">
                            <form data-id="{{ $subscriber->id }}" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-btn">Delete</button>
                            </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
            {{ $subscribers->links() }}
        </div>
    </div>
@endsection
