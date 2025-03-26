<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class DomainController extends Controller
{
    // Check if a domain is available using GoDaddy API
    public function checkDomain(Request $request)
    {
        // Validate the input
        $request->validate([
            'domain' => 'required|string',
        ]);

        $domain = $request->input('domain');
        $apiKey = env('GODADDY_API_KEY');
        $apiSecret = env('GODADDY_API_SECRET');
        $apiEnv = env('GODADDY_API_ENV', 'OTE'); // Default to OTE (test environment)

        // Determine the base URL based on the environment
        $baseUrl = $apiEnv === 'OTE' ? 'https://api.ote-godaddy.com' : 'https://api.godaddy.com';

        // GoDaddy API endpoint for domain availability
        $url = "{$baseUrl}/v1/domains/available?domain={$domain}";

        // Send request to GoDaddy API
        $response = Http::withHeaders([
            'Authorization' => 'sso-key ' . $apiKey . ':' . $apiSecret,
        ])->get($url);

        // Check if the API request was successful
        if ($response->successful()) {
            $data = $response->json();
            $basePrice = $data['price'] ?? 0; // Base price from GoDaddy
            $additionalFees = 1.00; // Additional fees (e.g., service charge)
            $totalPrice = $basePrice + $additionalFees;

            return response()->json([
                'available' => $data['available'],
                'domain' => $data['domain'],
                'basePrice' => $basePrice,
                'totalPrice' => $totalPrice,
            ]);
        } else {
            // Log error for better tracking
            \Log::error('GoDaddy API error: ' . $response->body());
            return response()->json([
                'error' => 'Failed to check domain availability.',
                'details' => $response->json(),
            ], 500);
        }
    }

    // Create a payment session with Stripe
    public function createPaymentSession(Request $request)
    {
        // Validate the input
        $request->validate([
            'domain' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $domain = $request->input('domain');
        $price = $request->input('price');

        try {
            // Initialize Stripe
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create a Stripe Checkout session
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => "Domain: {$domain}",
                        ],
                        'unit_amount' => $price * 100, // Price in cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success', ['domain' => $domain]),
                'cancel_url' => route('payment.cancel'),
            ]);

            // Redirect the user to the Stripe checkout page
            return redirect($session->url);
        } catch (\Exception $e) {
            \Log::error('Stripe Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create payment session. Please try again.'], 500);
        }
    }

    // Payment success handler, registering the domain with GoDaddy
    public function paymentSuccess(Request $request)
    {
        // Validate the input
        $request->validate([
            'domain' => 'required|string',
        ]);

        $domain = $request->query('domain');
        $apiKey = env('GODADDY_API_KEY');
        $apiSecret = env('GODADDY_API_SECRET');
        $apiEnv = env('GODADDY_API_ENV', 'OTE'); // Default to OTE (test environment)

        // Dynamically get the contact information from the authenticated user or the request
        $contactInfo = [
            'name' => auth()->user()->name, // Using authenticated user's name
            'email' => auth()->user()->email, // Using authenticated user's email
            'phone' => $request->input('phone', 'N/A'),
            'address' => [
                'street' => $request->input('street', 'N/A'),
                'city' => $request->input('city', 'N/A'),
                'state' => $request->input('state', 'N/A'),
                'postalCode' => $request->input('postalCode', 'N/A'),
                'country' => $request->input('country', 'N/A'),
            ],
        ];

        // Determine the base URL based on the environment
        $baseUrl = $apiEnv === 'OTE' ? 'https://api.ote-godaddy.com' : 'https://api.godaddy.com';

        // GoDaddy API endpoint for domain registration
        $url = "{$baseUrl}/v1/domains/purchase";

        try {
            // Send request to GoDaddy API to register the domain
            $response = Http::withHeaders([
                'Authorization' => 'sso-key ' . $apiKey . ':' . $apiSecret,
                'Content-Type' => 'application/json',
            ])->post($url, [
                'domain' => $domain,
                'consent' => [
                    'agreedAt' => now()->toIso8601String(),
                    'agreedBy' => $request->ip(),
                ],
                'contactAdmin' => $contactInfo,
                'contactBilling' => $contactInfo,
                'contactRegistrant' => $contactInfo,
                'contactTech' => $contactInfo,
                'period' => 1, // Registration period in years
                'privacy' => false, // Enable/disable privacy protection
                'renewAuto' => true, // Enable auto-renewal
            ]);

            if ($response->successful()) {
                return view('payment.success', ['domain' => $domain]);
            } else {
                \Log::error('GoDaddy API error during domain registration: ' . $response->body());
                return view('payment.error', ['error' => 'Failed to register domain.']);
            }
        } catch (\Exception $e) {
            \Log::error('Error during domain registration: ' . $e->getMessage());
            return view('payment.error', ['error' => 'An error occurred during registration. Please try again later.']);
        }
    }

    // Payment cancel handler
    public function paymentCancel(Request $request)
    {
        return view('payment.cancel');
    }

    // Render the payment page
    public function paymentPage(Request $request)
    {
        // Get domain and price from query parameters
        $domain = $request->query('domain');
        $price = $request->query('price');

        // Check if the domain and price are present in the query parameters
        if (!$domain || !$price) {
            return redirect()->route('home')->with('error', 'Domain and price are required.');
        }

        // Pass domain and price to the payment view
        return view('payment.page', [
            'domain' => $domain,
            'price' => $price,
        ]);
    }
}
