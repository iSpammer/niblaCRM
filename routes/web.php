<?php

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

Auth::routes();

Route::group(['middleware' => 'web'], function () {
    //
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function() {
    return view('pages.dashboard');
});
//Dashboard
Route::get('/main', 'DashboardController@index')->name('dashboard.index');

//Real time chat
Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

//Categories
Route::get('/category', 'CategoryController@index')->name('category.index');
//Category Add
Route::post('/addCategory', 'CategoryController@store')->name('category.add');
//Remove Category
Route::post('/deleteCategory/{id}', 'CategoryController@destroy')->name('category.remove');
//Edit Category
Route::post('/editCategory', 'CategoryController@editCategory')->name('category.edit');

//Posts
Route::get('/addNewPost', 'PostController@index')->name('post.index');
//Add Posys
Route::post('/addPost', 'PostController@store')->name('post.add');

//Agent
Route::get('/Agent', 'AgentController@index')->name('agent.index');
//Add agent
Route::post('/addAgent', 'AgentController@store')->name('agent.add');
//Remove agent
Route::post('/deleteAgent', 'AgentController@removeAgent')->name('agent.remove');
//Edit agent
Route::post('/editAgent', 'AgentController@editAgent')->name('agent.edit');
//Add Project To Agent page
Route::get('/addProjectAgentPage/{id}', 'AgentController@showAddProject');
//Add Project To Agent
Route::post('/addProjectAgent', 'AgentController@addProject')->name('agent.addProject');
//Edit Agent Page
Route::get('/editAgent/{id}', 'AgentController@edit')->name('agent.edit');
//Update Agent Page
Route::post('/updateAgent', 'AgentController@update')->name('agent.update');


Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});
Route::get('/meaw', function () {
    return view("welcome");
});

//Project
Route::get('/Project', 'ProjectController@index')->name('project.index');
//Add project
Route::post('/addProject', 'ProjectController@store')->name('project.add');
//Remove Project
Route::post('/deleteProject', 'ProjectController@removeProject')->name('project.remove');
//Edit Project
Route::post('/editProject', 'ProjectController@editProject')->name('project.edit');
//Add Contract To Project page
Route::get('/addContractProjectPage/{id}', 'ProjectController@showAddContract');
//Add Contract To Project
Route::post('/addContractProject', 'ProjectController@addContract')->name('project.addContract');
//Edit Project Page
Route::get('/editProject/{id}', 'ProjectController@edit')->name('project.edit');
//Update Project Page
Route::post('/updateProject', 'ProjectController@update')->name('project.update');


//contract
Route::get('/contract', 'contractController@index')->name('contract.index');
//Add contract
Route::post('/addContract', 'contractController@store')->name('contract.add');
//Remove contract
Route::post('/deletecontract/{id}', 'contractController@destroy')->name('contract.remove');
//Edit contract
Route::post('/editcontract/{id}', 'contractController@update')->name('contract.edit');


Route::get('manyrole','ManyController@manyRoles');


//APIS
Route::get('/getStatus', function () {
    $status = DB::table('status')->select()->get();
    return (json_encode($status));
});


Route::get('/getContracts', function () {
    $contracts = DB::table('contract')->select()->get();
    return (json_encode($contracts));
});

Route::get('/getProjects', function () {
    $projects = DB::table('project')->select()->get();
    return (json_encode($projects));
});
    Route::get('/getTiers', function () {
        $projects = DB::table('tier')->select()->get();
        return (json_encode($projects));
});

Route::get('/getClass', function () {
    $projects = DB::table('class')->select()->get();
    return (json_encode($projects));
});



/* BLOG */
//List All Posts
Route::get('/blog', 'BlogController@index')->name('blog.index');
//Show Single Post
Route::get('/blog/{id}', 'BlogController@show')->name('blog.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
