<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'KursusKu';

        $featured = [
            [
                'code' => 'WEB-01',
                'title' => 'Web Dasar',
                'description' => 'Belajar dasar pengembangan web.',
            ],
            [
                'code' => 'PHP-01',
                'title' => 'PHP Dasar',
                'description' => 'Mengenal pemrograman PHP.',
            ],
            [
                'code' => 'LAR-01',
                'title' => 'Laravel Fundamental',
                'description' => 'Mengenal framework Laravel.',
            ],

            [
    'code' => 'UI-01',
    'title' => 'UI Web Dasar',
    'description' => 'Belajar prinsip tampilan web yang rapi.',
],
        ];

        return view('home', compact('siteName', 'featured'));
    }
}