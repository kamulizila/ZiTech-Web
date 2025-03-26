<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tech Solutions - Transforming businesses with innovative technology solutions.">
    <title>ZiTech Solutions</title>
    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
        crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet"
        integrity="sha384-... (integrity hash)"
        crossorigin="anonymous">
    <style>
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
        .hero-section {
            background: linear-gradient(90deg, #007bff, #00bcd4);
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 30px;
        }
        .services-section {
            padding: 80px 0;
        }
        .services-section h2 {
            font-weight: bold;
            color: #007bff;
            text-align: center;
            margin-bottom: 40px;
        }
        .card {
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-weight: bold;
            color: #007bff;
        }
        .card-text {
            color: #6c757d;
        }
        .cta-section {
            background: linear-gradient(90deg, #007bff, #00bcd4);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        .cta-section h2 {
            font-weight: bold;
        }
        .cta-section a {
            background: white;
            color: #007bff;
            font-weight: bold;
            transition: background 0.3s, color 0.3s;
        }
        .cta-section a:hover {
            background: #0056b3;
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
        .carousel-item img {
            object-fit: cover;
            opacity: 70%;
            height: 100vh;
            min-height: 50px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 10px;
        }
        .carousel-caption h5 {
            font-size: 24px;
            font-weight: bold;
            color: #FFD700;
        }
        .carousel-caption p {
            font-size: 18px;
            color: #ffffff;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem;
            }
            .hero-section p {
                font-size: 1rem;
            }
            .services-section h2 {
                font-size: 1.75rem;
            }
            .card-title {
                font-size: 1.25rem;
            }
            .cta-section h2 {
                font-size: 1.75rem;
            }
            .cta-section a {
                font-size: 1rem;
                padding: 10px 20px;
            }
            footer p {
                font-size: 0.875rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.25rem;
            }
            .navbar-nav .nav-link {
                font-size: 1rem;
                padding: 5px 0;
            }
            .services-section h2 {
                font-size: 1.5rem;
            }
            .card-title {
                font-size: 1.125rem;
            }
            .hero-section h1 {
                font-size: 1.5rem;
            }
            .hero-section p {
                font-size: 1rem;
            }
            .carousel-caption h5 {
                font-size: 18px;
            }
            .carousel-caption p {
                font-size: 14px;
            }
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
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#portfolioModal">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <h1>ZiTech Solutions</h1>
        <p class="rotating-text">Hosting, Development, and Other solutions are available to set up your online presence all under one roof.</p>
        <p class="rotating-text">Get Your Domain Today.</p>
        <form id="domainSearchForm" class="d-flex justify-content-center">
            <input type="text" class="form-control w-50 me-2" id="domainName" placeholder="Search a Domain" required>
            <select class="form-select w-25 me-2" id="domainExtension" required>
            <option value=".com">.com</option>
                <option value=".net">.net</option>
                <option value=".org">.org</option>
                <option value=".tech">.tech</option>
                <option value=".online">.online</option>
                <option value=".store">.store</option>
                <option value=".blog">.blog</option>
                <option value=".io">.io</option>
                <option value=".co">.co</option>
                <option value=".ai">.ai</option>
                <option value=".dev">.dev</option>
                <option value=".app">.app</option>
                <option value=".guru">.guru</option>
                <option value=".shop">.shop</option>
                <option value=".design">.design</option>
                <option value=".club">.club</option>
                <option value=".world">.world</option>
                <option value=".site">.site</option>
                <option value=".space">.space</option>
                <option value=".live">.live</option>
                <option value=".fun">.fun</option>
                <option value=".cloud">.cloud</option>
                <option value=".pro">.pro</option>
                <option value=".agency">.agency</option>
                <option value=".academy">.academy</option>
                <option value=".education">.education</option>
                <option value=".health">.health</option>
                <option value=".fitness">.fitness</option>
                <option value=".photography">.photography</option>
                <option value=".art">.art</option>
                <option value=".music">.music</option>
                <option value=".tv">.tv</option>
                <option value=".news">.news</option>
                <option value=".media">.media</option>
                <option value=".digital">.digital</option>
                <option value=".network">.network</option>
                <option value=".global">.global</option>
                <option value=".solutions">.solutions</option>
                <option value=".services">.services</option>
                <option value=".expert">.expert</option>
                <option value=".consulting">.consulting</option>
                <option value=".marketing">.marketing</option>
                <option value=".events">.events</option>
                <option value=".travel">.travel</option>
                <option value=".tools">.tools</option>
                <option value=".software">.software</option>
                <option value=".systems">.systems</option>
                <option value=".center">.center</option>
                <option value=".company">.company</option>
                <option value=".community">.community</option>
                <option value=".team">.team</option>
                <option value=".city">.city</option>
                <option value=".guide">.guide</option>
                <option value=".directory">.directory</option>
                <option value=".today">.today</option>
                <option value=".life">.life</option>
                <option value=".works">.works</option>
                <option value=".careers">.careers</option>
                <option value=".jobs">.jobs</option>
                <option value=".money">.money</option>
                <option value=".finance">.finance</option>
                <option value=".bank">.bank</option>
                <option value=".insurance">.insurance</option>
                <option value=".realestate">.realestate</option>
                <option value=".properties">.properties</option>
                <option value=".estate">.estate</option>
                <option value=".land">.land</option>
                <option value=".house">.house</option>
                <option value=".rentals">.rentals</option>
                <option value=".villas">.villas</option>
                <option value=".apartments">.apartments</option>
                <option value=".condos">.condos</option>
                <option value=".construction">.construction</option>
                <option value=".contractors">.contractors</option>
                <option value=".builders">.builders</option>
                <option value=".engineering">.engineering</option>
                <option value=".energy">.energy</option>
                <option value=".green">.green</option>
                <option value=".eco">.eco</option>
                <option value=".organic">.organic</option>
                <option value=".farm">.farm</option>
                <option value=".garden">.garden</option>
                <option value=".cafe">.cafe</option>
                <option value=".restaurant">.restaurant</option>
                <option value=".food">.food</option>
                <option value=".recipes">.recipes</option>
                <option value=".wine">.wine</option>
                <option value=".beer">.beer</option>
                <option value=".coffee">.coffee</option>
                <option value=".pizza">.pizza</option>
                <option value=".bar">.bar</option>
                <option value=".club">.club</option>
                <option value=".casino">.casino</option>
                <option value=".bet">.bet</option>
                <option value=".games">.games</option>
                <option value=".play">.play</option>
                <option value=".toys">.toys</option>
                <option value=".kids">.kids</option>
                <option value=".baby">.baby</option>
                <option value=".family">.family</option>
                <option value=".mom">.mom</option>
                <option value=".dad">.dad</option>
                <option value=".pet">.pet</option>
                <option value=".dog">.dog</option>
                <option value=".cat">.cat</option>
                <option value=".horse">.horse</option>
                <option value=".fish">.fish</option>
                <option value=".bird">.bird</option>
                <option value=".reptile">.reptile</option>
                <option value=".zoo">.zoo</option>
                <option value=".vet">.vet</option>
                <option value=".healthcare">.healthcare</option>
                <option value=".dental">.dental</option>
                <option value=".clinic">.clinic</option>
                <option value=".hospital">.hospital</option>
                <option value=".pharmacy">.pharmacy</option>
                <option value=".surgery">.surgery</option>
                <option value=".medical">.medical</option>
                <option value=".doctor">.doctor</option>
                <option value=".law">.law</option>
                <option value=".legal">.legal</option>
                <option value=".attorney">.attorney</option>
                <option value=".lawyer">.lawyer</option>
                <option value=".accountant">.accountant</option>
                <option value=".cpa">.cpa</option>
                <option value=".tax">.tax</option>
                <option value=".financial">.financial</option>
                <option value=".credit">.credit</option>
                <option value=".loans">.loans</option>
                <option value=".mortgage">.mortgage</option>
                <option value=".investments">.investments</option>
                <option value=".trading">.trading</option>
                <option value=".exchange">.exchange</option>
                <option value=".capital">.capital</option>
                <option value=".fund">.fund</option>
                <option value=".wealth">.wealth</option>
                <option value=".gold">.gold</option>
                <option value=".silver">.silver</option>
                <option value=".diamonds">.diamonds</option>
                <option value=".jewelry">.jewelry</option>
                <option value=".watches">.watches</option>
                <option value=".luxury">.luxury</option>
                <option value=".fashion">.fashion</option>
                <option value=".style">.style</option>
                <option value=".beauty">.beauty</option>
                <option value=".cosmetics">.cosmetics</option>
                <option value=".salon">.salon</option>
                <option value=".spa">.spa</option>
                <option value=".wedding">.wedding</option>
                <option value=".events">.events</option>
                <option value=".party">.party</option>
                <option value=".gifts">.gifts</option>
                <option value=".flowers">.flowers</option>
                <option value=".cards">.cards</option>
                <option value=".photo">.photo</option>
                <option value=".video">.video</option>
                <option value=".film">.film</option>
                <option value=".movies">.movies</option>
                <option value=".theater">.theater</option>
                <option value=".tickets">.tickets</option>
                <option value=".shows">.shows</option>
                <option value=".concerts">.concerts</option>
                <option value=".festival">.festival</option>
                <option value=".holiday">.holiday</option>
                <option value=".vacations">.vacations</option>
                <option value=".tours">.tours</option>
                <option value=".cruises">.cruises</option>
                <option value=".flights">.flights</option>
                <option value=".hotels">.hotels</option>
                <option value=".resorts">.resorts</option>
                <option value=".villas">.villas</option>
                <option value=".apartments">.apartments</option>
                <option value=".condos">.condos</option>
                <option value=".realty">.realty</option>
                <option value=".properties">.properties</option>
                <option value=".estate">.estate</option>
                <option value=".land">.land</option>
                <option value=".house">.house</option>
                <option value=".rentals">.rentals</option>
                <option value=".lease">.lease</option>
                <option value=".sale">.sale</option>
                <option value=".buy">.buy</option>
                <option value=".sell">.sell</option>
                <option value=".deals">.deals</option>
                <option value=".discount">.discount</option>
                <option value=".coupons">.coupons</option>
                <option value=".offers">.offers</option>
                <option value=".promo">.promo</option>
                <option value=".free">.free</option>
                <option value=".cheap">.cheap</option>
                <option value=".best">.best</option>
                <option value=".top">.top</option>
                <option value=".new">.new</option>
                <option value=".now">.now</option>
                <option value=".today">.today</option>
                <option value=".here">.here</option>
                <option value=".me">.me</option>
                <option value=".you">.you</option>
                <option value=".us">.us</option>
                <option value=".uk">.uk</option>
                <option value=".ca">.ca</option>
                <option value=".au">.au</option>
                <option value=".in">.in</option>
                <option value=".de">.de</option>
                <option value=".fr">.fr</option>
                <option value=".es">.es</option>
                <option value=".it">.it</option>
                <option value=".nl">.nl</option>
                <option value=".se">.se</option>
                <option value=".ch">.ch</option>
                <option value=".jp">.jp</option>
                <option value=".cn">.cn</option>
                <option value=".br">.br</option>
                <option value=".mx">.mx</option>
                <option value=".ru">.ru</option>
                <option value=".eu">.eu</option>
                <option value=".asia">.asia</option>
                <option value=".africa">.africa</option>
                <option value=".lat">.lat</option>
                <option value=".global">.global</option>
                <option value=".world">.world</option>
                <option value=".earth">.earth</option>
                <option value=".space">.space</option>
                <option value=".universe">.universe</option>
                <option value=".galaxy">.galaxy</option>
                <option value=".star">.star</option>
                <option value=".planet">.planet</option>
                <option value=".moon">.moon</option>
                <option value=".sun">.sun</option>
                <option value=".sky">.sky</option>
                <option value=".cloud">.cloud</option>
                <option value=".air">.air</option>
                <option value=".water">.water</option>
                <option value=".fire">.fire</option>
                <option value=".earth">.earth</option>
                <option value=".nature">.nature</option>
                <option value=".eco">.eco</option>
                <option value=".green">.green</option>
                <option value=".organic">.organic</option>
                <option value=".recycle">.recycle</option>
                <option value=".solar">.solar</option>
                <option value=".energy">.energy</option>
                <option value=".power">.power</option>
                <option value=".electric">.electric</option>
                <option value=".bike">.bike</option>
                <option value=".car">.car</option>
                <option value=".auto">.auto</option>
                <option value=".motorcycles">.motorcycles</option>
                <option value=".boats">.boats</option>
                <option value=".yachts">.yachts</option>
                <option value=".planes">.planes</option>
                <option value=".jets">.jets</option>
                <option value=".travel">.travel</option>
                <option value=".tours">.tours</option>
                <option value=".vacations">.vacations</option>
                <option value=".holidays">.holidays</option>
                <option value=".cruises">.cruises</option>
                <option value=".flights">.flights</option>
                <option value=".hotels">.hotels</option>
                <option value=".resorts">.resorts</option>
                <option value=".villas">.villas</option>
                <option value=".apartments">.apartments</option>
                <option value=".condos">.condos</option>
                <option value=".realty">.realty</option>
                <option value=".properties">.properties</option>
                <option value=".estate">.estate</option>
                <option value=".land">.land</option>
                <option value=".house">.house</option>
                <option value=".rentals">.rentals</option>
                <option value=".lease">.lease</option>
                <option value=".sale">.sale</option>
                <option value=".buy">.buy</option>
                <option value=".sell">.sell</option>
                <option value=".deals">.deals</option>
                <option value=".discount">.discount</option>
                <option value=".coupons">.coupons</option>
                <option value=".offers">.offers</option>
                <option value=".promo">.promo</option>
                <option value=".free">.free</option>
                <option value=".cheap">.cheap</option>
            </select>
            <button class="btn btn-light" type="submit">Search</button>
        </form>
        <div id="domainResult" class="mt-3 text-center"></div>
    </div>
</section>
<!-- Billing Information Modal -->
<div class="modal fade" id="billingModal" tabindex="-1" aria-labelledby="billingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Use modal-lg for a wider modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="billingModalLabel">Billing Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="billingForm">
                    <!-- Domain and Price Display in a Row -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="alert alert-info">
                                <strong>Domain:</strong> <span id="displayDomain"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-info">
                                <strong>Price:</strong> <span id="displayPrice"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name *</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="emailAddress" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="emailAddress" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label">Phone Number *</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phone" required>
                        </div>
                    </div>

                    <!-- Billing Address -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="companyName" class="form-label">Company Name (Optional)</label>
                            <input type="text" class="form-control" id="companyName" name="company_name">
                        </div>
                        <div class="col-md-6">
                            <label for="streetAddress" class="form-label">Street Address *</label>
                            <input type="text" class="form-control" id="streetAddress" name="street_address" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="streetAddress2" class="form-label">Street Address 2 (Optional)</label>
                            <input type="text" class="form-control" id="streetAddress2" name="street_address2">
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City *</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State *</label>
                            <input type="text" class="form-control" id="state" name="state" required>
                        </div>
                        <div class="col-md-4">
                            <label for="postcode" class="form-label">Postcode *</label>
                            <input type="text" class="form-control" id="postcode" name="postcode" required>
                        </div>
                        <div class="col-md-4">
                            <label for="country" class="form-label">Country *</label>
                            <input type="text" class="form-control" id="country" name="country" value="Tanzania" readonly>
                        </div>
                    </div>

                    <!-- Account Security -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="password" name="password" minlength="5" required>
                        </div>
                        <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">Confirm Password *</label>
                            <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                        </div>
                    </div>

                    <!-- Domain Registrant Information -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="useDefaultContact" name="use_default_contact">
                                <label class="form-check-label" for="useDefaultContact">
                                    Use Default Contact (Details Above)
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Payment Method</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="directPay" value="DirectPay Online (DPO)" checked>
                                <label class="form-check-label" for="directPay">
                                    DirectPay Online (DPO): Mobile Money, Credit & Debit Cards
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="cheques" value="Cheques / Bank Deposit / Lipa Namba">
                                <label class="form-check-label" for="cheques">
                                    Cheques / Bank Deposit / Lipa Namba
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Proceed to Payment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <h2>Our Core Services</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <h5 class="card-title">Web Hosting</h5>
                            <p class="card-text">Reliable and scalable hosting solutions for your business.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <h5 class="card-title">Web Development</h5>
                            <p class="card-text">We Are Providing The Professional Web Development.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <h5 class="card-title">App Development</h5>
                            <p class="card-text">We Are Providing The Professional App Development in Both Android and IOS.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Call-to-Action Section -->
     <section id="cta" class="cta-section">
        <div class="container">
            <h2>Ready to Transform Your Idear?</h2>
            <p class="lead mb-4">Get Your Technology Solutions Today.</p>
            <!-- Updated "Get Started" button to trigger the Get Started Modal -->
            <a href="#" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#getStartedModal">Get Started</a>
        </div>
    </section>
             <!-- image sliding -->
    <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="3"></button>
    </div>

    <!-- Carousel Items -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="storage\images\img1.jpeg" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Bring Your Idear</h5>
                <p>Bring up your idear today and nake it productive.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="storage\images\img2.jpeg" class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>We solve all ambinguity ideas</h5>
                <p>let us solve together all the ambinguities ideas on software development.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="storage\images\index-11-415x592.webp" class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Get started today with us</h5>
                <p>You are welcome to get started today with us.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="storage\images\customer.png" class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Any problem with our services?</h5>
                <p>Call us through our customer care for assistance.</p>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Bootstrap CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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

                <!-- Useful Links -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-white">Useful Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#services" class="footer-link no-underline"> Our Services</a></li>
                        <li><a href="#" class="footer-link no-underline" data-bs-toggle="modal" data-bs-target="#careersModal"> Careers</a></li>
                        <li><a href="#" class="footer-link no-underline" data-bs-toggle="modal" data-bs-target="#contactModal"> Contact Us</a></li>
                    </ul>
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

   <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm" method="POST" action="{{ route('login') }}" >
                    @csrf  <!-- CSRF Token is required -->

                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" required>
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

    <!-- Get Started Modal -->
    <div class="modal fade" id="getStartedModal" tabindex="-1" aria-labelledby="getStartedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="getStartedModalLabel">Get Started</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="getStartedForm" action="{{ route('get-started.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    <!-- Row 1: Full Name and Email -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="full_name" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    </div>

    <!-- New Row: Password -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="col-md-6">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>
</div>

    <!-- Row 2: Company Name and Company Location -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="companyName" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="companyName" name="company_name" required>
        </div>
        <div class="col-md-6">
            <label for="companyLocation" class="form-label">Company Location</label>
            <input type="text" class="form-control" id="companyLocation" name="company_location" required>
        </div>
    </div>

    <!-- Row 3: Company Address -->
    <div class="row mb-3">
        <div class="col-12">
            <label for="companyAddress" class="form-label">Company Address</label>
            <textarea class="form-control" id="companyAddress" name="company_address" rows="3" required></textarea>
        </div>
    </div>

    <!-- Row 4: Service Type -->
    <div class="row mb-3">
        <div class="col-12">
            <label class="form-label">Select Service Type</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="service_type" id="hosting" value="Hosting" required>
                    <label class="form-check-label" for="hosting">Hosting</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="service_type" id="web" value="Web" required>
                    <label class="form-check-label" for="web">Web</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="service_type" id="app" value="App" required>
                    <label class="form-check-label" for="app">App</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="service_type" id="others" value="Others" required>
                    <label class="form-check-label" for="others">Others</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 5: System Proposal -->
    <div class="row mb-3">
        <div class="col-12">
            <label for="systemProposal" class="form-label">Explain briefly about Your Request</label>
            <textarea class="form-control" id="systemProposal" name="system_proposal" rows="5" required></textarea>
        </div>
    </div>

    <!-- Row 6: Upload Document -->
    <div class="row mb-3">
        <div class="col-12">
            <label for="documentUpload" class="form-label">Upload System Document</label>
            <input type="file" class="form-control" id="documentUpload" name="document_upload" accept=".pdf,.doc,.docx" required>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
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
                <form id="contactForm">
    <div class="mb-3">
        <label for="contactName" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="contactName" name="name" required>
    </div>
    <div class="mb-3">
        <label for="contactEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="contactEmail" name="email" required>
    </div>
    <div class="mb-3">
        <label for="contactMessage" class="form-label">Message</label>
        <textarea class="form-control" id="contactMessage" name="message" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
</form>
<div id="responseMessage"></div>

                </div>
            </div>
        </div>
    </div>

    <script>
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch("/contact", {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        },
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("responseMessage").innerHTML = `<div class="alert alert-success">${data.success}</div>`;
        document.getElementById("contactForm").reset();
    })
    .catch(error => console.error("Error:", error));
});
</script>

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

   <!-- Bootstrap JS and dependencies -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous">
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

<!-- Registration Form Submission -->
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

<!-- Login Form Submission -->
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

<!-- Rotating Text Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Array of texts to rotate for each <p> tag
        const texts = [
            [
                "Hosting, Development, and Other solutions are available to set up your online presence all under one roof.",
                "We provide reliable and scalable hosting solutions for your business.",
                "Custom web development tailored to your needs.",
                "Boost your online presence with our expert solutions.",
                "Affordable and professional services for startups and enterprises."
            ],
            [
                "Get Your Domain Today.",
                "Secure your perfect domain name now.",
                "Domains starting at just Tsh 20,000/year.",
                "Find and register your ideal domain.",
                "Start your online journey with a great domain."
            ]
        ];

        // Get all <p> tags with the class "rotating-text"
        const textElements = document.querySelectorAll('.rotating-text');

        function changeText() {
            textElements.forEach((element, index) => {
                const textArray = texts[index]; // Get the corresponding text array
                const currentText = element.textContent;
                let newText;

                // Find the next text in the array
                do {
                    newText = textArray[Math.floor(Math.random() * textArray.length)];
                } while (newText === currentText); // Ensure the new text is different

                element.textContent = newText; // Update the text
            });
        }

        // Change text every 5 seconds (5000 milliseconds)
        setInterval(changeText, 5000);
    });
</script>

<!-- Domain Search and Payment Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Domain Search Form Submission
        document.getElementById('domainSearchForm').addEventListener('submit', async function (event) {
            event.preventDefault(); // Prevent the default form submission

            const domainName = document.getElementById('domainName').value;
            const domainExtension = document.getElementById('domainExtension').value;
            const fullDomain = domainName + domainExtension; // Combine domain name and extension
            const domainResult = document.getElementById('domainResult');

            // Show loading message
            domainResult.innerHTML = '<p>Searching... Please wait.</p>';

            try {
                // Call your backend to check domain availability and price
                const response = await fetch('/check-domain', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ domain: fullDomain }),
                });

                const data = await response.json();

                if (data.available) {
                    // Display domain price and an "Order" button
                    domainResult.innerHTML = `
                        <p class="text-success">✔ Congratulations <strong>${fullDomain}</strong> is available!</p>
                        <p>Price: $${data.totalPrice}</p>
                        <button class="btn btn-success mt-2" onclick="openBillingModal('${fullDomain}', ${data.totalPrice})">Order Now</button>
                    `;
                } else {
                    domainResult.innerHTML = `<p class="text-danger">❌ The domain <strong>${fullDomain}</strong> is not available.</p>`;
                }
            } catch (error) {
                console.error(error);
                domainResult.innerHTML = `<p class="text-danger">An error occurred. Please try again.</p>`;
            }
        });
    });

    // Function to open the billing modal
    function openBillingModal(domain, price) {
        // Store domain and price in global variables
        window.domain = domain;
        window.price = price;

        // Open the billing information modal
        const billingModal = new bootstrap.Modal(document.getElementById('billingModal'));
        billingModal.show();
    }

    document.getElementById('billingForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Get form data
    const formData = new FormData(this);
    formData.append('domain_name', window.domain);
    formData.append('price', window.price);

    // Send data to the backend
    fetch('/order', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Order created successfully!');
            window.location.href = '/payment/page'; // Redirect to payment page
        } else {
            alert('Failed to create order: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
});

    // Function to open the billing modal and populate domain and price
function openBillingModal(domain, price) {
    // Store domain and price in global variables
    window.domain = domain;
    window.price = price;

    // Populate the domain and price in the modal
    document.getElementById('displayDomain').textContent = domain;
    document.getElementById('displayPrice').textContent = `$${price}`;

    // Open the billing information modal
    const billingModal = new bootstrap.Modal(document.getElementById('billingModal'));
    billingModal.show();
}
</script>
<script>
    document.getElementById('getStartedForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json', // Ensure the server knows we expect JSON
        },
    })
    .then(response => {
        if (!response.ok) {
            // If the response is not OK, parse the error message from the response
            return response.json().then(err => {
                throw new Error(err.message || 'Network response was not ok');
            });
        }
        return response.json(); // Parse the JSON response
    })
    .then(data => {
        if (data.success) {
            alert(data.message); // Display success message
            $('#getStartedModal').modal('hide'); // Close the modal
        } else {
            alert(data.message); // Display error message
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert(error.message || 'An error occurred. Please try again.'); // Display the error message
    });
});
    </script>
</body>
</html>
