<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the members.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all members and return them
        $members = Member::all();
        return response()->json($members, 200);
    }

    /**
     * Show the form for creating a new member.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return a view for creating a member
        // This is used mostly in Blade templates for web routes, not necessary for API
    }

    /**
     * Store a newly created member in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
        ]);

        // Create a new member
        $member = Member::create([
            'user_id' => $request->user()->id, // Assuming the user is logged in
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        // Return the created member as a response
        return response()->json($member, 201);
    }

    /**
     * Display the specified member.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the member by ID
        $member = Member::findOrFail($id);
        return response()->json($member, 200);
    }

    /**
     * Show the form for editing the specified member.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Used mostly for web forms, not necessary for API
    }

    /**
     * Update the specified member in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'dob' => 'sometimes|date',
            'address' => 'sometimes|string|max:255',
            'phone_number' => 'sometimes|string|max:15',
        ]);

        // Find the member by ID
        $member = Member::findOrFail($id);

        // Update member details
        $member->update($request->only([
            'first_name', 'last_name', 'dob', 'address', 'phone_number'
        ]));

        return response()->json($member, 200);
    }

    /**
     * Remove the specified member from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find and delete the member
        $member = Member::findOrFail($id);
        $member->delete();

        return response()->json(null, 204); // 204 No Content
    }
}

