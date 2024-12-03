<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a new review in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'reviewer_id' => 'required|exists:donors,id', // Reviewer must exist in the donors table
            'campaign_id' => 'required|exists:fundraising_campaigns,id', // Campaign must exist
            'rating' => 'required|integer|min:1|max:5', // Rating between 1 and 5
            'comment' => 'nullable|string|max:1000', // Optional comment with a max length
        ]);

        // Create a new review record
        Review::create($validated);

        // Redirect back with a success message
        return redirect()->route('campaigns.index')->with('success', 'Review submitted successfully!');
    }

    /**
     * Display a paginated list of reviews.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        // Return a paginated list of reviews
        return Review::paginate(10);
    }

    /**
     * Show the form for creating a new review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        // Retrieve the campaign ID from the request (if applicable)
        $campaignId = $request->campaign_id;

        // Return the view for creating a review, passing the campaign ID
        return view('reviews.create', compact('campaignId'));
    }

    /**
     * Display the specified review.
     *
     * @param  int  $id
     * @return \App\Models\Review
     */
    public function show($id)
    {
        // Retrieve the review by ID, or fail if not found
        return Review::findOrFail($id);
    }

    /**
     * Delete the specified review.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find and delete the review
        $review = Review::findOrFail($id);
        $review->delete();

        // Redirect back with a success message
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }
}
