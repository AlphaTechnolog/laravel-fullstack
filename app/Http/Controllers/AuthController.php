<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Login a user in the app.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->only('email'), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended("dashboard");
        }

        return back()->withErrors([
            "password" => "Incorrect password"
        ]);
    }

    /**
     * Register an user and logging it into app.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doSignup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|string"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $credentials = $request->only("name", "email", "password");
        $credentials['password'] = Hash::make($request->password);

        $user = User::create($credentials);

        if (Auth::attempt($request->only("email", "password"))) {
            $request->session()->regenerate();

            return redirect()->route("dashboard");
        }

        return back()->withErrors([
            "unknown" => "Error at create the user"
        ]);
    }

    /**
     * Logout an user session (invalidate it session and regenerate the token).
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("login");
    }
}
