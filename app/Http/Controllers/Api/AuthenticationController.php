<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function get(Request $request)
    {
        $user = User::find($request->user()->id);
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
                'data' => null,
            ], 404);
        }
        return response()->json([
            'message' => 'User fetched successfully',
            'data' => $request->user(),
        ]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['username'] = $data['email'];
        $data['role'] = 'user';



        $user = User::create($data);

        return response()->json([
            'message' => 'Registration successful',
            'data' => $user,
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
                'data' => null,
            ], 404);
        }
        if (!password_verify($request->password, $user->password)) {
            return response()->json([
                'message' => 'Password is incorrect',
                'data' => null,
            ], 401);
        }
        $token = $user->createToken('API Token')->accessToken;
        return response()->json([
            'message' => 'Login successful',
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
