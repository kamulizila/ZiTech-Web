<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechSolutionController extends Controller
{
    public function index()
    {
        $carouselItems = [
            [
                'title' => 'Innovative Technology Solutions',
                'description' => 'We provide cutting-edge technology solutions for your business.',
                'image' => 'images/kapande-logo.png',
            ],
            [
                'title' => 'Custom Software Development',
                'description' => 'Tailored software solutions to meet your unique needs.',
                'image' => 'images/kapande-logo.png',
            ],
            [
                'title' => 'Cloud Computing Services',
                'description' => 'Scalable and secure cloud solutions for your business.',
                'image' => 'images/kapande-logo.png',
            ],
        ];

        $services = [
            [
                'title' => 'Web Development',
                'description' => 'We build responsive and user-friendly websites.',
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'We create cross-platform mobile applications.',
            ],
            [
                'title' => 'IT Consulting',
                'description' => 'Expert advice to optimize your IT infrastructure.',
            ],
        ];

        $portfolioItems = [
            [
                'title' => 'E-Commerce Platform',
                'description' => 'A fully-featured e-commerce platform for a retail client.',
                'image' => 'images/kapande-logo.png',
            ],
            [
                'title' => 'Healthcare App',
                'description' => 'A mobile app for managing patient records.',
                'image' => 'images/kapande-logo.png',
            ],
            [
                'title' => 'Cloud Migration',
                'description' => 'Migrated a legacy system to the cloud for a financial firm.',
                'image' => 'images/kapande-logo.png',
            ],
        ];

        return view('tech-solutions', compact('carouselItems', 'services', 'portfolioItems'));
    }
}
