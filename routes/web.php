<?php

 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Admin\{PlanController, DetailPlanController, ProfileController, PermissionController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
//Route::get('admin/plans','Admin/PlanController@index')->name('plans.index');
//Route::get('admin/plans','App\Http\Controllers\Admin\PlanController@index')->name('plans.index');
*/

Route::get('plans/{url}/details/{idDetails}',[DetailPlanController::class, 'show'])->name('details.plans.show');

Route::prefix('admin')->group(function(){
    //
    //
    //
    Route::resource('permission', PermissionController::class);
    Route::any('/permission/search',[PermissionController::class,'search'])->name('permission.search');
    //
    //
    //
    Route::resource('profiles', ProfileController::class );
    Route::any('/profiles/search',[ProfileController::class,'search'])->name('profiles.search');
    //
    //
    //
    Route::put('/plans/{url}/details/{idDetails}',[DetailPlanController::class, 'update'])->name('details.plans.update');
    Route::delete('plans/{url}/details/{idDetails}',[DetailPlanController::class, 'destroy'])->name('details.plans.destroy');
    Route::post('/plans/{url}/details/',[DetailPlanController::class,'store'])->name('details.plans.store');
    Route::get('plans/{url}/details/{idDetails}/edit',[DetailPlanController::class, 'edit'])->name('details.plans.edit');
    Route::get('/plans/{url}/details/createdetail',[DetailPlanController::class,'createdetail'])->name('details.plans.createdetail');
    Route::get('plans/{url}/details' , [DetailPlanController::class,'index'])->name('details.plans.index');
    //
    Route::put('/plans/{url}',[PlanController::class,'update'])->name('plans.update');
    Route::get('/plans/{url}/edit',[PlanController::class,'edit'])->name('plans.edit');
    Route::get('/plans/create',[PlanController::class,'create'])->name('plans.create');
    Route::get('/plans/{url}',[PlanController::class,'edit'])->name('plans.edit');
    Route::delete('/plans/{url}',[PlanController::class,'delete'])->name('plans.delete');
    Route::post('/plans/',[PlanController::class,'store'])->name('plans.store');
    Route::get('/plans/{url}',[PlanController::class,'show'])->name('plans.show');
    Route::any('/plans/search',[PlanController::class,'search'])->name('plans.search');
    Route::get('/plans',[PlanController::class,'index'])->name('plans.index');
    Route::get('',[PlanController::class,'admin'])->name('admin.index');
});

Route::get('/greeting', function () {
    return 'Hello World';
}); 
Route::get('/', function () {
    return view('welcome');
});
