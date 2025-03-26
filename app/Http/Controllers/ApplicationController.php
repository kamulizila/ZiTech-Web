<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function submitApplication(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'full_name' => 'required|string|max:255',  // Match input name from form
            'email' => 'required|email|unique:applications,email',  // Ensure the email is unique
            'position_applied' => 'required|string|max:255',  // Match input name from form
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',  // File validation
        ]);

        // Store resume
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Save application
        Application::create([
            'full_name' => $request->full_name,  // Match input name from form
            'email' => $request->email,
            'position_applied' => $request->position_applied,  // Match input name from form
            'resume' => $resumePath,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Application submitted successfully.');
    }

    public function manageApplications()
    {
        // Retrieve all applications
        $applications = Application::all();
        return view('manage_applications', compact('applications'));
    }

    public function deleteApplication($id)
{
    $application = Application::findOrFail($id);
    $application->delete();

    return redirect()->back()->with('success', 'Application deleted successfully');
}

}
