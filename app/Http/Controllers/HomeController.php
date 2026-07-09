<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Membership;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'totalMember' => Member::count(),
            'totalMembership' => Membership::count(),
            'totalInvoice' => Invoice::count(),
            'totalPayment' => Payment::sum('amount')
        ]);
    }
}
