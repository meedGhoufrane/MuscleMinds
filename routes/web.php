    <?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\BrandController;
    use App\Http\Controllers\CartController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\WelcomeController;
    use App\Http\Controllers\SupplementController;
    use App\Http\Controllers\WishlistController;
    use App\Http\Controllers\ProfileController;




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



        
    // Route::get('/', function () {
    //     return view('admin.dashboard');
    // });

         
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
 


   // routes for view Athletes
    Route::get('/athletes', function () {
        return view('athletes');
    })->name('athletes');
    
   
    
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
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
    


  //for product 
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    // for brand
    Route::prefix('brands')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('brands.index');
        Route::get('/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/', [BrandController::class, 'store'])->name('brands.store');
        Route::get('/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
        Route::put('/{brand}', [BrandController::class, 'update'])->name('brands.update');
        Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
    });



    Route::get('/supplement', [SupplementController::class, 'index'])->name('supplement');



    //for Wishlist
    // Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::middleware(['auth'])->group(function () {
        Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
        Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
        Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    });



    // cart
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

   
    
    // single page product
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/profile/{product}', [ProfileController::class, 'show'])->name('products.showproduct');


    //filter 
    Route::get('/products/filter', [SupplementController::class, 'filter'])->name('filter');


    //profile 
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
