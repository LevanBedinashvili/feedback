<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserInboxController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminSubjectController;
use App\Http\Controllers\Admin\AdminCityController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminContactController;

Route::get('/', [GuestController::class, 'index'])->name('index');
Route::get('/blogs', [GuestController::class, 'blogs'])->name('blogs');
Route::get('/openblog/{id}', [GuestController::class, 'openblog'])->name('openblog');
Route::get('/opensubject/{id}', [GuestController::class, 'opensubject'])->name('opensubject');
Route::get('/contact', [GuestController::class, 'contact'])->name('contact');
Route::post('/submitContact', [GuestController::class, 'submitContact'])->name('submitContact');
Route::get('/categories', [GuestController::class, 'categories'])->name('categories');
Route::get('/getProffesion/{id}', [SubjectController::class, 'getProffesion'])->name('getProffesion');
Route::get('/search', [GuestController::class, 'search'])->name('search');
Route::get('/opencategory/{id}', [GuestController::class, 'opencategory'])->name('opencategory');
Route::get('/price', [GuestController::class, 'price'])->name('price');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//profile
Route::get('/profile/{id}', [GuestController::class, 'profile'])->name('profile');
Route::get('/settings', [UserProfileController::class, 'settings'])->name('settings');
Route::patch('/updatesettings', [UserProfileController::class, 'updatesettings'])->name('updatesettings');
Route::get('/editprofile/{id}', [UserProfileController::class, 'editprofile'])->name('editprofile');
Route::post('/updateprofile/{id}', [UserProfileController::class, 'updateprofile'])->name('updateprofile');
Route::post('/HideNumber', [UserProfileController::class, 'HideNumber'])->name('HideNumber');
Route::get('/myrefferals', [UserProfileController::class, 'myrefferals'])->name('myrefferals');

//gallery
Route::get('/mygallery', [UserProfileController::class, 'mygallery'])->name('mygallery');
Route::get('/imagedelete/{id}', [UserProfileController::class, 'imagedelete'])->name('imagedelete');
Route::post('/storemygallery', [UserProfileController::class, 'gallerystore'])->name('mygallery.store');

// Inbox
Route::get('/recived', [UserInboxController::class, 'recived'])->name('recived');
Route::get('/sent', [UserInboxController::class, 'sent'])->name('sent');
Route::get('/compose', [UserInboxController::class, 'compose'])->name('compose');
Route::post('/send', [UserInboxController::class, 'send'])->name('send');
Route::get('/openmessage/{id}', [UserInboxController::class, 'openmessage'])->name('openmessage');
Route::get('/delete', [UserInboxController::class, 'MsgDelete'])->name('MsgDelete');

//Subject

Route::prefix('subject')->name('subject.')->group(function(){

    Route::get('/addsubject', [SubjectController::class, 'add'])->name('add');
    Route::post('/InputReturner', [SubjectController::class, 'InputReturner'])->name('InputReturner');
    Route::post('/storesubject', [SubjectController::class, 'store'])->name('store');
    Route::get('/mysubjects', [SubjectController::class, 'index'])->name('index');
    Route::delete('/subjectdelete/{id}', [SubjectController::class, 'delete'])->name('delete');
    Route::POST('/editsubject/{id}', [SubjectController::class, 'edit'])->name('edit');
    Route::get('/getProffesion/{id}', [SubjectController::class, 'getProffesion'])->name('getProffesion');
    Route::get('/photos/{id}', [SubjectController::class, 'photos'])->name('photos');
    Route::post('/photosstore/{id}', [SubjectController::class, 'photosstore'])->name('photosstore');
    Route::get('/photoDelete/{id}', [SubjectController::class, 'photoDelete'])->name('photoDelete');
    Route::POST('/rateSys', [SubjectController::class, 'rateSys'])->name('rateSys');



});

Route::resource('/blog', BlogController::class);



//Adminpanel
Auth::routes();
Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin'])->group(function(){
          Route::view('/login','admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/admin','admin.index')->name('home');
        Route::view('/home','admin.index')->name('home');
        Route::get('/users' , [AdminUserController::class , 'users'])->name('users.list');
        Route::get('/subjectapproval' , [AdminSubjectController::class , 'subjectapproval'])->name('subjectapproval');
        Route::get('/subjectapproved' , [AdminSubjectController::class , 'subjectapproved'])->name('subjectapproved');
        Route::post('/approve/{id}' , [AdminSubjectController::class , 'approve'])->name('approve');
        Route::delete('/subjectdelete/{id}' , [AdminSubjectController::class , 'subjectdelete'])->name('subjectdelete');

        Route::get('/blogapproval' , [AdminBlogController::class , 'blogapproval'])->name('blogapproval');
        Route::get('/blogapproved' , [AdminBlogController::class , 'blogapproved'])->name('blogapproved');
        Route::get('/blogapprove/{id}' , [AdminBlogController::class , 'approve'])->name('blogapprove');
        Route::DELETE('/blogdelete/{id}' , [AdminBlogController::class , 'blogDelete'])->name('blogdelete');

        Route::get('/citylist' , [AdminCityController::class , 'citylist'])->name('citylist');
        Route::delete('/deletecity/{id}' , [AdminCityController::class , 'deletecity'])->name('deletecity');
        Route::get('/addcity' , [AdminCityController::class , 'addcity'])->name('addcity');
        Route::post('/storecity' , [AdminCityController::class , 'storecity'])->name('storecity');
        Route::get('/editcity/{id}' , [AdminCityController::class , 'editcity'])->name('editcity');
        Route::post('/updatecity/{id}' , [AdminCityController::class , 'updatecity'])->name('updatecity');
        Route::get('/allcategory' , [AdminCategoryController::class , 'index'])->name('category.index');
        Route::delete('/categorydestroy/{id}' , [AdminCategoryController::class , 'destroy'])->name('category.destroy');
        Route::get('/createcategory' , [AdminCategoryController::class , 'create'])->name('category.create');
        Route::post('/storecategory' , [AdminCategoryController::class , 'store'])->name('category.store');
        Route::get('/editcategory/{id}' , [AdminCategoryController::class , 'edit'])->name('category.edit');
        Route::patch('/updatecategory/{id}' , [AdminCategoryController::class , 'update'])->name('category.update');
        Route::delete('/deleteuser/{id}', [AdminUserController::class, 'deleteuser'])->name('deleteuser');
        Route::resource('/Contact', AdminContactController::class);

        Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    });

});
