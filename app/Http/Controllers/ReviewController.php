<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReviewController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $validated['user_id'] = auth()->id();
        $validated['product_id'] = $product->id;

        Review::create($validated);

        return back()->with('success', 'Review submitted successfully.');
    }

    public function destroy(Review $review)
    {
        // Check if the authenticated user owns the review or is an admin
        if (auth()->id() !== $review->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $review->delete();
        return back()->with('success', 'Review deleted successfully.');
    }
}
