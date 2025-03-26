<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started Request Details</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Get Started Request Details</h1>

        <!-- Request Details Card -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Request Information</h4>
            </div>
            <div class="card-body">
                <!-- Grid layout for request details -->
                <div class="row">
                    <div class="col-md-3">
                        <p><strong>Full Name:</strong> {{ $request->full_name }}</p>
                        <p><strong>Email:</strong> {{ $request->email }}</p>
                        <p><strong>Company Name:</strong> {{ $request->company_name }}</p>
                        <p><strong>Company Address:</strong> {{ $request->company_address }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><strong>Company Location:</strong> {{ $request->company_location }}</p>
                        <p><strong>Service Type:</strong> {{ $request->service_type }}</p>
                        <p><strong>System Proposal:</strong> {{ $request->system_proposal }}</p>
                        <p><strong>Project Status:</strong> {{ $request->projrct_status }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><strong>Submitted at:</strong> {{ $request->created_at }}</p>
                        <p><strong>Document Path:</strong>
                            <a href="{{ Storage::url($request->document_path) }}" class="btn btn-info" target="_blank">View Document</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS (optional for modal or additional components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
