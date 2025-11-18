<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\Auth\EmailVerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordLinkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UpdateAdsController;
use App\Models\Category;
use App\Models\Ads;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard',function(){
    return view('dashboard');
});


Route::get('profile',[UserController::class, 'show'])->middleware(['auth', 'verified'])->name('profile.show');

// Route::get('menu',[UserController::class, 'menu'])->middleware(['auth', 'verified'])->name('menu');


Route::get('/profile/edit', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('profile.edit');

Route::put('/profile', [UserController::class, 'update'])->middleware(['auth', 'verified'])->name('profile.update');

Route::delete('/profile', [UserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('profile.destroy');




// Route::get('/',function(){
//     return view('ads');
// });

Route::get('/',[AdsController::class,'home'])->name('home');

Route::get('/search',[AdsController::class,'search'])->name('ads.search');

/**Authentification */
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LogoutController::class, 'destroy'])->middleware(['auth', 'verified'])->name('logout');

// Route::get('/dashboard',  'panel.dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/forgot-password-link', [ForgotPasswordLinkController::class, 'forgotpasswordlink'])->name('forgot.password.link');
Route::post('/forgot-password-link', [ForgotPasswordLinkController::class, 'store']);
Route::get('/forgot-password-link-notice', [ForgotPasswordLinkController::class, 'notice'])->middleware('auth')->name('forgot.password.notice');
Route::get('/forgot-password/{token}', [ForgotPasswordController::class, 'forgotpassword'])->name('password.reset');
Route::post('/forgot-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::controller(EmailVerificationController::class)->group(function() {
    Route::get('/email/verify', 'notice')->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->middleware(['auth','signed'])->name('verification.verify');
    Route::post('/email/resend', 'resend')->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
});

/**Authentification */


/** Dashboard */





Route::get('/create-category',function(){
    return view('panel.create-category');
});

Route::put('/update-category/{id}',[CategoryController::class,'update','{id}'])->middleware(['auth', 'verified'])->name('UpdateCategory');

Route::get('/post/edit/{id}', [CategoryController::class, 'edit','{id}'])->middleware(['auth', 'verified'])->name('editCategory');

Route::delete('/adscategory/{id}', [CategoryController::class, 'destroy','{id}'])->middleware(['auth', 'verified'])->name('category.destroy');


// Route::resource('categories', CategoryController::class);



Route::get('/dashboard', function () {
    return view('panel.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/ads',[AdsController::class,'show']);
//Route::get('/post',[CategoryController::class,'index'])->name('postCategory');
Route::get('/adspanel',[AdsController::class,'index'])->middleware(['auth', 'verified'])->name('AdsDashboard');
Route::get('/post/ads-create',[AdsController::class,'create'])->middleware(['auth', 'verified']);
Route::post('/post/ads-create',[AdsController::class,'store']);

Route::get('/update-ads/{id}',function(){
    
    $userCateg=Category::all()->where('user_id',Auth::id());
     $ads=Ads::where('id',request('id'))->first();
    
    $ads2=Ads::findOrFail(request('id'));
        // $ads->update($request->all());
        if(Auth::user()->id==$ads2->user_id){

    return view('panel.update-ads',[
        "idPost"=>request('id'),
        "userCateg"=>$userCateg,
        "data"=>$ads,
       
    ]);}else{
        echo "Not allowed";
    }
    
        
});

Route::put('/create-update-ads/{id}',[AdsController::class,'update'])->name('createupdate');
Route::delete('/{id}', [AdsController::class, 'destroy','{id}'])->middleware(['auth', 'verified'])->name('ad.destroy');
Route::get('/adscategory',[CategoryController::class,'index'])->middleware(['auth', 'verified'])->name('AdsCategory');
Route::post('/post/category-create',[CategoryController::class,'create']);
/** Dashboard */
// Route::get("send-mail", [MailController::class, "index"]);



