<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .wrapper {
            display: flex;
            transition: all 0.3s;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            padding-top: 90px;
            transition: all 0.3s;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #d1d1d1;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }
        .content {
            flex-grow: 1;
            transition: all 0.3s;
            padding: 20px;
            margin-left: 10px;
            margin-top: 60px;
        }
        .header {
            background-color: #16a085;
            padding: 15px 20px;
            border-bottom: 2px solid #1abc9c;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
        }
        .header h3 {
            margin-left: 350px;
            margin: 0;
            font-size: 24px;
        }
        .toggle-btn {
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .collapsed .sidebar {
            width: 0;
            overflow: hidden;
        }
        .collapsed .content {
            margin-left: 0;
        }
        .main-content {
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <div class="header">
        <button class="toggle-btn" onclick="toggleSidebar()">☰</button>

        <h3>Welcome, {{ $user->full_name }}!</h3>
    </div>
    <div class="wrapper" id="dashboardWrapper">
    <div class="sidebar">
    <a href="#" class="text-center mb-4"><h4 class="text-white">ZiTech Solutions</h4></a>
    <a href="#" onclick="loadContent('{{ route('admin.home') }}')"><i class="bi bi-house-door"></i> Home</a>
    <a href="#" onclick="loadContent('{{ route('admin.register') }}')"><i class="bi bi-person-plus-fill"></i> Add Admin</a>
    <a href="#" onclick="loadContent('{{ route('admin.manage-applications') }}')"><i class="bi-briefcase-fill"></i> Applications</a>
    <a href="#" onclick="loadContent('{{ route('admin.messages') }}')"><i class="bi bi-envelope"></i> Messages</a>

    <!-- Logout Form -->
    <form action="{{ route('logout') }}" method="POST" id="logoutForm" style="display: none;">
        @csrf
        <button type="submit" class="btn btn-link text-decoration-none">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>

    <!-- Logout Link -->
    <a href="#" onclick="document.getElementById('logoutForm').submit();">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>
</div>

        <div class="content main-content">
            <iframe id="contentFrame" src="{{ route('admin.home') }}" width="100%" height="100%" frameborder="0"></iframe>
        </div>
    </div>

    <script>
          // Toggle sidebar collapse/expand
          function toggleSidebar() {
            document.getElementById('dashboardWrapper').classList.toggle('collapsed');
        }

        // Load content into iframe dynamically
        function loadContent(url) {
            document.getElementById('contentFrame').src = url;
        }
    </script>
</body>
</html>
