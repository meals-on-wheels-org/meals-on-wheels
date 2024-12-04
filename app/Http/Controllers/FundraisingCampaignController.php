<?php

namespace App\Http\Controllers;

use App\Models\FundraisingCampaign;
use App\Models\Review;
use Illuminate\Http\Request;

class FundraisingCampaignController extends Controller
{
    /**
     * Display a listing of fundraising campaigns.
     */
    public function index()
    {
        // Fetch all fundraising campaigns with their related reviews
        $campaigns = FundraisingCampaign::with('reviews')->get();

        return view('campaigns.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new campaign.
     */
    public function create()
    {
        return view('campaigns.create');
    }

    /**
     * Store a newly created fundraising campaign in the database.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'goal_amount' => 'required|numeric|min:0',
            'funds_raised' => 'nullable|numeric|min:0',
            'donors' => 'nullable|integer|min:0',
            'meals_funded' => 'nullable|integer|min:0',
        ]);

        // Create the fundraising campaign
        FundraisingCampaign::create($validated);

        return redirect()->route('campaigns.index')->with('success', 'Campaign created successfully!');
    }

    /**
     * Display the specified campaign details.
     */
    public function show($id)
    {
        // Fetch the campaign along with its reviews
        $campaign = FundraisingCampaign::with('reviews')->findOrFail($id);

        return view('campaigns.show', compact('campaign'));
    }

    /**
     * Show the form for editing the specified campaign.
     */
    public function edit($id)
    {
        $campaign = FundraisingCampaign::findOrFail($id);

        return view('campaigns.edit', compact('campaign'));
    }

    /**
     * Update the specified campaign in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'goal_amount' => 'required|numeric|min:0',
            'funds_raised' => 'nullable|numeric|min:0',
            'donors' => 'nullable|integer|min:0',
            'meals_funded' => 'nullable|integer|min:0',
        ]);

        // Find the campaign and update it
        $campaign = FundraisingCampaign::findOrFail($id);
        $campaign->update($validated);

        return redirect()->route('campaigns.index')->with('success', 'Campaign updated successfully!');
    }

    /**
     * Remove the specified campaign from the database.
     */
    public function destroy($id)
    {
        $campaign = FundraisingCampaign::findOrFail($id);
        $campaign->delete();

        return redirect()->route('campaigns.index')->with('success', 'Campaign deleted successfully!');
    }
}
