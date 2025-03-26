<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .payment-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        #card-element {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background: #fff;
        }
        #card-errors {
            color: #dc3545;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1 class="text-center mb-4">Payment Page</h1>

        <!-- Display Domain and Price -->
        <div id="domain-info" class="mb-4">
            <p>You are purchasing the domain: <strong id="domain-name"></strong></p>
            <p>Total Price: <strong id="domain-price"></strong></p>
        </div>

        <!-- Payment Form -->
        <form id="payment-form">
            <!-- Stripe Card Element -->
            <div id="card-element">
                <!-- Stripe card element will be inserted here -->
            </div>

            <!-- Display errors -->
            <div id="card-errors" role="alert"></div>

            <!-- Submit Button -->
            <button id="submit-button" class="btn btn-primary w-100">
                <span id="button-text">Pay Now</span>
                <span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
            </button>
        </form>
    </div>

    <script>
        // Initialize Stripe
        const stripe = Stripe('pk_test_51QiNndJEFEyRM2DbZVVcKRswoOsX6bRts8YOATpLh5RanYd1IVuqakUHNtSOvX2WYv0k0636OjDbQvAPBJXdqEax00uznZXXoc');
        const elements = stripe.elements();

        // Customize the Stripe card element
        const cardElement = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#495057',
                    '::placeholder': {
                        color: '#6c757d',
                    },
                },
            },
        });
        cardElement.mount('#card-element');

        // Fetch domain and price from query parameters
        const urlParams = new URLSearchParams(window.location.search);
        const domain = urlParams.get('domain');
        const price = urlParams.get('price');

        // Display domain and price
        if (domain && price) {
            document.getElementById('domain-name').textContent = domain;
            document.getElementById('domain-price').textContent = `$${price}`;
        } else {
            // Redirect back to the domain search page if domain or price is missing
            window.location.href = '/';
        }

        // Handle form submission
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            // Disable the submit button and show spinner
            document.getElementById('submit-button').disabled = true;
            document.getElementById('button-text').style.display = 'none';
            document.getElementById('button-spinner').style.display = 'inline-block';

            // Create a payment method with Stripe
            const { error, paymentMethod } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            });

            if (error) {
                // Show error to the user
                document.getElementById('card-errors').textContent = error.message;
                document.getElementById('submit-button').disabled = false;
                document.getElementById('button-text').style.display = 'inline-block';
                document.getElementById('button-spinner').style.display = 'none';
            } else {
                // Send paymentMethod.id to your server
                const response = await fetch('/create-payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        paymentMethodId: paymentMethod.id,
                        domain: domain,
                        price: price,
                    }),
                });

                const paymentIntent = await response.json();

                if (paymentIntent.error) {
                    // Show error to the user
                    document.getElementById('card-errors').textContent = paymentIntent.error;
                    document.getElementById('submit-button').disabled = false;
                    document.getElementById('button-text').style.display = 'inline-block';
                    document.getElementById('button-spinner').style.display = 'none';
                } else {
                    // Payment succeeded
                    alert('Payment successful!');
                    window.location.href = '/payment/success';
                }
            }
        });
    </script>

    <!-- Bootstrap JS (Optional, only needed if you use Bootstrap JS components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
