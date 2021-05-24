<?php

use App\Http\Controllers\ChartOfAccountController;
use App\Http\Controllers\InventoryItemsController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectOfferController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AccountSubTypeController;
use App\Http\Controllers\SubProjectController;
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

Route::group(['prefix' => 'projectOffers'], function () {
    Route::get('/', [ProjectOfferController::class, 'index']);
    Route::post('add', [ProjectOfferController::class, 'add']);
    Route::get('edit/{id}', [ProjectOfferController::class, 'edit']);
    Route::post('update/{id}', [ProjectOfferController::class, 'update']);
    Route::delete('delete/{id}', [ProjectOfferController::class, 'delete']);

    Route::post('handleFiles/{id}', [ProjectOfferController::class, 'handleFiles']);

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
