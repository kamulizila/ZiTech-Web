<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Details</title>
    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
        crossorigin="anonymous">
        <style>
    /* Add padding to the top of the main content to account for the fixed navbar */
    .main-content {
        padding-top: 80px; /* Adjust this value based on the height of your navbar */
    }

    /* Other existing styles */
    body {
        font-family: Arial, sans-serif;
    }

    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .nav-link {
        margin: 0 10px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.8);
        transition: color 0.3s;
    }

    .nav-link:hover {
        color: white;
    }

    footer {
        background: #212529;
        color: #adb5bd;
        padding: 40px 0;
    }

    footer p {
        margin-bottom: 0;
    }

    footer a {
        color: #adb5bd;
        transition: color 0.3s;
    }

    footer a:hover {
        color: #00bcd4;
    }

    .no-underline {
        text-decoration: none !important;
    }

    .no-underline::before {
        content: ">";
        color: green;
        margin-right: 5px;
    }

    .footer-link {
        color: rgba(255, 255, 255, 0.7) !important;
        transition: color 0.3s;
    }

    .footer-link:hover {
        color: rgba(255, 255, 255, 1) !important;
    }

    .social-link {
        display: inline-block;
        padding: 10px 20px;
        border: 2px solid transparent;
        border-radius: 5px;
        text-decoration: none !important;
        color: white;
        transition: all 0.3s ease;
    }

    .social-link.facebook {
        background-color: #1877f2;
        border-color: #1877f2;
    }

    .social-link.facebook:hover {
        background-color: transparent;
        color: #1877f2;
    }

    .social-link.twitter {
        background-color: #1da1f2;
        border-color: #1da1f2;
    }

    .social-link.twitter:hover {
        background-color: transparent;
        color: #1da1f2;
    }

    .social-link.instagram {
        background-color: #e4405f;
        border-color: #e4405f;
    }

    .social-link.instagram:hover {
        background-color: transparent;
        color: #e4405f;
    }

    .list-unstyled {
        color: rgba(255, 255, 255, 0.7);
    }
</style>
</head>
<body>
   <!-- Header -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <!-- Logo and Brand Name -->
            <a class="navbar-brand" href="#">
                <img src="storage\images\zitech-solution-high-resolution-logo.png" alt="ZiTech Solutions Logo" width="60" height="40" class="d-inline-block align-text-top me-2">
                ZiTech Solutions
            </a>

            <!-- Toggler Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#portfolioModal">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

     <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="loginForm" action="" method="POST">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registerForm">
                        <div class="mb-3">
                            <label for="registerName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="registerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="registerEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="registerPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="registerPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="contactName" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="contactName" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="contactEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactMessage" class="form-label">Message</label>
                            <textarea class="form-control" id="contactMessage" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal -->
    <div class="modal fade" id="portfolioModal" tabindex="-1" aria-labelledby="portfolioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="portfolioModalLabel">Our Portfolio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <img src="storage/images/zitechfounder.jpg" class="card-img-top" alt="ZiTech Solutions Founder">
                                <div class="card-body">
                                    <h5 class="card-title">ZiTech Solutions Founder</h5>
                                    <p class="card-text">
                                        Meet the visionary behind ZiTech Solutions, a passionate entrepreneur dedicated to transforming businesses through innovative technology. With over a decade of experience in software development and digital solutions, our founder has built ZiTech Solutions into a trusted name in the tech industry. Driven by a mission to empower businesses with cutting-edge tools, the founder's leadership continues to inspire our team to deliver excellence in every project.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <img src="storage/images/pkmsfamily.png" class="card-img-top" alt="Project 1">
                                <div class="card-body">
                                    <h5 class="card-title">Project 1</h5>
                                    <p class="card-text">Description of Project 1.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <img src="storage/images/Screenshot 2025-01-16 085400.png" class="card-img-top" alt="Project 2">
                                <div class="card-body">
                                    <h5 class="card-title">Project 2</h5>
                                    <p class="card-text">Description of Project 2.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Careers Modal -->
    <div class="modal fade" id="careersModal" tabindex="-1" aria-labelledby="careersModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="careersModalLabel">Careers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Get Your Career Today</h5>
                    <ul>
                    <!-- Link to Open Positions -->
                    <li>
                        <a href="{{ route('careers.open-positions') }}" class="btn btn-link">View Open Positions</a>
                    </li>

                    <!-- Link to Submit Application -->
                    <li>
                        <a href="{{ route('careers.submit-application') }}" class="btn btn-link">Submit Your Application</a>
                    </li>

                    <!-- Link to Join Our Team -->
                    <li>
                        <a href="{{ route('careers.join-team') }}" class="btn btn-link">Join Our Team</a>
                    </li>

                    <!-- Link to Explore Job Opportunities -->
                    <li>
                        <a href="{{ route('careers.explore-jobs') }}" class="btn btn-link">Explore Job Opportunities</a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>



    <!-- Main Content -->
