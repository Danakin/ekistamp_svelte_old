<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        return Inertia::render('Dashboard', compact('user'));
    }
}
