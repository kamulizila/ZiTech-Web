@extends('layouts.app')

@section('title', 'Submit Your Application')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Submit Your Application</h1>
        <p class="text-center mb-4">Fill out the form below to apply for a position at ZiTech Solutions.</p>

        <!-- Display Success Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Error Messages -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('careers.submit-application') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="position_applied" class="form-label">Position Applied For</label>
                        <input type="text" class="form-control" id="position_applied" name="position_applied" required>
                    </div>

                    <div class="mb-3">
                        <label for="resume" class="form-label">Upload Resume</label>
                        <input type="file" class="form-control" id="resume" name="resume" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
