<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\UserRegistered;
use App\Models\Order;
use App\Models\GetStartedRequest;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get the logged-in user
        $user = Auth::user();

        // Ensure user is authenticated
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
        }

        // Retrieve actual data from the database
        $totalUsers = UserRegistered::count(); // Count total registered users
        $totalRevenue = Order::sum('total_price'); // Sum revenue from orders
        $activeProjects = GetStartedRequest::where('projrct_status', 'active')->count(); // Count active projects
        $inactiveProjects = GetStartedRequest::where('projrct_status', 'inactive')->count(); // Count active projects
        $orders = Order::latest()->take(10)->get(); // Adjust limit as needed
        $getStartedRequests = GetStartedRequest::latest()->take(5)->get();  // Get recent "Get Started" requests

        // Example: Fetch recent activities dynamically (assuming an Activity model exists)
        $recentActivities = [
            $user->full_name . ' logged in.',
            'New project "ZiTech Dashboard" created.',
            'Revenue increased by 10% this month.',
        ];

        // Pass data to the view
        return view('dashboard', compact('user', 'totalUsers', 'totalRevenue', 'activeProjects', 'inactiveProjects', 'recentActivities','orders', 'getStartedRequests'));
    }
}
