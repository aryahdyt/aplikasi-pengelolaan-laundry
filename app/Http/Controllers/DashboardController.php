<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
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
        $countOutlets = Outlet::all()->count();
        $countMembers = Member::all()->count();
        return view('dashboard', compact('countOutlets', 'countMembers'));
    }
}