<div class="main-content">
    <div class="container">
        <h2>Billing Details</h2>
        <!-- Personal Information -->
        <form id="billingForm">
            @csrf
            <h5>Personal Information</h5>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="firstName" class="form-label">First Name *</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>
                <div class="col-md-3">
                    <label for="lastName" class="form-label">Last Name *</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>
                <div class="col-md-3">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-3">
                    <label for="phone" class="form-label">Phone Number *</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
            </div>

            <!-- Billing Address -->
            <h5 class="mt-4">Billing Address</h5>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="companyName" class="form-label">Company Name (Optional)</label>
                    <input type="text" class="form-control" id="companyName" name="companyName">
                </div>
                <div class="col-md-3">
                    <label for="streetAddress" class="form-label">Street Address *</label>
                    <input type="text" class="form-control" id="streetAddress" name="streetAddress" required>
                </div>
                <div class="col-md-3">
                    <label for="streetAddress2" class="form-label">Street Address 2 (Optional)</label>
                    <input type="text" class="form-control" id="streetAddress2" name="streetAddress2">
                </div>
                <div class="col-md-3">
                    <label for="city" class="form-label">City *</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="state" class="form-label">State *</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>
                <div class="col-md-3">
                    <label for="postcode" class="form-label">Postcode *</label>
                    <input type="text" class="form-control" id="postcode" name="postcode" required>
                </div>
                <div class="col-md-3">
                    <label for="country" class="form-label">Country *</label>
                    <select class="form-control" id="country" name="country" required>
                        <option value="Tanzania">Tanzania</option>
                        <!-- Add other countries here -->
                    </select>
                </div>
            </div>

            <!-- Account Security -->
            <h5 class="mt-4">Account Security</h5>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="password" class="form-label">Password *</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-md-3">
                    <label for="confirmPassword" class="form-label">Confirm Password *</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-outline-secondary mt-4" onclick="generatePassword()">Generate Password</button>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Continue to Payment</button>
                </div>
            </div>
        </form>
    </div>
</div>
  <!-- Footer -->
  <footer>
        <div class="container">
            <div class="row">
                <!-- ZiTech Solutions Contact Information -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-white">ZiTech Solution</h5>
                    <p style="color: rgba(255, 255, 255, 0.7);">
                        The Managing Director,<br>
                        ZiTech Solutions<br>
                        P.O. Box 12345<br>
                        Dar es Salaam, Tanzania<br>
                        Phone: +255-76-8249444<br>
                        Fax: +255-62-1335501<br>
                        Email: info@zitechsolutions.com
                    </p>
                </div>


                <!-- Systems -->
                <div class="col-md-2 mb-4">
                    <h5 class="text-white">Systems Developed</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://pkmsfamily.co.tz/" class="footer-link no-underline"> pkmsfamily</a></li>
                        <li><a href="https://kapandevcf.co.tz/" class="footer-link no-underline"> kapandevcf</a></li>
                    </ul>
                </div>

                <!-- Working Hours -->
                <div class="col-md-2 mb-4">
                    <h5 class="text-white">Working Hours</h5>
                    <p style="color: rgba(255, 255, 255, 0.7);">
                        Monday to Saturday: 07:30 - 16:30<br>
                        Sunday: Closed
                    </p>
                </div>
            </div>

            <!-- Copyright -->
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-white mb-0">&copy; <?= date('Y') ?> ZiTech Solutions. All rights reserved.</p>
                    <div class="d-flex justify-content-center mb-3">
                        <a href="#" class="me-3 social-link facebook">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="#" class="me-3 social-link twitter">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="#" class="social-link instagram">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous">
    </script>

    <script>
        // Function to generate a random password
        function generatePassword() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*';
            let password = '';
            for (let i = 0; i < 10; i++) {
                password += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            document.getElementById('password').value = password;
            document.getElementById('confirmPassword').value = password;
        }

        // Handle form submission
        document.getElementById('billingForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(this);

            // Send data to the backend
            fetch('/save-billing-details', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                window.location.href = '/payment'; // Redirect to the payment page
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while saving billing details.');
            });
        });
    </script>

     <!-- Smooth Scrolling Script -->
     <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
<script>
document.getElementById('registerForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Get form data
    const fullName = document.getElementById('registerName').value;
    const email = document.getElementById('registerEmail').value;
    const phone = document.getElementById('registerPhone').value;
    const password = document.getElementById('registerPassword').value;

    // Send data to the backend
    fetch('/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Add CSRF token for Laravel
        },
        body: JSON.stringify({
            full_name: fullName,
            email: email,
            phone: phone,
            password: password,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Registration successful!');
            $('#registerModal').modal('hide'); // Close the modal
        } else {
            alert('Registration failed: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred during registration.');
    });
});
</script>

<script>
    document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Get form data
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;

    // Send data to the backend
    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Add CSRF token for Laravel
        },
        body: JSON.stringify({
            email: email,
            password: password,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Login successful!');
            // Hide the modal using vanilla JavaScript
            document.getElementById('loginModal').classList.remove('show');
            document.querySelector('.modal-backdrop').remove();
            // Redirect to the dashboard
            window.location.href = data.redirect_url; // Use the redirect URL from the backend
        } else {
            alert('Login failed: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred during login.');
    });
});
    </script>
</body>
</html>
