<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }
  public function store(LoginRequest $request)
  {
    // Check if user exists by email or username
    $user = User::where('email', $request->email)->orWhere('username', $request->email)->first();

    if (!$user) {
      return redirect()->back()->withInput()->with('error', 'Invalid email or password');
    }

    if (!Hash::check($request->password, $user->password)) {
      return redirect()->back()->withInput()->with('error', 'Invalid email or password');
    }

    // Log the user in
    Auth::login($user);

    return redirect()->route('dashboard-analytics')->with('success', 'Login successful!');
  }
}
