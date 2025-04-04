<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegistered; // Import the UserRegistered model
use App\Models\GetStartedRequest; // Import the GetStartedRequest model
use App\Models\Order; // Import the Order model
use App\Models\Admin; // Import the Admin model
use Illuminate\Support\Facades\Hash; // Import Hash facade for password hashing
use Illuminate\Support\Facades\Auth; // Import Auth facade for authentication
use Illuminate\Support\Facades\Validator; // Import Validator facade for custom validation

class AuthController extends Controller
{
    /**
     * Handle user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    // Check if the email exists in the userregistered, get_started_requests, or orders tables
                    if (
                        UserRegistered::where('email', $value)->exists() ||
                        GetStartedRequest::where('email', $value)->exists() ||
                        Order::where('email', $value)->exists()
                    ) {
                        $fail('The email is already in use.');
                    }
                },
            ],
            'phone' => 'required|string',
            'password' => 'required|string|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/', // Password strength validation
        ]);

        // If validation fails, return the error response
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422); // Return 422 Unprocessable Entity status code
        }

        // Create a new user in the userregistered table
        $user = UserRegistered::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Check if the user creation failed
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User registration failed',
            ], 500); // Return 500 Internal Server Error
        }

        // Return a JSON response
        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'user' => $user,
        ]);
    }

    /**
     * Handle user login by checking userregistered, get_started_requests, and orders tables.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Only check the Admin table
        $admin = Admin::where('email', $request->email)->first();

        // Check if admin exists and password is correct
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Log in the admin using the 'admin' guard
            Auth::guard('admin')->login($admin);

            // Authentication successful
            return response()->json([
                'status' => 'success',
                'message' => 'Admin login successful',
                'user' => $admin,
                'redirect_url' => '/dashboard', // Always redirect to admin dashboard
            ]);
        }

         // Check regular users (user, get_started, and orders)
    $user = UserRegistered::where('email', $request->email)->first();
    if (!$user) {
        $user = GetStartedRequest::where('email', $request->email)->first();
    }
    if (!$user) {
        $user = Order::where('email', $request->email)->first();
    }

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::guard('web')->login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User login successful',
            'redirect_url' => '/userdashboard',
        ]);
    }
        // Authentication failed - only admins can login
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials or unauthorized access',
        ], 401);
    }
    /**
     * Handle user logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route(''); // Redirect to the login page
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Ensure 'auth.login' blade file exists
    }
}
