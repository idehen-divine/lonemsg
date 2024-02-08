<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth:user')->except('index');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

	/**
	 * Show the application user dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function user()
	{
		return view('user.dashboard');
	}

	/**
	 * Show the application admin dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function admin()
	{
		return view('admin.dashboard');
	}
}
