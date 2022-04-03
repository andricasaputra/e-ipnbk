<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $user;

    public function showLoginForm()
    {
        return view('admin.index');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required']
        ]);
        
        if (str_contains($credentials['username'], '@pertanian.go.id')) {
            $credentials['username'] = str_replace('@pertanian.go.id', '', $credentials['username']);
        }

        if (str_contains($credentials['username'], '-')) {
            $credentials['username'] = str_replace('-', '_', $credentials['username']);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('admin/home');
        }
 
        return redirect()->back()->withErrors(['msg' => 'Username atau password yang anda masukkan  sallah.']);
    }

    public function eOfficeLogin(Request $request)
    {
        $this->user = User::whereApiToken($request->getContent())->first();

        if(!$this->user){
            return response()->json([
                'error' => true,
                'message' => 'Unauthorized',
                'status' => 'Unauthenticated',
            ], 401);
        }

        if (! Auth::loginUsingId($this->user->id)) {
            return response()->json([
                'error' => true,
                'message' => 'Unauthorized',
                'status' => 'Unauthenticated',
            ], 401);
        }

        return response()->json([
            'error' => false,
            'message' => 'Successfully Login',
            'redirect' => route('login') .'?_sk='. auth()->user()->api_token,
            'access_token' => auth()->user()->api_token,
            'token_type' => 'Bearer',
            'status' => 'Authenticated'
        ], 200);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        if (request()->ajax()) {
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        }
     
        return redirect('/');
    }

    public function autoLogin(Request $request)
    {
        $this->apiToken = $request->secret_key;

        $this->user = User::whereApiToken($this->apiToken)->first();

        if(!$this->user){
            return response()->json([
                'error' => true,
                'message' => 'Unauthorized',
                'status' => 'Unauthenticated',
            ], 401);
        }

        auth()->login($this->user);

        return response()->json([
            'error' => false,
            'message' => 'Successfully Login',
            'redirect' => route('admin.home.index'),
            'api_token' => $this->apiToken,
            'token_type' => 'Bearer',
            'status' => 'Authenticated'
        ], 200);

    }
}
