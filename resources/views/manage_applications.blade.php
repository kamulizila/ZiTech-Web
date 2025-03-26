<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Make the table horizontally scrollable */
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Applications</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th> <!-- Added Serial Number Column -->
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Resume</th>
                        <th>Submitted On</th>
                        <th>Actions</th> <!-- Added actions column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $index => $application)
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Serial Number -->
                            <td>{{ $application->full_name }}</td>
                            <td>{{ $application->email }}</td>
                            <td>{{ $application->position_applied }}</td>
                            <td><a href="{{ asset('storage/' . $application->resume) }}" target="_blank" class="btn btn-info btn-sm">Download</a></td>
                            <td>{{ $application->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <!-- Send Email Button -->
                                <a href="mailto:{{ $application->email }}" class="btn btn-success btn-sm" title="Send Email">Send Email</a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.deleteApplication', $application->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this application?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
