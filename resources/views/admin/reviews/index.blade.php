@extends('admin.layouts.app')

@section('title')
    All Reviews
@endsection

@section('content')
    <h2>Pending Reviews</h2>
    <table class="admin-table">
        <tr>
            <th>Product</th>
            <th>User</th>
            <th>Rating</th>
            <th>Review</th>
            <th>Actions</th>
        </tr>
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->product->name }}</td>
                <td>{{ $review->user->name }}</td>
                <td>⭐ {{ $review->rating }}/5</td>
                <td>{{ $review->review }}</td>
                <td>
                    <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="approve-btn">Approve</button>
                    </form>
                    <form action="{{ route('admin.reviews.delete', $review->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
