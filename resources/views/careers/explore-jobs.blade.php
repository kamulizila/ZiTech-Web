@extends('layouts.app')

@section('title', 'Explore Job Opportunities')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Explore Job Opportunities</h1>
        <p class="text-center mb-5">Discover the various career paths available at ZiTech Solutions and find the one that suits you best.</p>

        <div class="row">
            <!-- Technical Roles Card -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Technical Roles</h5>
                        <p class="card-text">Explore opportunities in software development, IT support, and more.</p>
                        <a href="{{ route('careers.open-positions') }}" class="btn btn-primary">View Roles</a>
                    </div>
                </div>
            </div>

            <!-- Non-Technical Roles Card -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Non-Technical Roles</h5>
                        <p class="card-text">Join us in marketing, HR, finance, and other non-technical roles.</p>
                        <a href="{{ route('careers.open-positions') }}" class="btn btn-primary">View Roles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
