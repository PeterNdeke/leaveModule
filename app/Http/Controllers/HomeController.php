<?php

namespace App\Http\Controllers;

use App\Leave;

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
        $leave = Leave::with('user')->orderBy('id', 'DESC')->where('user_id', auth()->id())->get();

        return view('home', compact('leave'));
    }
}
