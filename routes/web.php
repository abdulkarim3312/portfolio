<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('frontend.index');
});

Route::controller(DemoController::class)->group(function(){
    Route::get('/about', 'index')->name('about.page')->middleware('check');
    Route::get('/contact', 'contactMethod')->name('contact.page');
});

// All Admin Route
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('edit.profile');
    Route::post('/store/profile', 'storeProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

// Home Slide All Route
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
});

// About Page All Route
Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/about/', 'UpdateAbout')->name('update.about');

    Route::get('/about', 'HomeAbout')->name('home.about');

    Route::get('/about/multi/image', 'MultiImage')->name('about.multi_image');
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi_image');
    Route::get('/all/multi/image', 'allMultiImage')->name('all.multi_image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi_image');
    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi_image');
    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi_image');
    
});

// Portfolio All Route
Route::controller(PortfolioController::class)->group(function(){
    Route::get('/all/portfolio', 'allPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio', 'addPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'storePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/{id}', 'editPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio/{id}', 'updatePortfolio')->name('update.portfolio');
    Route::post('/delete/portfolio/{id}', 'deletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');
    
});

// Blog Category All Route
Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/add/blog/category', 'AddBlogCategory')->name('blog.add.category');
    Route::post('/store/blog/category', 'StoreBlogCategory')->name('blog.store.category');
    Route::get('/all/blog/category', 'AllBlogCategory')->name('blog.all.category');
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('blog.edit.category');
    Route::post('/update/blog/category/{id}', 'updateBlogCategory')->name('blog.update.category');
    Route::get('/delete/blog/category/{id}', 'deleteBlogCategory')->name('blog.delete.category');
    
});

// Blog All Route
Route::controller(BlogController::class)->group(function(){
    Route::get('/add/blog', 'AddBlog')->name('blog.add');
    Route::post('/store/blog', 'StoreBlog')->name('blog.store');
    Route::get('/all/blog', 'AllBlog')->name('blog.all');
    Route::get('/edit/blog/{id}', 'EditBlog')->name('blog.edit');
    Route::post('/update/blog', 'UpdateBlog')->name('blog.update');
    Route::get('/update/blog/{id}', 'DeleteBlog')->name('blog.delete');

    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');

    Route::get('/blog', 'HomeBlog')->name('blog.home');
});

// Footer All Route
Route::controller(FooterController::class)->group(function(){
    Route::get('/footer/page', 'FooterSetup')->name('footer.setup');
    Route::post('/update/Footer', 'UpdateFooter')->name('update.footer');
});

// Contact All Route
Route::controller(ContactController::class)->group(function(){
    Route::get('/contact/page', 'Contact')->name('contact.me');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');

    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
});



Route::get('/dashboard', function () {
    return view('admin.home.index');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
