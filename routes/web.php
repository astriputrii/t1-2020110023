<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::view('/', 'landing');

Route::get('/about', [AboutController::class, 'index']);

Route::get('/', LandingController::class);

Route::get('/contact-us', [ContactController::class, 'index']);

Route::post('/contact-us', [ContactController::class, 'store']);

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us.index');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact-us.store');

Route::resource('articles', ArticleController::class);

Route::get('/about', function () {
        $title = 'About Us';
        $description = 'Welcome to Open Library.';
        $button = '<a class="btn btn-lg btn-secondary" href="/">Back to Landing Page</a>';
        return view('about', compact('title', 'description', 'button', 'faqs'));
    });

    Route::get('/about', function () {
        $title = 'About Us';
        $description = 'eBooks is website for sharing your thoughts and ideas with the world.';
        $button = '<a class="btn btn-lg btn-secondary" href="/">Back to Landing Page</a>';

        $sponsors = [
            [
                "name" => "Google",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2008px-Google_%22G%22_Logo.svg.png",
                "link" => "https://www.google.com"
            ],
            [
                "name" => "STMIK LIKMI",
                "image" => "https://likmi.ac.id/wp-content/uploads/2018/09/Logo200.png",
                "link" => "https://likmi.ac.id"
            ],
            [
                "name" => "McD",
                "image" => "https://staticseekingalpha2.a.ssl.fastly.net/images/marketing_images/fair_use_logos_products/sacl_mcd_mcdonalds_logo.png",
                "link" => "https://mcdonalds.co.id/"
            ],
            [
                "name" => "Chatime",
                "image" => "https://churchillcentre.com.au/wp-content/uploads/2018/08/Chatime_Social_Logo.png",
                "link" => "https://chatime.com/"
            ],
            [
                "name" => "Youtube",
                "image" => "https://img.freepik.com/premium-vector/red-youtube-logo-social-media-logo_197792-1803.jpg?w=2000",
                "link" => "https://about.youtube//"
            ],
            [
                "name" => "Starbucks",
                "image" => "https://logos-download.com/wp-content/uploads/2016/03/Starbucks_Logo_1992.png",
                "link" => "https://www.starbucks.co.id/"
            ]
        ];

        $faqs = [
            [
                "question" => "What are the benefits of sponsoring a eBooks website?",
                "answer" => "When your brand is featured on our popular website, it will be seen by a large audience of potential customers.",
            ],
            [
                "question" => "How much does it cost to sponsor our website?",
                "answer" => "The cost of sponsorship depends on the size of your brand and the length of time you want to sponsor us.",
            ],
            [
                "question" => "How long does it take to sponsor our website?",
                "answer" => "The length of sponsorship depends on the size of your brand and the length of time you want to sponsor us.",
            ],
            [
                "question" => "How do I sponsor your website?",
                "answer" => "Please contact us using the form on this page and we will get back to you with more details.",
            ],
            [
                "question" => "How do I contact you?",
                "answer" => "Please contact us using the form on this page and we will get back to you with more details.",
            ]
        ];

        return view('about', compact('title', 'description', 'button', 'sponsors', 'faqs'));
    });
