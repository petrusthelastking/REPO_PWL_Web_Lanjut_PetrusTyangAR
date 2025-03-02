<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//-------------------------------Basic Routing----------------------------------

//Membuat route '/' yang menampilkan pesan 'Selamat Datang'
// Route::get('/', function () {
//     return 'Selamat Datang';
// });

// Route::get('/hello', function () {
//     return 'Hello World';
// });

route::get('/hello', [WelcomeController::class, 'hello']);


Route::get('/world', function () {
    return 'World';
   });
//Membuat route '/' yang menampilkan pesan NIM dan Nama
// Route::get('/about', function () {
//     return 'NIM : 2341720227 <br> Nama : Petrus Tyang Agung Rosario\'';
// });


//-------------------------------Routing Parameters-------------------------------
// Route::get('/user/{name}', function ($name) {
//     return 'Nama saya '.$name;
// });

Route::get('/user/{name}', function ($name) {
return 'Petrus Tyang Agung Rosario '.$name;
});   

// Route::get('/articles/{id}', function ($id) {
//     return 'Halaman artikel dengan ID '.$id;
// });


//-----------------------------Routing Optional Parameters-------------------------

/*membuat route /user sekaligus mengirimkan parameter berupa nama user $name dimana parameternya bersifat opsional
* karena $name memiliki nilai default
*/

// Route::get('/user/{name?}', function ($name=null) {
//     return 'Nama saya '.$name;
// });


//-----------------------------Routing Controllers--------------------------

/*
*Membuat route dengan URL '/hello' yang akan mengakses/mengarahkan ke controller WelcomeController
*dan method hello()
*/
// Route::get('/hello', [WelcomeController::class, 'hello']);

/*Membuat route dengan URL '/' yang akan mengakses/mengarahkan ke controller PageController
*dan method index()
*/
// Route::get('/', [PageController::class, 'index']);

/*Membuat route dengan URL '/about' yang akan mengakses/mengarahkan ke controller PageController
*dan method about()
*/
// Route::get('/about', [PageController::class, 'about']);

/*Membuat route dengan URL '/articles/{id}' yang akan mengakses/mengarahkan ke controller PageController
*dan method articles()
*/
// Route::get('/articles/{id}', [PageController::class, 'articles']);

Route::get('/posts/{post}/comments/{comment}', function 
($postId, $commentId) {
 return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
    });

Route::get('/articles/{id}', [ArticleController::class, 'articles']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/', [HomeController::class, 'index']);
Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
   ]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
   ]);

   //---------------------------------------------Routing View----------------------------------------
//membuat route '/greeting' yang menampilkan view hello.blade.php dan mengirimkan data 'name' dengan nilai 'Muhammad Rifda Musyaffa'
// Route::get('/greeting', function () {
//     return view('hello', ['name' => 'Muhammad Rifda Musyaffa\'']);
// });
Route::get('/greeting', [WelcomeController::class, 
   'greeting']);

//---------------------------------------------Routing Name----------------------------------------
// Route::get('/user/profile', function () {
//     //
//    })->name('profile');
//    Route::get(
//     '/user/profile',
//     [UserProfileController::class, 'show']
//    )->name('profile');
//    // Generating URLs...
//    $url = route('profile');
//    // Generating Redirects...
//    return redirect()->route('profile');


//---------------------------------------------Routing Group----------------------------------------
// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//     // Uses first & second middleware...
//     });
//    Route::get('/user/profile', function () {
//     // Uses first & second middleware...
//     });
//    });
//    Route::domain('{account}.example.com')->group(function () {
//     Route::get('user/{id}', function ($account, $id) {
//     //
//     });
//    });
//    Route::middleware('auth')->group(function () {
//    Route::get('/user', [UserController::class, 'index']);
//    Route::get('/post', [PostController::class, 'index']);
//    Route::get('/event', [EventController::class, 'index']);
//    });


//---------------------------------------------Routing Prefix----------------------------------------
// Route::prefix('admin')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
//  });


//---------------------------------------------View Routing----------------------------------------
// Route::view('/welcome', 'welcome');
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);