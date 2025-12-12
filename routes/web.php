<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\AnswerController;

Route::get('/', function () {
    return view('site.index');
})->name('home');

Route::get('/cours', [CourseController::class, 'showCourses'])->name('site.courses');



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth:admin')->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
   Route::resource('students', StudentController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('materials', MaterialController::class);
    Route::resource('courses', CourseController::class); 
    Route::resource('questions', QuestionController::class);
    Route::resource('answers', AnswerController::class);
    Route::get('/content', [ContentController::class, 'index'])->name('content.index');
   Route::get('/content/main', function () {
        return view('admin.content.main');
    })->name('content.main'); 
    Route::get('/content/get/{key}', [ContentController::class, 'get'])->name('content.get');
    Route::post('/content', [ContentController::class, 'update'])->name('content.update');
   
});




Route::patch('admin/courses/{course}/toggle', [CourseController::class, 'toggle'])->name('admin.courses.toggle');
Route::post('/admin/courses', [CourseController::class, 'store'])->name('admin.courses.store');
Route::delete('/admin/courses/{id}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');
Route::get('/admin/courses/{id}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
Route::get('/admin/students', [StudentController::class, 'index'])->name('admin.students.index');



Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');


Route::post('/create-payment-intent', [PaymentController::class, 'createPaymentIntent']);
Route::post('/checkout', [CheckoutController::class, 'create']);
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
Route::post('/checkout/webhook', [CheckoutController::class, 'webhook'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('checkout.webhook');



    Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr', 'ru'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

require __DIR__.'/auth.php';
