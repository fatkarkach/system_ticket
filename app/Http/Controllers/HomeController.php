<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tickets;

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
        $tickets= tickets::latest()->paginate(5);

        return view('tickets.home',compact('tickets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('tickets.adminHome');
    }
}
