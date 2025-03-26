<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;  // Make sure this line is present
use Illuminate\Support\Facades\Hash; // Import Hash facade

class AdminController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        // Fetch all admin records
        $admins = Admin::all();

        // Pass admins to the view
        return view('admin_register', compact('admins'));
    }

    // Handle the registration form submission
    public function register(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8|confirmed', // Ensure 'password_confirmation' field is in the form
        ]);

        // Create a new admin user
        $admin = new Admin();
        $admin->full_name = $validated['full_name'];
        $admin->email = $validated['email'];
        // Hash the password using Hash::make()
        $admin->password = Hash::make($validated['password']);
        $admin->save();  // Save to the database

        // Redirect to registration page or login page with success message
        return redirect()->route('admin.register')->with('success', 'Registration successful!');
    }

    // Delete an admin
    public function destroy($adminId)
    {
        // Find the admin record by ID and delete it
        $admin = Admin::findOrFail($adminId); // Will throw a 404 error if not found
        $admin->delete();  // Delete the admin

        // Redirect with success message
        return redirect()->route('admin.register')->with('success', 'Admin deleted successfully');
    }

}
