<?php

use App\Http\Controllers\Admin\AtsGeneratorController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------
// Admin Route Registrar (handles subdomain `manage.` and `/manage`)
// -------------------------------------------------------------
$registerAdminRoutes = function () {
    // Guest authentication routes
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Authenticated admin workspace
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Profile / Bio
        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');

        // Projects (CRUD)
        Route::resource('projects', ProjectController::class)->names('admin.projects');

        // Work Experience (CRUD)
        Route::resource('experiences', ExperienceController::class)->names('admin.experiences');

        // Education (CRUD)
        Route::resource('education', EducationController::class)->names('admin.education');

        // Skills (CRUD)
        Route::resource('skills', SkillController::class)->names('admin.skills');

        // ATS Resume Generator
        Route::get('/ats-generator', [AtsGeneratorController::class, 'index'])->name('admin.ats.index');

        // Collaboration Inquiries
        Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages.index');
        Route::get('/messages/{message}', [MessageController::class, 'show'])->name('admin.messages.show');
        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
    });
};

$baseDomain = env('APP_DOMAIN', parse_url(config('app.url', 'http://localhost'), PHP_URL_HOST) ?: 'localhost');
$manageDomain = env('APP_MANAGE_DOMAIN', 'manage.' . $baseDomain);

// Subdomain Route Group: e.g. manage.portfolio.com or manage.localhost
Route::domain($manageDomain)->group($registerAdminRoutes);

// Fallback Route Group: `/manage` for local testing on 127.0.0.1 without DNS setup
Route::prefix('manage')->group($registerAdminRoutes);

// -------------------------------------------------------------
// Public Portfolio Routes
// -------------------------------------------------------------
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Language Switcher Route
Route::get('/locale/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('locale.switch');
