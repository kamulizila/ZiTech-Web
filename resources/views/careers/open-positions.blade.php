@extends('layouts.app')

@section('title', 'View Open Positions')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">View Open Positions</h1>
        <p class="text-center mb-5">Explore our current job openings and find the perfect role for you.</p>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Web Developer</h5>
                        <p class="card-text">We are looking for a skilled web developer to join our team. The ideal candidate should have expertise in Django, Laravel, Vue.js, Node.js, React, Angular, and Express.js.</p>
                        <a href="{{ route('careers.submit-application') }}" class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mobile App Developer</h5>
                        <p class="card-text">Join us as a mobile app developer and work on exciting projects. The ideal candidate should have expertise in Flutter and Android development.</p>
                        <a href="{{ route('careers.submit-application') }}" class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
