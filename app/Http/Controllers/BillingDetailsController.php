<?php

// app/Http/Controllers/BillingDetailsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingDetailsController extends Controller
{
    // Show the billing details page
    public function show()
    {
        return view('billing-details');
    }

    // Save the billing details
    public function save(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'companyName' => 'nullable|string',
            'streetAddress' => 'required|string',
            'streetAddress2' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postcode' => 'required|string',
            'country' => 'required|string',
            'password' => 'required|string|min:5',
            'confirmPassword' => 'required|same:password',
        ]);

        // Save the billing details to the database
        // Example: BillingDetail::create($data);

        return response()->json(['message' => 'Billing details saved successfully!']);
    }
}
