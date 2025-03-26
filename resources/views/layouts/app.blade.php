<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - ZiTech Solutions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
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

        /* Add green > sign before each link */
        .no-underline::before {
            content: ">";
            color: green;
            margin-right: 5px;
        }

        /* Footer link styles */
        .footer-link {
            color: rgba(255, 255, 255, 0.7) !important;
            transition: color 0.3s;
        }

        .footer-link:hover {
            color: rgba(255, 255, 255, 1) !important; /* Full white on hover */
        }

        /* Social media link box styles */
        .social-link {
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid transparent;
            border-radius: 5px;
            text-decoration: none !important;
            color: white;
            transition: all 0.3s ease;
        }

        /* Facebook box */
        .social-link.facebook {
            background-color: #1877f2; /* Facebook blue */
            border-color: #1877f2;
        }

        .social-link.facebook:hover {
            background-color: transparent;
            color: #1877f2;
        }

        /* Twitter box */
        .social-link.twitter {
            background-color: #1da1f2; /* Twitter blue */
            border-color: #1da1f2;
        }

        .social-link.twitter:hover {
            background-color: transparent;
            color: #1da1f2;
        }

        /* Instagram box */
        .social-link.instagram {
            background-color: #e4405f; /* Instagram pink */
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
    <!-- Include Navigation Bar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main class="container mt-5 pt-5">
        @yield('content')
    </main>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
