<?php

use App\Http\Controllers\Admin\NavLinkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Route::get('/', function () {
//     return view('layout');
// });
Route::get('/', [NavLinkController::class, 'index']);
// Route::get('/layout', [SliderController::class, 'index']);
// Route::get('/', [SliderController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [NavLinkController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/navlinks', [NavLinkController::class, 'index'])->name('navlinks.index');
    Route::post('/navlinks', [NavLinkController::class, 'store'])->name('navlinks.store');
    Route::get('/navlinks/{id}/edit', [NavLinkController::class, 'edit'])->name('navlinks.edit');
    Route::put('/navlinks/{id}', [NavLinkController::class, 'update'])->name('navlinks.update');
    Route::delete('/navlinks/{id}', [NavLinkController::class, 'destroy'])->name('navlinks.destroy');
    Route::post('/navlinks/reorder', [NavLinkController::class, 'reorder'])->name('navlinks.reorder');

});

// Route::prefix('admin')->middleware('auth')->group(function () {
//     Route::resource('slider', SliderController::class)->names([
//         'index' => 'admin.slider.index',
//         'create' => 'admin.slider.create',
//         'store' => 'admin.slider.store',
//         'show' => 'admin.slider.show',
//         'edit' => 'admin.slider.edit',
//         'update' => 'admin.slider.update',
//         'destroy' => 'admin.slider.destroy'
//     ]);
// });

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
Route::get('/admin/offers', [OfferController::class, 'index'])->name('admin.offers.index'); // List Offers
    Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create'); // Create Offer Form
    Route::post('/offers', [OfferController::class, 'store'])->name('offers.store'); // Store New Offer
    Route::get('/offers/{id}/edit', [OfferController::class, 'edit'])->name('offers.edit');
Route::put('/offers/{id}', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('/offers/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy'); // Delete Offer
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/admin/menu', [MenuController::class, 'index'])->name('admin.menu.index'); // List Offers
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});

// Admin Panel ke andar About Section ke Routes
Route::prefix('admin')->name('admin.')->group(function () {
    
    // ✅ About Section ke saare CRUD routes
    Route::get('/about', [AboutController::class, 'index'])->name('about.index'); // List all about sections
    Route::get('/about/create', [AboutController::class, 'create'])->name('about.create'); // Show create form
    Route::post('/about', [AboutController::class, 'store'])->name('about.store'); // Store new about section
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit'); // Show edit form
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update'); // Update about section
    Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy'); // Delete about section
});

Route::prefix('admin/bookings')->name('admin.bookings.')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('/create', [BookingController::class, 'create'])->name('create');
    Route::post('/', [BookingController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BookingController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BookingController::class, 'update'])->name('update');
    Route::delete('/{id}', [BookingController::class, 'destroy'])->name('destroy');
});


// Show Dynamic Booking Form on Frontend
Route::get('/book', [BookingController::class, 'showForm'])->name('book.form');

Route::prefix('admin')->group(function () {
    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('admin.feedbacks.index'); // List all feedback fields
    Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name('admin.feedbacks.create'); // Create new feedback fields
    Route::post('/feedbacks/store', [FeedbackController::class, 'store'])->name('admin.feedbacks.store'); // Store new feedback fields
    Route::get('/feedbacks/{id}/edit', [FeedbackController::class, 'edit'])->name('admin.feedbacks.edit'); // Edit feedback fields
    Route::put('/feedbacks/{id}/update', [FeedbackController::class, 'update'])->name('admin.feedbacks.update'); // Update feedback fields
    Route::delete('/feedbacks/{id}/delete', [FeedbackController::class, 'destroy'])->name('admin.feedbacks.destroy'); // Delete feedback fields
});

// Show Dynamic Booking Form on Frontend
Route::get('/feedback', [FeedbackController::class, 'showForm'])->name('feedback.form');


Route::prefix('admin')->name('admin.')->group(function () {

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/footer', [FooterController::class, 'index'])->name('footer.index');  // View all footer records
    Route::get('/footer/create', [FooterController::class, 'create'])->name('footer.create');  // Show create form
    Route::post('/footer', [FooterController::class, 'store'])->name('footer.store');  // Store new footer entry
    Route::get('/footer/{id}/edit', [FooterController::class, 'edit'])->name('footer.edit');  // Show edit form
    Route::put('/footer/{id}', [FooterController::class, 'update'])->name('footer.update');  // Update footer record
    Route::delete('/footer/{id}', [FooterController::class, 'destroy'])->name('footer.destroy');  // Delete footer record
});

// Move login and other auth routes before the wildcard route
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('register', [AuthenticatedSessionController::class, 'create'])->name('register');
Route::post('register', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// In web.php
Route::get('/{navLink:url}', [PageController::class, 'showPage'])->name('page.show');


Route::get('/admin/editor', [PageController::class, 'showEditorPage'])->name('show.page.editor');
Route::post('/upload-image', [PageController::class, 'uploadImage'])->name('upload.image');


Route::post('/admin/editor', [PageController::class, 'storePageContent'])->name('store.page.content');





require __DIR__.'/auth.php';


