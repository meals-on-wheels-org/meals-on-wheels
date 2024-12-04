<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Store a new donor in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255', // Donor's name is required
            'email' => 'required|email|unique:donors,email', // Unique email required
            'phone' => 'nullable|string|max:20', // Optional phone number
            'address' => 'nullable|string|max:500', // Optional address
        ]);

        // Create a new donor record
        Donor::create($validated);

        // Redirect back with a success message
        return redirect()->route('donors.index')->with('success', 'Donor added successfully!');
    }

    /**
     * Display the specified donor.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        // Retrieve the donor by ID or fail if not found
        return Donor::findOrFail($id);
    }

    /**
     * Display a paginated list of donors.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        // Return a paginated list of donors
        return Donor::paginate(10);
    }

    /**
     * Show the form for creating a new donor.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for creating a donor
        return view('donors.create');
    }

    /**
     * Update the specified donor's information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:donors,email,' . $id, // Ignore unique check for the current donor
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        // Find the donor and update their information
        $donor = Donor::findOrFail($id);
        $donor->update($validated);

        // Redirect back with a success message
        return redirect()->route('donors.index')->with('success', 'Donor updated successfully!');
    }

    /**
     * Delete the specified donor from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the donor and delete them
        $donor = Donor::findOrFail($id);
        $donor->delete();

        // Redirect back with a success message
        return redirect()->route('donors.index')->with('success', 'Donor deleted successfully!');
    }
}
