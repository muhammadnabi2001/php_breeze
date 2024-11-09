<?php

use App\Http\Controllers\KitobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TalabaController;
use App\Http\Controllers\TelefonController;
use App\Http\Controllers\UniversitetController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Check;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::get('/post',[PostController::class,'post'])->name('post')->middleware(Check::class);
Route::get('/postcreate',[PostController::class,'postcreate'])->name('postcreate')->middleware(Check::class);
Route::get('/postedit/{post}',[PostController::class,'edit'])->name('postedit')->middleware(Check::class);
Route::post('/postupdate/{post}',[PostController::class,'update'])->name('postupdate')->middleware(Check::class);
Route::get('/postdelete/{post}',[PostController::class,'delete'])->name('postdelete')->middleware(Check::class);
Route::post('/poststore',[PostController::class,'store'])->name('poststore')->middleware(Check::class);
Route::get('/index',[PostController::class,'index'])->name('index');

Route::get('kitob',[KitobController::class,'kitob'])->name('kitob')->middleware(Check::class);
Route::get('kitobcreate',[KitobController::class,'kitobcreate'])->name('kitobcreate')->middleware(Check::class);
Route::get('kitobedit/{kitob}',[KitobController::class,'edit'])->name('kitobedit')->middleware(Check::class);
Route::post('kitobupdate/{kitob}',[KitobController::class,'update'])->name('kitobupdate')->middleware(Check::class);
Route::post('kitobstore',[KitobController::class,'store'])->name('kitobstore')->middleware(Check::class);
Route::get('kitobdelete/{kitob}',[KitobController::class,'delete'])->name('kitobdelete')->middleware(Check::class);

Route::get('telefon',[TelefonController::class,'telefon'])->name('telefon')->middleware(Check::class);
Route::get('telefoncreate',[TelefonController::class,'telefoncreate'])->name('telefoncreate')->middleware(Check::class);
Route::post('telefonstore',[TelefonController::class,'store'])->name('telefonstore')->middleware(Check::class);
Route::get('telefonedit/{telefon}',[TelefonController::class,'edit'])->name('telefonedit')->middleware(Check::class);
Route::post('telefonupdate/{telefon}',[TelefonController::class,'update'])->name('telefonupdate')->middleware(Check::class);
Route::get('telefondelete/{telefon}',[TelefonController::class,'delete'])->name('telefondelete')->middleware(Check::class);

Route::get('permission',[PermissionController::class,'permission'])->name('permission')->middleware(Check::class);

Route::get('users',[UserController::class,'users'])->name('users')->middleware(Check::class);
Route::get('usercreate',[UserController::class,'usercreate'])->name('usercreate')->middleware(Check::class);
Route::post('userstore',[UserController::class,'store'])->name('userstore')->middleware(Check::class);
Route::get('useredit{user}',[UserController::class,'edit'])->name('useredit')->middleware(Check::class);
Route::post('userupdate{user}',[UserController::class,'update'])->name('userupdate')->middleware(Check::class);
Route::get('userdelete{user}',[UserController::class,'delete'])->name('userdelete')->middleware(Check::class);

Route::get('roles',[RoleController::class,'index'])->name('roles')->middleware(Check::class);
Route::get('rolecreate',[RoleController::class,'rolecreate'])->name('rolecreate')->middleware(Check::class);
Route::post('rolestore',[RoleController::class,'store'])->name('rolestore')->middleware(Check::class);
Route::get('roleedit{role}',[RoleController::class,'roleedit'])->name('roleedit')->middleware(Check::class);
Route::post('roleupdate{role}',[RoleController::class,'update'])->name('roleupdate')->middleware(Check::class);
Route::get('roledelete{role}',[RoleController::class,'destroy'])->name('roledelete')->middleware(Check::class);