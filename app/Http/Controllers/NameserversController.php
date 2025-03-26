<?php

// app/Http/Controllers/NameserversController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameserversController extends Controller
{
    // Show the nameservers configuration page
    public function show(Request $request)
    {
        $domain = $request->query('domain'); // Get the domain from the query parameter
        return view('nameservers', ['domain' => $domain]);
    }

    // Save the nameservers configuration
    public function save(Request $request)
    {
        $data = $request->validate([
            'domain' => 'required|string',
            'nameserver1' => 'required|string',
            'nameserver2' => 'required|string',
            'nameserver3' => 'nullable|string',
            'nameserver4' => 'nullable|string',
            'nameserver5' => 'nullable|string',
        ]);

        // Save the nameservers configuration to the database
        // Example: Nameserver::create($data);

        return response()->json(['message' => 'Nameservers saved successfully!']);
    }
}
