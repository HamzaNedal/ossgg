<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('frontend.home');
Route::post('/', 'HomeController@storeServiceResquests')->name('storeServiceResquests');
Route::post('/contact-us', 'HomeController@storeContactUs')->name('storeContactUs');
Route::get('/all-news', 'HomeController@getNews')->name('news');
Route::get('/details/news/{id}', 'HomeController@ditailsNews')->name('details.news');



Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('admin.home');
    //User
    Route::get('/users', 'UserController@index')->name('admin.users.index');
    Route::get('/users/create', 'UserController@create')->name('admin.users.create');
    Route::post('/users/store', 'UserController@store')->name('admin.users.store');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('admin.users.edit');
    Route::put('/users/update/{id}', 'UserController@update')->name('admin.users.update');
    Route::delete('/users/delete/{id}', 'UserController@destroy')->name('admin.users.destroy');
    //end User

    //members
    Route::get('/members', 'MembersContrllers@index')->name('admin.member.index');
    Route::get('/member/create', 'MembersContrllers@create')->name('admin.member.create');
    Route::post('/member/store', 'MembersContrllers@store')->name('admin.member.store');
    Route::put('/member/update/{id}', 'MembersContrllers@update')->name('admin.member.update');
    Route::get('/member/edit/{id}', 'MembersContrllers@edit')->name('admin.member.edit');
    Route::delete('/member/delete/{id}', 'MembersContrllers@destroy')->name('admin.member.destroy');
    //end members

    //Category
    Route::get('/category', 'CategoryController@index')->name('admin.category.index');
    Route::get('/category/create', 'CategoryController@create')->name('admin.category.create');
    Route::post('/category/store', 'CategoryController@store')->name('admin.category.store');
    Route::put('/category/update/{id}', 'CategoryController@update')->name('admin.category.update');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::delete('/category/delete/{id}', 'CategoryController@destroy')->name('admin.category.destroy');
    //end category

    //posts
    Route::get('/posts', 'PostController@index')->name('admin.post.index');
    Route::get('/post/create', 'PostController@create')->name('admin.post.create');
    Route::post('/post/store', 'PostController@store')->name('admin.post.store');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('admin.post.edit');
    Route::put('/post/update/{id}', 'PostController@update')->name('admin.post.update');
    Route::delete('/post/delete/{id}', 'PostController@destroy')->name('admin.post.destroy');
    //end posts

    //companies
    Route::get('/companies', 'CompanyController@index')->name('admin.company.index');
    Route::get('/company/create', 'CompanyController@create')->name('admin.company.create');
    Route::post('/company/store', 'CompanyController@store')->name('admin.company.store');
    Route::get('/company/edit/{id}', 'CompanyController@edit')->name('admin.company.edit');
    Route::put('/company/update/{id}', 'CompanyController@update')->name('admin.company.update');
    Route::delete('/company/delete/{id}', 'CompanyController@destroy')->name('admin.company.destroy');
    //end companies

    //partnaers
    Route::get('/partnaers', 'PartnaersControlle@index')->name('admin.partnaer.index');
    Route::get('/partnaer/create', 'PartnaersControlle@create')->name('admin.partnaer.create');
    Route::post('/partnaer/store', 'PartnaersControlle@store')->name('admin.partnaer.store');
    Route::get('/partnaer/edit/{id}', 'PartnaersControlle@edit')->name('admin.partnaer.edit');
    Route::put('/partnaer/update/{id}', 'PartnaersControlle@update')->name('admin.partnaer.update');
    Route::delete('/partnaer/delete/{id}', 'PartnaersControlle@destroy')->name('admin.partnaer.destroy');
    //end partnaers

    //sectors
    Route::get('/sectors', 'SectorController@index')->name('admin.sector.index');
    Route::get('/sector/create', 'SectorController@create')->name('admin.sector.create');
    Route::post('/sector/store', 'SectorController@store')->name('admin.sector.store');
    Route::get('/sector/edit/{id}', 'SectorController@edit')->name('admin.sector.edit');
    Route::put('/sector/update/{id}', 'SectorController@update')->name('admin.sector.update');
    Route::delete('/sector/delete/{id}', 'SectorController@destroy')->name('admin.sector.destroy');
    //end sectors

    //sliders
    Route::get('/sliders', 'SliderController@index')->name('admin.slider.index');
    Route::get('/slider/create', 'SliderController@create')->name('admin.slider.create');
    Route::post('/slider/store', 'SliderController@store')->name('admin.slider.store');
    Route::get('/slider/edit/{id}', 'SliderController@edit')->name('admin.slider.edit');
    Route::put('/slider/update/{id}', 'SliderController@update')->name('admin.slider.update');
    Route::delete('/slider/delete/{id}', 'SliderController@destroy')->name('admin.slider.destroy');
    //end sliders

    //services
    Route::get('/services', 'ServiceController@index')->name('admin.service.index');
    Route::get('/service_requests', 'ServiceController@serviceResquests')->name('admin.service_requests.index');
    Route::get('/service_requests/delete/{id}', 'ServiceController@destroyserviceResquests')->name('admin.service_requests.destroy');
    Route::get('/service/create', 'ServiceController@create')->name('admin.service.create');
    Route::post('/service/store', 'ServiceController@store')->name('admin.service.store');
    Route::get('/service/edit/{id}', 'ServiceController@edit')->name('admin.service.edit');
    Route::put('/service/update/{id}', 'ServiceController@update')->name('admin.service.update');
    Route::delete('/service/delete/{id}', 'ServiceController@destroy')->name('admin.service.destroy');
    //end services

    //contactUs
    Route::get('/contact-us', 'ContactUsController@index')->name('admin.contactUs.index');
    Route::delete('/contact-us/delete/{id}', 'ContactUsController@destroy')->name('admin.contactUs.destroy');
    //end contactUs

    //static_page
    Route::get('/static_page', 'StaticPageController@index')->name('admin.static_page.index');
    Route::get('/static_page/create', 'StaticPageController@create')->name('admin.static_page.create');
    Route::post('/static_page/store', 'StaticPageController@store')->name('admin.static_page.store');
    // Route::get('/static_page/edit/{id}', 'StaticPageController@edit')->name('admin.static_page.edit');
    // Route::put('/static_page/update/{id}', 'StaticPageController@update')->name('admin.static_page.update');
    // Route::delete('/static_page/delete/{id}', 'StaticPageController@destroy')->name('admin.static_page.destroy');
    //end static_page

    //about us
    //  Route::get('/about-us', 'StaticPageController@index')->name('admin.about_us.index');
    Route::get('/about-us', 'StaticPageController@showAboutUs')->name('admin.about_us.show');
    Route::post('/about-us/update-about_us', 'StaticPageController@updateAboutUs')->name('admin.about_us.store');
    //end about us
});
