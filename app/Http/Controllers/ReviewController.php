<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'review' => 'required|min:5',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'review' => $request->review,
            'rating' => $request->rating,
            'approved' => false // Requires admin approval
        ]);

        return redirect()->back()->with('success', 'Your review has been submitted and is awaiting approval.');
    }

    public function index()
    {
        $reviews = Review::where('approved', false)->with('user', 'product')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['approved' => true]);

        return redirect()->back()->with('success', 'Review approved successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}
