<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('root',);
})->name('root');

Route::get('/bio', function () {
    return view('bio');
})->name('bio');

$jobs = [
    [
        'id' => 1,
        'title' => 'creative director',
        'description' => 'A creative director is responsible for leading the creative vision and strategy of an advertising agency. They are responsible for overseeing the development of advertising campaigns and ensuring that they are aligned with the overall business goals of the company.',
        'salary' => 100000,
    ],
    [
        'id' => 2,
        'title' => 'full stack developer',
        'description' => 'A full stack developer is responsible for building the frontend and backend of a web application, including the design and development of the user interface and the underlying logic that makes the application work.',
        'salary' => 50000,
    ],
    [
        'id' => 3,
        'title' => 'digitial designer',
        'description' => 'A digital designer is responsible for creating visual concepts and designs that are used in various industries, such as graphic design, product design, and user experience design. They may work on logo designs, branding, website design, graphic design, packaging, and other visual elements.',
        'salary' => 30000,
    ],
    [
        'id' => 4,
        'title' => 'project manager',
        'salary' => 20000,
        'description' => 'A project manager is responsible for managing the project and its development. They may work on tasks such as project planning, budgeting, and communication.'
    ],
    [
        'id' => 5,
        'title' => 'accountant',
        'salary' => 10000,
        'description' => 'An accountant is responsible for tracking and analyzing financial data. They may work on tasks such as budgeting, tax preparation, and financial reporting.'
    ]
];

Route::get('/jobs', function () use ($jobs) {
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
})->name('jobs');

Route::get('/jobs/{id}', function ($id) use ($jobs) {

    $job = Arr::first($jobs, fn ($job) => $job['id'] == $id);
    return view('jobs.view', ['job' => $job]);
})->name('jobs.job');
