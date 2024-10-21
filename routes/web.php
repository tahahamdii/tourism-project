<?php

// Controllers
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TravelerController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuideTourController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ChatController;

require __DIR__.'/auth.php';

// Public Routes
Route::get('/home', [HomePageController::class, 'home'])->name('home');

// Resource Routes
// Route to display all available tours for clients as cards
Route::get('/tours/client', [TourController::class, 'clientIndex'])->name('tours.client.index');

// Route to handle the participation in a tour
Route::post('/tours/participate/{id}', [TourController::class, 'participate'])->name('tours.participate');
Route::get('/guidetours/client', [GuideTourController::class, 'clientIndex'])->name('guidetours.client.index');

Route::get('/tours-client', [GuideTourController::class, 'clientIndex'])->name('guidetour.client.index');

Route::resource('destinations', DestinationController::class);
Route::resource('guides', GuideController::class);
Route::resource('tours', TourController::class);
Route::resource('restaurants', RestaurantController::class);
Route::resource('menus', MenuController::class);
Route::resource('events', EventController::class);
Route::resource('tickets', TicketController::class);
Route::get('/tours/{id}', [TourController::class, 'show'])->name('tours.show');

// Routes for managing guide assignments to a tour
Route::get('tours/{tour}/assign-guides', [GuideTourController::class, 'create'])->name('guides.assign');
Route::post('tours/{tour}/assign-guides', [GuideTourController::class, 'store'])->name('guides.assign.store');
Route::resource('guidetours', GuideTourController::class);

// Artisan command route
Route::get('/storage', function () {
    Artisan::call('storage:link');
});

// Byserine routes
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');
Route::resource('gestionVoyageur', TravelerController::class);
Route::resource('gestionVoyage', TripController::class);
Route::get('/gestionVoyageur/{id}/edit', [TravelerController::class, 'edit'])->name('gestionVoyageur.edit');
Route::put('/gestionVoyageur/{id}', [TravelerController::class, 'update'])->name('gestionVoyageur.update');
Route::delete('/gestionVoyageur/{id}', [TravelerController::class, 'destroy'])->name('gestionVoyageur.destroy');

// UI Pages Routes
Route::get('/ui', [HomeController::class, 'uisheet'])->name('uisheet');

// Authenticated Routes
// Authenticated Routes
Route::group(['middleware' => 'auth'], function () {
    Route::resource('accommodations', AccommodationController::class)->middleware('role:1'); // Only admin can access
    Route::resource('bookings', BookingController::class)->middleware('role:1');

    // Apply the role middleware to routes based on role_id
    Route::group(['middleware' => 'role:1'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard'); // Admin can access dashboard
        Route::resource('users', UserController::class);
    });

    // User can access everything except '/'
    Route::group(['middleware' => 'role:2'], function () {
        Route::get('/home', [HomePageController::class, 'home'])->name('home');
        Route::get('/user/restaurant', [RestaurantController::class, 'userindex'])->name('restaurants.user');
        Route::get('/user/events', [EventController::class, 'userindex'])->name('events.user');

 // User can access /home
    });
});

// Other public routes can remain as is...


// App Details Page => 'Dashboard'
Route::group(['prefix' => 'menu-style'], function () {
    // MenuStyle Page Routes
    Route::get('horizontal', [HomeController::class, 'horizontal'])->name('menu-style.horizontal');
    Route::get('dual-horizontal', [HomeController::class, 'dualhorizontal'])->name('menu-style.dualhorizontal');
    Route::get('dual-compact', [HomeController::class, 'dualcompact'])->name('menu-style.dualcompact');
    Route::get('boxed', [HomeController::class, 'boxed'])->name('menu-style.boxed');
    Route::get('boxed-fancy', [HomeController::class, 'boxedfancy'])->name('menu-style.boxedfancy');
});

// Special Page
Route::group(['prefix' => 'special-pages'], function () {
    Route::get('billing', [HomeController::class, 'billing'])->name('special-pages.billing');
    Route::get('calendar', [HomeController::class, 'calendar'])->name('special-pages.calendar');
    Route::get('kanban', [HomeController::class, 'kanban'])->name('special-pages.kanban');
    Route::get('pricing', [HomeController::class, 'pricing'])->name('special-pages.pricing');
    Route::get('rtl-support', [HomeController::class, 'rtlsupport'])->name('special-pages.rtlsupport');
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});

// Widget Routes
Route::group(['prefix' => 'widget'], function () {
    Route::get('widget-basic', [HomeController::class, 'widgetbasic'])->name('widget.widgetbasic');
    Route::get('widget-chart', [HomeController::class, 'widgetchart'])->name('widget.widgetchart');
    Route::get('widget-card', [HomeController::class, 'widgetcard'])->name('widget.widgetcard');
});

// Maps Routes
Route::group(['prefix' => 'maps'], function () {
    Route::get('google', [HomeController::class, 'google'])->name('maps.google');
    Route::get('vector', [HomeController::class, 'vector'])->name('maps.vector');
});

// Auth pages Routes
Route::group(['prefix' => 'auth'], function () {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
    Route::get('signup', [HomeController::class, 'signup'])->name('auth.signup');
    Route::get('confirmmail', [HomeController::class, 'confirmmail'])->name('auth.confirmmail');
    Route::get('lockscreen', [HomeController::class, 'lockscreen'])->name('auth.lockscreen');
    Route::get('recoverpw', [HomeController::class, 'recoverpw'])->name('auth.recoverpw');
    Route::get('userprivacysetting', [HomeController::class, 'userprivacysetting'])->name('auth.userprivacysetting');
});

// Error Page Routes
Route::group(['prefix' => 'errors'], function () {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});

// Forms Pages Routes
Route::group(['prefix' => 'forms'], function () {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});

// Table Page Routes
Route::group(['prefix' => 'table'], function () {
    Route::get('bootstraptable', [HomeController::class, 'bootstraptable'])->name('table.bootstraptable');
    Route::get('datatable', [HomeController::class, 'datatable'])->name('table.datatable');
});

// Icons Page Routes
Route::group(['prefix' => 'icons'], function () {
    Route::get('solid', [HomeController::class, 'solid'])->name('icons.solid');
    Route::get('outline', [HomeController::class, 'outline'])->name('icons.outline');
    Route::get('dualtone', [HomeController::class, 'dualtone'])->name('icons.dualtone');
    Route::get('colored', [HomeController::class, 'colored'])->name('icons.colored');
});

// Extra Page Routes
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');
Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');


Route::get('/chat', [ChatController::class, 'showChatForm'])->name('chat.chat');
Route::get('/chat', 'App\Http\Controllers\ChatController');

Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.sendMessage');
Route::get('/test', function () {
    return 'Test route works!';
});
