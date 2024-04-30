<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;




class AuthController extends Controller
{
    protected $userRepository; 

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('register');
    }
    public function loginForm()
    {
        return view('login');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('reset-password', ['token' => $token]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $user = $this->userRepository->findByEmail($credentials['email']);

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
         if($user->hasRole('admin')){
            return redirect()->route('dashboard')->with('success', 'You have been logged in successfully!');
        
         }
            return redirect()->intended('/')->with('success', 'You have been logged in successfully!');
        }

        return back()->withInput($request->only('email'))->with('error', 'These credentials do not match our records.');
    }

    
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
    
        $user = $this->userRepository->create($data);
        
        if ($user) {
            Auth::login($user);
            $user->assigneRole('user');
            return redirect('/')->with('success', 'Registration successful!');
        } else {
            return back()->with('error', 'Registration failed. Please try again.');
        }
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $request->validate([
            'email' => 'required|email',    
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withErrors(['email' => __($status)]);
    }
 
   public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $user = $this->userRepository->findByEmail($request->email);

    if (!$user) {
        return back()->withErrors(['email' => ['User not found']]);
    }

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = Hash::make($password);
            $user->setRememberToken(Str::random(60)); 
            $user->save();
        }
    );

    if ($status === Password::PASSWORD_RESET) {
        return redirect('/login');
    } else {
        return back()->withErrors(['email' => [__($status)]]);
    }
}       
}
