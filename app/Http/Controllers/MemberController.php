<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::with('membership')->get();
        return view('member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $memberships = Membership::all();
        return view('member.create', compact('memberships'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'membership_id' => 'required',
            'join_date' => 'required',
        ], [
            'name.required' => 'Name harus diisi',
            'phone.required' => 'Phone harus diisi',
            'address.required' => 'Alamat harus diisi',
            'membership_id.required' => 'Membership harus dipilih',
            'join_date.required' => 'Tanggal masuk harus diisi',
        ]);
        Member::create($request->all());
        return redirect()->route('member.index')
            ->with('success', 'Member berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $memberships = Membership::all();
        return view('member.edit', compact('member', 'memberships'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'membership_id' => 'required',
            'join_date' => 'required',
        ], [
            'name.required' => 'Name harus diisi',
            'phone.required' => 'Phone harus diisi',
            'address.required' => 'Alamat harus diisi',
            'membership_id.required' => 'Membership harus dipilih',
            'join_date.required' => 'Tanggal masuk harus diisi',
        ]);
        $member = Member::findOrFail($id);
        $member->update($request->all());
        return redirect()->route('member.index')
            ->with('success', 'Member berhasil diperbarui');

    }

    /**
     * Update the specified resource in storage.
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        if ($member->invoices()->count() > 0) {
            return redirect()->route('member.index')->with('error', 'Member memiliki invoice, tidak dapat dihapus');
        }
        $member->delete();
        return redirect()->route('member.index')
            ->with('success', 'Member berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    
}

