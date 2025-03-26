<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">All Messages</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Reply</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $index => $message)
            <tr>
                <td>{{ $index + 1 }}</td> <!-- Serial Number -->
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->message }}</td>
                <td>{{ $message->reply ?? 'No reply yet' }}</td>
                <td>
                    <!-- Reply Form -->
                    <form action="{{ route('admin.reply', $message->id) }}" method="POST" class="d-inline">
                        @csrf
                        <div class="input-group mb-2">
                            <input type="text" name="reply" class="form-control" placeholder="Type your reply..." required>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.deleteMessage', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
