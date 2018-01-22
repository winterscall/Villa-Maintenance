<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

class DashboardController extends Controller
{
    public function index()
	{
		return view('dashboard');
	}
}
