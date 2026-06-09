<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }
  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);
    $user = User::where('email', $request->email)->first();
    if (!$user) {
      return redirect()->back()->with('error', 'Invalid email or password');
    }
    if (!Hash::check($request->password, $user->password)) {
      return redirect()->back()->with('error', 'Invalid email or password');
    }
    return redirect()->route('dashboard-analytics');
  }
}
