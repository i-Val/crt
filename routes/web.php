<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PageController;
use App\Models\Service;
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

Route::get('/', function () {  //route to front page
    // return view('welcome');

    //Getting and sending necessary data from the models to the front page
    $services = Service::all()->take(3);

    return view('Pages.index', compact('services'));
})->name('page.home');

/*
---------------------------------------------------------
NON ADMINISTRATIVE ROUTES
---------------------------------------------------------
*/
Route::get('/about', [PageController::class, 'about'])->name('page.about');
Route::get('/team', [PageController::class, 'team'])->name('page.team');
Route::get('/blogs', [PageController::class, 'blogs'])->name('page.blogs');
Route::get('/contact', [PageController::class, 'contact'])->name('page.contact');
Route::post('/send-email', [MailController::class, 'sendMail'])->name('contact.email');
Route::get('blogs/single/{id}', [PageController::class, 'showSingleBlog'])->name('blog.show');
Route::get('blogs/single/{title}', [PageController::class, 'showBlogByTitle'])->name('blog.show.title');


/* 
--------------------------------------------------------------------------------
    Administrative Routes
--------------------------------------------------------------------------------
 */

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');

//THE ROUTES BELOW REQUIRE A SESSION VALUE FOR AUTHENTICATION.
Route::middleware('admin.session')->group(function(){
    Route::get('/administrator', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    //SERVICES
    Route::get('admin/services/add', [AdminController::class, 'showNewServicePage'])->name('admin.service.add');
    Route::post('admin/services/add', [AdminController::class, 'addNewService'])->name('admin.service.add');
    Route::get('admin/services', [AdminController::class, 'showServicesPage'])->name('admin.service');
    Route::get('admin/service/delete/{id}', [AdminController::class, 'deleteService'])->name('admin.service.delete');
    Route::get('admin/service/edit/{id}', [AdminController::class, 'showUpdateServiceForm'])->name('admin.service.edit');
    Route::patch('admin/service/update', [AdminController::class, 'updateService'])->name('admin.service.update');


    //TEAMS
    Route::get('admin/teams/add', [AdminController::class, 'showNewTeamPage'])->name('admin.teams.add');
    Route::post('admin/teams/add', [AdminController::class, 'addNewTeam'])->name('admin.teams.add');
    Route::get('admin/teams', [AdminController::class, 'showTeamsPage'])->name('admin.teams');
    Route::get('admin/teams/delete/{id}', [AdminController::class, 'deleteTeam'])->name('admin.teams.delete');
    Route::get('admin/teams/edit/{id}', [AdminController::class, 'showTeamEditPage'])->name('admin.teams.edit');
    Route::patch('admin/teams/update', [AdminController::class, 'updateTeam'])->name('admin.teams.update');

    //BLOGS
    Route::get('admin/blog/add', [AdminController::class, 'showNewBlogPage'])->name('admin.blogs.add');
    Route::post('admin/blog/add', [AdminController::class, 'addNewBlog'])->name('admin.blogs.add');
    Route::get('admin/blogs', [AdminController::class, 'showBlogsPage'])->name('admin.blogs');
    Route::get('admin/blog/delete/{id}', [AdminController::class, 'deleteBlog'])->name('admin.blog.delete');
    Route::get('admin/blog/edit/{id}', [AdminController::class, 'showEditBlogPage'])->name('admin.blog.edit');
    Route::patch('admin/blog/update', [AdminController::class, 'updateBlog'])->name('admin.blog.update');

    //CATEGORIES
    Route::get('admin/category/add', [AdminController::class, 'showNewCategoryPage'])->name('admin.category.add');
    Route::post('admin/category/add', [AdminController::class, 'addNewCategory'])->name('admin.category.add');
    Route::get('admin/categories', [AdminController::class, 'showCategoryPage'])->name('admin.category');
    Route::get('admin/category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin.category.delete');
    Route::get('admin/category/edit/{id}', [AdminController::class, 'showCategoryEditPage'])->name('admin.category.edit');
    Route::patch('admin/category/update', [AdminController::class, 'updateCategory'])->name('admin.category.update');

});


/* 
--------------------------------------------------------------------------------
    END of Administrative Routes
--------------------------------------------------------------------------------
 */