<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\MembersContrllers;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\PartnaersControlle;
use App\Http\Controllers\Backend\SectorController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\StaticPageController;
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

Route::get('/', [HomeController::class,'index'])->name('frontend.home');
Route::post('/', [HomeController::class,'storeServiceResquests'])->name('storeServiceResquests');
Route::post('/contact-us', [HomeController::class,'storeContactUs'])->name('storeContactUs');
Route::get('/news', [HomeController::class,'getNews'])->name('news');
Route::get('/details/news/{id}', [HomeController::class,'ditailsNews'])->name('details.news');



Auth::routes(['register' => false]);


Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => 'auth'], function () {
    Route::get('/home', [BackendHomeController::class,'index'])->name('admin.home');
    //User
    Route::get('/users', [UserController::class,'index'])->name('admin.users.index');
    Route::get('/users/datatable', [UserController::class,'datatable'])->name('admin.users.datatable');
    Route::get('/users/create', [UserController::class,'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class,'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserController::class,'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class,'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class,'destroy'])->name('admin.users.destroy');
    //end User

    //members
    Route::get('/members', [MembersContrllers::class,'index'])->name('admin.member.index');
    Route::get('/members/datatable', [MembersContrllers::class,'datatable'])->name('admin.member.datatable');
    Route::get('/member/create', [MembersContrllers::class,'create'])->name('admin.member.create');
    Route::post('/members', [MembersContrllers::class,'store'])->name('admin.member.store');
    Route::put('/member/{id}', [MembersContrllers::class,'update'])->name('admin.member.update');
    Route::get('/member/{id}/edit', [MembersContrllers::class,'edit'])->name('admin.member.edit');
    Route::delete('/member/{id}', [MembersContrllers::class,'destroy'])->name('admin.member.destroy');
    //end members

    //Category
    Route::get('/categories', [CategoryController::class,'index'])->name('admin.category.index');
    Route::get('/category/datatable', [CategoryController::class,'datatable'])->name('admin.category.datatable');
    Route::get('/category/create', [CategoryController::class,'create'])->name('admin.category.create');
    Route::post('/category', [CategoryController::class,'store'])->name('admin.category.store');
    Route::put('/category/{id}', [CategoryController::class,'update'])->name('admin.category.update');
    Route::get('/category/{id}/edit', [CategoryController::class,'edit'])->name('admin.category.edit');
    Route::delete('/category/{id}', [CategoryController::class,'destroy'])->name('admin.category.destroy');
    //end category

    //posts
    Route::get('/posts', [PostController::class,'index'])->name('admin.post.index');
    Route::get('/posts/datatable', [PostController::class,'datatable'])->name('admin.post.datatable');
    Route::get('/post/create', [PostController::class,'create'])->name('admin.post.create');
    Route::post('/posts', [PostController::class,'store'])->name('admin.post.store');
    Route::get('/post/{id}/edit', [PostController::class,'edit'])->name('admin.post.edit');
    Route::put('/post/{id}', [PostController::class,'update'])->name('admin.post.update');
    Route::delete('/post/{id}', [PostController::class,'destroy'])->name('admin.post.destroy');
    //end posts

    //companies
    Route::get('/companies', [CompanyController::class,'index'])->name('admin.company.index');
    Route::get('/company/datatable', [CompanyController::class,'datatable'])->name('admin.company.datatable');
    Route::get('/company/create', [CompanyController::class,'create'])->name('admin.company.create');
    Route::post('/companies', [CompanyController::class,'store'])->name('admin.company.store');
    Route::get('/company/{id}/edit', [CompanyController::class,'edit'])->name('admin.company.edit');
    Route::put('/company/{id}', [CompanyController::class,'update'])->name('admin.company.update');
    Route::delete('/company/{id}', [CompanyController::class,'destroy'])->name('admin.company.destroy');
    //end companies

    //partnaers
    Route::get('/partnaers', [PartnaersControlle::class,'index'])->name('admin.partnaer.index');
    Route::get('/partnaer/datatable', [PartnaersControlle::class,'datatable'])->name('admin.partnaer.datatable');
    Route::get('/partnaer/create', [PartnaersControlle::class,'create'])->name('admin.partnaer.create');
    Route::post('/partnaers', [PartnaersControlle::class,'store'])->name('admin.partnaer.store');
    Route::get('/partnaer/{id}/edit', [PartnaersControlle::class,'edit'])->name('admin.partnaer.edit');
    Route::put('/partnaer/{id}', [PartnaersControlle::class,'update'])->name('admin.partnaer.update');
    Route::delete('/partnaer/{id}', [PartnaersControlle::class,'destroy'])->name('admin.partnaer.destroy');
    //end partnaers

    //sectors
    Route::get('/sectors', [SectorController::class,'index'])->name('admin.sector.index');
    Route::get('/sector/datatable', [SectorController::class,'datatable'])->name('admin.sector.datatable');
    Route::get('/sector/create', [SectorController::class,'create'])->name('admin.sector.create');
    Route::post('/sector', [SectorController::class,'store'])->name('admin.sector.store');
    Route::get('/sector/{id}/edit', [SectorController::class,'edit'])->name('admin.sector.edit');
    Route::put('/sector/{id}', [SectorController::class,'update'])->name('admin.sector.update');
    Route::delete('/sector/{id}', [SectorController::class,'destroy'])->name('admin.sector.destroy');
    //end sectors

    //sliders
    Route::get('/sliders', [SliderController::class,'index'])->name('admin.slider.index');
    Route::get('/slider/datatable', [SliderController::class,'datatable'])->name('admin.slider.datatable');
    Route::get('/slider/create', [SliderController::class,'create'])->name('admin.slider.create');
    Route::post('/sliders', [SliderController::class,'store'])->name('admin.slider.store');
    Route::get('/slider/{id}/edit', [SliderController::class,'edit'])->name('admin.slider.edit');
    Route::put('/slider/{id}', [SliderController::class,'update'])->name('admin.slider.update');
    Route::delete('/slider/{id}', [SliderController::class,'destroy'])->name('admin.slider.destroy');
    //end sliders

    //services
    Route::get('/services', [ServiceController::class,'index'])->name('admin.service.index');
    Route::get('/service/datatable', [ServiceController::class,'datatable'])->name('admin.service.datatable');
    Route::get('/service/create', [ServiceController::class,'create'])->name('admin.service.create');
    Route::post('/services', [ServiceController::class,'store'])->name('admin.service.store');
    Route::get('/service/{id}/edit', [ServiceController::class,'edit'])->name('admin.service.edit');
    Route::put('/service/{id}', [ServiceController::class,'update'])->name('admin.service.update');
    Route::delete('/service/delete/{id}', [ServiceController::class,'destroy'])->name('admin.service.destroy');
    Route::get('/service_requests', [ServiceController::class,'serviceResquests'])->name('admin.service_requests.index');
    Route::get('/service_requests/delete/{id}', [ServiceController::class,'destroyserviceResquests'])->name('admin.service_requests.destroy');
    //end services

    //contactUs
    Route::get('/contact-us', [ContactUsController::class,'index'])->name('admin.contactUs.index');
    Route::get('/contactUs/datatable', [ContactUsController::class,'datatable'])->name('admin.contactUs.datatable');
    Route::delete('/contact-us/{id}', [ContactUsController::class,'destroy'])->name('admin.contactUs.destroy');
    //end contactUs

    //static_page
    Route::get('/static_page', [StaticPageController::class,'index'])->name('admin.static_page.index');
    Route::get('/static_page/create', [StaticPageController::class,'create'])->name('admin.static_page.create');
    Route::post('/static_page', [StaticPageController::class,'store'])->name('admin.static_page.store');
    //end static_page

    //about us
    Route::get('/about-us', [StaticPageController::class,'showAboutUs'])->name('admin.about_us.show');
    Route::post('/about-us', [StaticPageController::class,'updateAboutUs'])->name('admin.about_us.store');
    //end about us
});
