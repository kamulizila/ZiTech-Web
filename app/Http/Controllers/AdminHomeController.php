<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\GetStartedRequest;
use App\Models\Activity;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth'); // Ensure only authenticated users access this
    }

    /**
     * Display the Admin Dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();  // Get the currently authenticated user

        // Fetch various statistics and data
        $totalUsers = User::count();
        $totalRevenue = Order::sum('price'); // Ensure this column exists in the database
        $activeProjects = GetStartedRequest::where('projrct_status', 'approved')->count();
        $inactiveProjects = GetStartedRequest::where('projrct_status', 'pending')->count();
        $orders = Order::latest()->take(10)->get(); // Get the 10 most recent orders
        $getStartedRequests = GetStartedRequest::latest()->take(5)->get(); // Get the 5 most recent get-started requests
        // $recentActivities = Activity::latest()->take(5)->pluck('description'); // Get the 5 most recent activity descriptions

        // Return the data to the view
        return view('admin-home', compact('user', 'totalUsers', 'totalRevenue', 'activeProjects', 'inactiveProjects', 'orders', 'getStartedRequests'));
    }
}
