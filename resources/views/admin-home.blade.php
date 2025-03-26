<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
        body {
            background-color: #f8f9fa;
        }
        .main-content {
            padding: 20px;
        }
        .btn-group {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container-fluid mt-4">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text fw-bold">{{ number_format($totalUsers) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Revenue</h5>
                            <p class="card-text fw-bold">${{ number_format($totalRevenue, 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="card-title">Approved Projects</h5>
                            <p class="card-text fw-bold">{{ number_format($activeProjects) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="card-title">Pending Projects</h5>
                            <p class="card-text fw-bold">{{ number_format($inactiveProjects) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Domain Orders</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Domain</th>
                                        <th>Email</th>
                                        <th>Domain Price</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $index => $order)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $order->domain_name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>${{ number_format($order->price, 2) }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- View Button -->
                                                    <a href="{{ route('order.view', $order->id) }}" class="btn btn-info btn-sm">View</a>
                                                    <!-- Confirm Button -->
                                                    <form action="{{ route('order.confirm', $order->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">Activate</button>
                                                    </form>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('order.delete', $order->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($orders->isEmpty())
                            <p class="text-center">No recent domain orders available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Work Requested</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Service Type</th>
                                        <th>Document</th>
                                        <th>Requested Date</th>
                                        <th>Project Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getStartedRequests as $index => $request)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $request->full_name }}</td>
                                            <td>{{ $request->email }}</td>
                                            <td>{{ $request->service_type }}</td>
                                            <td>
                                                @if ($request->document_path)
                                                    <a href="{{ asset('storage/' . $request->document_path) }}" target="_blank">View Document</a>
                                                @else
                                                    No document available
                                                @endif
                                            </td>
                                            <td>{{ $request->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $request->projrct_status }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- View Button -->
                                                    <a href="{{ route('request.view', $request->id) }}" class="btn btn-info btn-sm">View</a>

                                                    <!-- Confirm Button -->
                                                    <form action="{{ route('request.confirm', $request->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                                                    </form>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('request.delete', $request->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($getStartedRequests->isEmpty())
                            <p class="text-center">No recent service requests available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
