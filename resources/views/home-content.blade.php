<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Content</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-icon {
            font-size: 2.5rem;
            color: #3498db;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
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

        iframe {
            border: none;
            width: 100%;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="container-fluid">
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h5 class="card-title">Total Orders</h5>
                        <h2 class="mb-0">24</h2>
                        <p class="text-success small"><i class="fas fa-arrow-up"></i> 12% from last month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <h5 class="card-title">Total Spent</h5>
                        <h2 class="mb-0">$1,245</h2>
                        <p class="text-success small"><i class="fas fa-arrow-up"></i> 8% from last month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="card-title">Reward Points</h5>
                        <h2 class="mb-0">1,250</h2>
                        <p class="text-info">Silver Member</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-icon">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <h5 class="card-title">Active Coupons</h5>
                        <h2 class="mb-0">3</h2>
                        <a href="#" class="small">View all coupons</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Row -->
        <div class="row">
            <!-- Recent Orders -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent Orders</h5>
                        <a href="#" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#ORD-0001</td>
                                        <td>Jun 12, 2023</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>$245.00</td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">Details</a></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-0002</td>
                                        <td>Jun 10, 2023</td>
                                        <td><span class="badge bg-warning text-dark">Processing</span></td>
                                        <td>$189.00</td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">Details</a></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-0003</td>
                                        <td>Jun 5, 2023</td>
                                        <td><span class="badge bg-info">Shipped</span></td>
                                        <td>$320.00</td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">Details</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity and Quick Actions -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Recent Activity</h5>
                    </div>
                    <div class="card-body">
                        <ul class="recent-activity">
                            <li>
                                <div><strong>Order #ORD-0001</strong> was delivered</div>
                                <div class="activity-time">2 hours ago</div>
                            </li>
                            <li>
                                <div>You earned <strong>50 points</strong> for your purchase</div>
                                <div class="activity-time">1 day ago</div>
                            </li>
                            <li>
                                <div>Password was changed</div>
                                <div class="activity-time">2 days ago</div>
                            </li>
                            <li>
                                <div>New coupon <strong>SUMMER20</strong> added to your account</div>
                                <div class="activity-time">3 days ago</div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i> New Order
                            </button>
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-edit me-2"></i> Update Profile
                            </button>
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-lock me-2"></i> Change Password
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
