<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the donations.
     */
    public function index()
    {
        // Fetch paginated donations
        $donations = Donation::with(['donor', 'campaign'])->paginate(10); // Eager load relations if defined
        return view('donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new donation.
     */
    public function create(Request $request)
    {
        // Pass campaign_id if provided in the request
        $campaignId = $request->get('campaign_id');
        return view('donations.create', compact('campaignId'));
    }

    /**
     * Store a newly created donation in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'donor_id' => 'required|exists:donors,id', // Ensure donor exists
            'campaign_id' => 'required|exists:fundraising_campaigns,id', // Ensure campaign exists
            'amount' => 'required|numeric|min:1', // Validate donation amount
            'payment_method' => 'required|string|max:255', // Validate payment method
        ]);

        // Create a new donation record
        Donation::create($validated);

        // Redirect back with success message
        return redirect()->route('donations.index')->with('success', 'Donation made successfully!');
    }

    /**
     * Display the specified donation details.
     */
    public function show($id)
    {
        // Find the donation or throw a 404 error
        $donation = Donation::with(['donor', 'campaign'])->findOrFail($id);
        return view('donations.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified donation.
     */
    public function edit($id)
    {
        // Find the donation for editing
        $donation = Donation::findOrFail($id);
        return view('donations.edit', compact('donation'));
    }

    /**
     * Update the specified donation in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'campaign_id' => 'required|exists:fundraising_campaigns,id',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|max:255',
        ]);

        // Find the donation and update it
        $donation = Donation::findOrFail($id);
        $donation->update($validated);

        // Redirect back with success message
        return redirect()->route('donations.index')->with('success', 'Donation updated successfully!');
    }

    /**
     * Remove the specified donation from the database.
     */
    public function destroy($id)
    {
        // Find the donation and delete it
        $donation = Donation::findOrFail($id);
        $donation->delete();

        // Redirect back with success message
        return redirect()->route('donations.index')->with('success', 'Donation deleted successfully!');
    }
}
