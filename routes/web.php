<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;

// Root Route: Check auth and redirect appropriately
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard-analytics');
    }
    return redirect()->route('login');
});

// Authentication Routes (Accessible without login)
Route::middleware('guest')->group(function () {
    Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
    Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('login');
    Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
    Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
    Route::post('/auth/register', [RegisterBasic::class, 'store'])->name('auth-register-basic-store');
    Route::post('/auth/login', [LoginBasic::class, 'store'])->name('auth-login-basic-store');
});

// Protected Routes (Requires login)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');

    // Layout
    // Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
    // Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
    // Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
    // Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
    // Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

    // Pages
    // Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
    // Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
    // Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
    // Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
    // Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

    // Cards
    // Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

    // User Interface
    // Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
    // Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
    // Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
    // Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
    // Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
    // Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
    // Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
    // Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
    // Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
    // Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
    // Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
    // Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
    // Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
    // Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
    // Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
    // Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
    // Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
    // Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
    // Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

    // Extended UI
    // Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
    // Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

    // Icons
    // Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

    // // Form Elements
    // Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
    // Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

    // Products
    Route::resource('products', ProductController::class);
    Route::get('/form/layouts-vertical', [ProductController::class, 'create'])->name('form-layouts-vertical');

    // Form Layouts
    Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

    // Tables
    Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');

    // Categories, Sub Categories, Shops
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('shops', ShopController::class);

    // Logout
    Route::post('/auth/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('auth-logout');
});
