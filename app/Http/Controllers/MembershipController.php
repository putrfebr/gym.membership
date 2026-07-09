<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberships = Membership::all();
        return view('membership.index', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('membership.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Membership::create([
            'name' => $request->name,
            'description' => $request->description,
            'monthly_price' => $request->monthly_price,
        ]);
        return redirect()->route('membership.index');
    }
   
    public function edit($id)
    {
        $membership = Membership::findOrFail($id);
        return view('membership.edit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $membership = Membership::findOrFail($id);
        $membership->update([
            'name' => $request->name,
            'description' => $request->description,
            'monthly_price' => $request->monthly_price,
        ]);
        return redirect()->route('membership.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Membership::destroy($id);
        return redirect()->route('membership.index');
    }
}
