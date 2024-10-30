<?php

use App\Models\MedicineImages;
use App\Models\ProviderCreditTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Middleware\UserRoles;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\MedicineBasedUnitType;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CustomerDashboard\OtpController;
use App\Http\Controllers\CustomerDashboard\HomeController;
use App\Http\Controllers\Dashboard\notificationController;
use App\Http\Controllers\Dashboard\CPTCategoriesController;
use App\Http\Controllers\Dashboard\CustomerTypesController;
use App\Http\Controllers\CustomerDashboard\Api\ProvidersController;
use App\Http\Controllers\CustomerDashboard\Auth\PasswordController;
use App\Http\Controllers\CustomerDashboard\PaymobPaymentController;
use App\Http\Controllers\CustomerDashboard\CustomerAccountController;
use App\Http\Controllers\CustomerDashboard\Auth\NewPasswordController;
use App\Http\Controllers\CustomerDashboard\Auth\VerifyEmailController;
use App\Http\Controllers\Dashboard\ProviderAccountsPriceListsController;
use App\Http\Controllers\CustomerDashboard\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerDashboard\Client\ClientAccountController;
use App\Http\Controllers\CustomerDashboard\Auth\PasswordResetLinkController;
use App\Http\Controllers\CustomerDashboard\Auth\ConfirmablePasswordController;

use App\Http\Controllers\ProviderDashboard\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomerDashboard\Auth\EmailVerificationPromptController;
use App\Http\Controllers\CustomerDashboard\Dashboard\Customer\CustomerFamilyController;
use App\Http\Controllers\CustomerDashboard\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\ProviderDashboard\API\CreditTransactionsController;
use App\Http\Controllers\ProviderDashboard\Auth\PasswordController as AuthPasswordController;
use App\Http\Controllers\ProviderDashboard\HomeController as ProviderDashboardHomeController;
use App\Http\Controllers\ProviderDashboard\Auth\NewPasswordController as AuthNewPasswordController;
use App\Http\Controllers\ProviderDashboard\Auth\VerifyEmailController as AuthVerifyEmailController;
use App\Http\Controllers\ProviderDashboard\Auth\RegisteredUserController as AuthRegisteredUserController;
use App\Http\Controllers\ProviderDashboard\Auth\PasswordResetLinkController as AuthPasswordResetLinkController;
use App\Http\Controllers\ProviderDashboard\Auth\ConfirmablePasswordController as AuthConfirmablePasswordController;
use App\Http\Controllers\ProviderDashboard\Auth\AuthenticatedSessionController as AuthAuthenticatedSessionController;
use App\Http\Controllers\ProviderDashboard\Auth\EmailVerificationPromptController as AuthEmailVerificationPromptController;
use App\Models\City;
use App\Models\CustomerDashboard\Invoice;
use App\Models\Medicine;
use App\Models\MedicinePrice;
use App\Models\ProviderAccount;
use App\Models\ProviderAccountsPriceList;
use App\Models\ProviderBranch;
use App\Models\State;
use App\Models\Transaction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Ripcord\Ripcord;

//Clear Cache facade value:



Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

Route::get('/optimize-clear', function () {
    $exitCode = Artisan::call('optimize:clear');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

//Clear Config cache:
Route::get('/config-clear', function () {
    $exitCode = Artisan::call('config:clear');
    return '<h1>Clear Config cleared</h1>';
});



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  
    return redirect()->route('corrective_actions.index');
})->name('dashboard');



Route::group(['prefix' => 'corrective_actions'], function () {
    Route::delete('/delete-multi', [\App\Http\Controllers\CorrectiveActionController::class, 'deleteMulti'])->name('corrective_actions.multi_destroy');
    Route::post('/export', [\App\Http\Controllers\CorrectiveActionController::class, 'export'])->name('corrective_actions.export');
    Route::resource('/', \App\Http\Controllers\CorrectiveActionController::class)->names([
        'index' => 'corrective_actions.index',
        'create' => 'corrective_actions.create',
        'store' => 'corrective_actions.store',
        'update' => 'corrective_actions.update',
        'edit' => 'corrective_actions.edit',
        'destroy' => 'corrective_actions.destroy',
        'show' => 'corrective_actions.show',
    ])->parameter('', 'corrective_action');
});

