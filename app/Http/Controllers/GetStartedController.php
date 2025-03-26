<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegistered; // Import the UserRegistered model
use App\Models\GetStartedRequest; // Import the GetStartedRequest model
use Illuminate\Support\Facades\Hash; // Import Hash facade for password hashing
use Illuminate\Support\Facades\Validator; // Import Validator facade for custom validation

class GetStartedController extends Controller
{
    /**
     * Handle the Get Started form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    // Check if the email exists in either the userregistered or get_started_requests table
                    if (UserRegistered::where('email', $value)->exists() || GetStartedRequest::where('email', $value)->exists()) {
                        $fail('The email is already in use.');
                    }
                },
            ],
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'company_location' => 'required|string|max:255',
            'company_address' => 'required|string',
            'service_type' => 'required|string|max:255',
            'system_proposal' => 'required|string',
            'document_upload' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // If validation fails, return the error response
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Handle file upload if a file is present
        $filePath = null; // Default to null in case no file is uploaded
        if ($request->hasFile('document_upload')) {
            $file = $request->file('document_upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }

        // Store data in the get_started_requests table
        $getStartedRequest = GetStartedRequest::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'company_name' => $request->company_name,
            'company_location' => $request->company_location,
            'company_address' => $request->company_address,
            'service_type' => $request->service_type,
            'system_proposal' => $request->system_proposal,
            'document_path' => $filePath,
        ]);

        // Return a JSON response
        return response()->json([
            'status' => 'success',
            'message' => 'Your request has been submitted successfully!',
            'data' => $getStartedRequest,
        ]);
    }

    /**
     * Display a specific Get Started request.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Find the request by its ID
        $request = GetStartedRequest::findOrFail($id);

        // Return a view with the request data
        return view('view_get', compact('request'));
    }

    /**
     * Delete a specific Get Started request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        // Find the request by its ID
        $getStartedRequest = GetStartedRequest::findOrFail($id);

        // Delete the request
        $getStartedRequest->delete();

        // Return a success response
        return response()->json([
            'status' => 'success',
            'message' => 'Request has been deleted successfully.',
        ]);
    }

    /**
     * Confirm a specific Get Started request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirm($id)
    {
        // Find the request by its ID
        $getStartedRequest = GetStartedRequest::findOrFail($id);

        // Update the request status to confirmed
        $getStartedRequest->projrct_status = 'approved'; // Assuming there's a status field
        $getStartedRequest->save();

        // Return a success response
        return response()->json([
            'status' => 'success',
            'message' => 'Request has been confirmed successfully.',
        ]);
    }
}
