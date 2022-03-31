<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
        $user = User::findOrFail($request->getContent());

        if(!$user){
            return response()->json([
                'error' => true,
                'message' => 'Unauthorized',
                'status' => 'Unauthenticated',
            ], 401);
        }

        auth()->login($user);

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($request->remember_me){
             $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return response()->json([
            'error' => false,
            'message' => 'Successfully Login',
            'redirect' => route('admin.home.index'),
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'status' => 'Authenticated',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
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
        if (auth()->check()) {

            $token = auth()->user()->token();

            if (! is_null($token)) {
                $token->update([
                    'revoked' => 1
                ]);
            }
        }

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
}
