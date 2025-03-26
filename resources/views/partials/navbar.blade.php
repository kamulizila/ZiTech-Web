<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <!-- Logo Image -->
            <img src="{{ asset('storage/images/zitech-solution-high-resolution-logo.png') }}" alt="ZiTech Solutions Logo" width="60" height="40" class="d-inline-block align-text-top me-2">
            ZiTech Solutions
        </a>
        <!-- Toggle Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('careers.open-positions') }}">Open Positions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('careers.submit-application') }}">Submit Application</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('careers.join-team') }}">Join Our Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('careers.explore-jobs') }}">Explore Jobs</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
