    <?php

    use App\Http\Controllers\AuthController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\CategoryController;


 
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
        
    Route::get('/', function () {
        return view('admin.dashboard');
    });

         
    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('welcome');
    
    
    Route::get('/supplement', function () {
        return view('supplement');
    })->name('supplement');
    
    Route::get('/login', [AuthController::class,'loginForm'])->name('login');
    Route::get('/register', [AuthController::class,'index'])->name('register');
    Route::post('/register', [AuthController::class,'register'])->name('newregister');
    Route::post('/login', [AuthController::class,'login'])->name('newlogin');

    Route::post('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');
    Route::get('/dashboard', function () {return view('dashboard');})->middleware('auth');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');




    // for users 
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::delete('/{id}', [UserController::class, 'delete'])->name('users.delete');
        Route::get('/{userId}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{userId}', [UserController::class, 'update'])->name('users.update');
    });

    

    // for Category
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
    


