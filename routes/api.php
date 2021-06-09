<?php

use App\Http\Controllers\AccountSubTypeController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\ApplyForLeaveController;
use App\Http\Controllers\ChartOfAccountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryItemsController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectOfferController;
use App\Http\Controllers\PublicHolidayController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubProjectController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register']);
Route::get('/users', [UserController::class, 'index']);
Route::delete('/users/delete/{id}', [UserController::class, 'delete']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/refresh', [UserController::class, 'refresh']);
    Route::get('/user-profile', [UserController::class, 'userProfile']);
    Route::get('/leaves', [UserController::class, 'userLeaveApplications']);
    Route::get('/requisitions', [UserController::class, 'userRequisitions']);
});

Route::middleware('api')->group(function () {
    Route::group(['prefix' => 'projectOffers'], function () {
        Route::get('/', [ProjectOfferController::class, 'index']);
        Route::post('add', [ProjectOfferController::class, 'add']);
        Route::get('edit/{id}', [ProjectOfferController::class, 'edit']);
        Route::post('update/{id}', [ProjectOfferController::class, 'update']);
        Route::delete('delete/{id}', [ProjectOfferController::class, 'delete']);

        Route::post('handleFiles/{id}', [ProjectOfferController::class, 'handleFiles']);
        Route::get('downloadFile/{id}', [ProjectOfferController::class, 'downloadFile']);

        Route::get('projectStatus', [ProjectOfferController::class, 'getProjectStatus']);
        Route::post('projectStatus/{status}', [ProjectOfferController::class, 'setProjectStatus']);
    });

    Route::group(['prefix' => 'accountTypes'], function () {
        Route::get('/', [AccountTypeController::class, 'index']);
        Route::post('/add', [AccountTypeController::class, 'create']);
        Route::get('/edit/{id}', [AccountTypeController::class, 'edit']);
        Route::post('/update/{id}', [AccountTypeController::class, 'update']);
        Route::delete('/delete/{id}', [AccountTypeController::class, 'delete']);
    });

    Route::group(['prefix' => 'accountSubTypes'], function () {
        Route::get('/', [AccountSubTypeController::class, 'index']);
        Route::get('/all', [AccountSubTypeController::class, 'getAll']);
        Route::post('/add', [AccountSubTypeController::class, 'create']);
        Route::get('/edit/{id}', [AccountSubTypeController::class, 'edit']);
        Route::post('/update/{id}', [AccountSubTypeController::class, 'update']);
        Route::delete('/delete/{id}', [AccountSubTypeController::class, 'delete']);

        Route::get('/edit/{id}/getAccountType', [AccountSubTypeController::class, 'getAccountType']);
    });

    Route::group(['prefix' => 'subProjects'], function () {
        Route::get('/', [SubProjectController::class, 'index']);
        Route::get('/all', [SubProjectController::class, 'getAll']);
        Route::post('/add', [SubProjectController::class, 'create']);
        Route::get('/edit/{id}', [SubProjectController::class, 'edit']);
        Route::post('/update/{id}', [SubProjectController::class, 'update']);
        Route::delete('/delete/{id}', [SubProjectController::class, 'delete']);
    });

    Route::group(['prefix' => 'journals'], function () {
        Route::get('/', [JournalController::class, 'index']);
        Route::post('/add', [JournalController::class, 'create']);
        Route::get('/edit/{id}', [JournalController::class, 'edit']);
        Route::post('/update/{id}', [JournalController::class, 'update']);
        Route::delete('/delete/{id}', [JournalController::class, 'delete']);

        Route::post('/{id}/updateCOA', [JournalController::class, 'updateCOA']);

    });

    Route::group(['prefix' => 'coas'], function () {
        Route::get('/', [ChartOfAccountController::class, 'index']);
        Route::post('/add', [ChartOfAccountController::class, 'create']);
        Route::get('/edit/{id}', [ChartOfAccountController::class, 'edit']);
        Route::post('/update/{id}', [ChartOfAccountController::class, 'update']);
        Route::delete('/delete/{id}', [ChartOfAccountController::class, 'delete']);

        Route::get('/{id}/accountType/', [ChartOfAccountController::class, 'getAccountType']);
        Route::get('/debitAccounts', [ChartOfAccountController::class, 'getDebitAccounts']);
        Route::get('/creditAccounts', [ChartOfAccountController::class, 'getCreditAccounts']);

        //transactions
        Route::get('/allCashInCashCR', [ChartOfAccountController::class, 'allCashInCashCR']);
        Route::get('/allCashOutCashDB', [ChartOfAccountController::class, 'allCashOutCashDB']);

        Route::get('/allCashInChequeCR', [ChartOfAccountController::class, 'allCashInChequeCR']);
        Route::get('/allCashOutChequeDB', [ChartOfAccountController::class, 'allCashOutChequeDB']);

        Route::get('/allBanks', [ChartOfAccountController::class, 'allBanks']);


    });

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::post('/add', [ProjectController::class, 'create']);
        Route::get('/edit/{id}', [ProjectController::class, 'edit']);
        Route::post('/update/{id}', [ProjectController::class, 'update']);
        Route::delete('/delete/{id}', [ProjectController::class, 'delete']);
    });

    Route::group(['prefix' => 'inventories'], function () {
        Route::get('/', [InventoryController::class, 'index']);
        Route::post('/add', [InventoryController::class, 'create']);
        Route::get('/edit/{id}', [InventoryController::class, 'edit']);
        Route::post('/update/{id}', [InventoryController::class, 'update']);
        Route::delete('/delete/{id}', [InventoryController::class, 'delete']);
        Route::get('/{id}/inventoryItems', [InventoryController::class, 'inventoryItems']);
    });

    Route::group(['prefix' => 'items'], function () {
        Route::get('/', [ItemController::class, 'index']);
        Route::post('/add', [ItemController::class, 'create']);
        Route::get('/edit/{id}', [ItemController::class, 'edit']);
        Route::post('/update/{id}', [ItemController::class, 'update']);
        Route::delete('/delete/{id}', [ItemController::class, 'delete']);
    });

    Route::group(['prefix' => 'inventoryItems'], function () {
        Route::get('/', [InventoryItemsController::class, 'index']);
        Route::post('/add', [InventoryItemsController::class, 'create']);
        Route::get('/edit/{id}', [InventoryItemsController::class, 'edit']);
        Route::post('/update/{id}', [InventoryItemsController::class, 'update']);
        Route::delete('/delete/{id}', [InventoryItemsController::class, 'delete']);
        Route::get('/{id}/inventory', [InventoryItemsController::class, 'inventory']);
    });

    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', [EmployeeController::class, 'index']);
        Route::post('/add', [EmployeeController::class, 'create']);
        Route::get('/edit/{id}', [EmployeeController::class, 'edit']);
        Route::post('/update/{id}', [EmployeeController::class, 'update']);
        Route::delete('/delete/{id}', [EmployeeController::class, 'delete']);

        Route::get('/types', [EmployeeController::class, 'getTypes']);
        Route::get('/downloadNid/{id}', [EmployeeController::class, 'downloadNid']);
        Route::get('/downloadImage/{id}', [EmployeeController::class, 'downloadImage']);
    });

    Route::group(['prefix' => 'transactions'], function () {
        Route::get('/', [TransactionController::class, 'index']);
        Route::post('/add', [TransactionController::class, 'create']);
        Route::get('/edit/{id}', [TransactionController::class, 'edit']);
        Route::post('/update/{id}', [TransactionController::class, 'update']);
        Route::delete('/delete/{id}', [TransactionController::class, 'delete']);
    });

    Route::group(['prefix' => 'requisitions'], function () {
        Route::get('/', [RequisitionController::class, 'index']);
        Route::post('/add', [RequisitionController::class, 'create']);
        Route::get('/edit/{id}', [RequisitionController::class, 'edit']);
        Route::post('/update/{id}', [RequisitionController::class, 'update']);
        Route::delete('/delete/{id}', [RequisitionController::class, 'delete']);

        Route::post('/approve/{id}', [RequisitionController::class, 'approve']);
        Route::post('/reject/{id}', [RequisitionController::class, 'reject']);
    });

    Route::group(['prefix' => 'applications'], function () {
        Route::get('/', [ApplyForLeaveController::class, 'index']);
        Route::post('/add', [ApplyForLeaveController::class, 'create']);
        Route::get('/edit/{id}', [ApplyForLeaveController::class, 'edit']);
        Route::post('/update/{id}', [ApplyForLeaveController::class, 'update']);
        Route::delete('/delete/{id}', [ApplyForLeaveController::class, 'delete']);
        Route::post('/approve/{id}', [ApplyForLeaveController::class, 'approve']);
        Route::post('/reject/{id}', [ApplyForLeaveController::class, 'reject']);


        Route::get('/leaveTypes', [ApplyForLeaveController::class, 'leaveTypes']);

    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/add', [RoleController::class, 'store']);
        Route::get('/edit/{id}', [RoleController::class, 'edit']);
        Route::post('/update/{id}', [RoleController::class, 'update']);
        Route::delete('/delete/{id}', [RoleController::class, 'delete']);
        Route::get('/permissions', [RoleController::class, 'permissions']);
    });

    Route::group(['prefix' => 'holidays'], function () {
        Route::get('/', [PublicHolidayController::class, 'index']);
        Route::post('/add', [PublicHolidayController::class, 'store']);
        Route::get('/edit/{id}', [PublicHolidayController::class, 'edit']);
        Route::post('/update/{id}', [PublicHolidayController::class, 'update']);
        Route::delete('/delete/{id}', [PublicHolidayController::class, 'delete']);


    });

});

Route::post('/nextLeaves',[ApplyForLeaveController::class,'getNextLeaves']);
Route::post('/nextHolidays', [PublicHolidayController::class, 'getNextHolidays']);


