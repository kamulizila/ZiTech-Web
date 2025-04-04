<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 250px;
            --sidebar-bg: #2c3e50;
            --sidebar-color: #ecf0f1;
            --header-bg: #ffffff;
            --content-bg: #f8f9fa;
            --welcome-bg: linear-gradient(135deg, #3498db, #2c3e50);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--content-bg);
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            background: var(--sidebar-bg);
            color: var(--sidebar-color);
            transition: all 0.3s;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link {
            color: var(--sidebar-color);
            padding: 0.75rem 1.5rem;
            margin: 0.25rem 0;
            border-radius: 0;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .sidebar .nav-link i {
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header-content {
            padding: 20px;
        }

        .welcome-banner {
            background: var(--welcome-bg);
            color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .iframe-container {
            flex: 1;
            padding: 0 20px 20px 20px;
            height: calc(100vh - 180px); /* adjust this if needed */
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 10px;
            min-height: 600px;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-icon {
            font-size: 2.5rem;
            color: #3498db;
        }

        .recent-activity {
            list-style: none;
            padding: 0;
        }

        .recent-activity li {
            padding: 0.75rem 0;
            border-bottom: 1px solid #eee;
        }

        .recent-activity li:last-child {
            border-bottom: none;
        }

        .activity-time {
            font-size: 0.8rem;
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }

            .sidebar.active {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header text-center">
            <h4 class="mb-0">My Dashboard</h4>
            <p class="text-muted small mb-0">Welcome back, {{ Auth::user()->name }}!</p>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#" onclick="loadIframeContent('home-content')">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadIframeContent('profile')">
                    <i class="fas fa-user"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadIframeContent('orders')">
                    <i class="fas fa-file-invoice"></i> Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadIframeContent('settings')">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadIframeContent('messages')">
                    <i class="fas fa-envelope"></i> Messages
                    <span class="badge bg-primary float-end">3</span>
                </a>
            </li>
            <li class="nav-item mt-4">
                <a class="nav-link text-warning" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header with Welcome Banner -->
        <div class="header-content">
            <div class="welcome-banner">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2>Welcome, {{ Auth::user()->name }}!</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Iframe Content Area -->
        <div class="iframe-container">
            <iframe id="content-iframe" src="{{ route('home-content') }}"></iframe>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to load content in iframe
        function loadIframeContent(page) {
            const iframe = document.getElementById('content-iframe');
            iframe.src = `/${page}-content`;

            // Update active link in sidebar
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => link.classList.remove('active'));
            event.target.classList.add('active');
        }

        // Mobile sidebar toggle (optional)
        document.querySelector('.navbar-toggler')?.addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
