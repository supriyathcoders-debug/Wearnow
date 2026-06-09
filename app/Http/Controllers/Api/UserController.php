<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
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
}
