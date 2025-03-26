<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Order Details</h1>

        <!-- Order Details Card -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Order Information</h4>
            </div>
            <div class="card-body">
                <!-- Grid layout for order details -->
                <div class="row">
                    <div class="col-md-3">
                        <p><strong>Domain name:</strong> {{ $order->domain_name }}</p>
                        <p><strong>First Name:</strong> {{ $order->first_name }}</p>
                        <p><strong>Last Name:</strong> {{ $order->last_name }}</p>
                        <p><strong>Email address:</strong> {{ $order->email }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><strong>Phone:</strong> {{ $order->phone }}</p>
                        <p><strong>Company name:</strong> {{ $order->company_name }}</p>
                        <p><strong>Street address:</strong> {{ $order->street_address }}</p>
                        <p><strong>City:</strong> {{ $order->city }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><strong>State:</strong> {{ $order->state }}</p>
                        <p><strong>Postcode:</strong> {{ $order->postcode }}</p>
                        <p><strong>Country:</strong> {{ $order->country }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                        <p><strong>Order Total:</strong> ${{ number_format($order->price, 2) }}</p>
                        <p><strong>Status:</strong> {{ $order->status }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS (optional for modal or additional components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
