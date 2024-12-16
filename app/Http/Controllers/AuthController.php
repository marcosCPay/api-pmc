<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function verifyToken(Request $request)
    {
        return response()->json(['message' => 'Token válido'], 200);
    }
}
