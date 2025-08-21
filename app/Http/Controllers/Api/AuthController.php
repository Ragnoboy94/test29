<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *   path="/api/login",
     *   tags={"Auth"},
     *   summary="Логин, выдача токена",
     *   @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/LoginRequest")),
     *   @OA\Response(response=200, description="OK", @OA\JsonContent(ref="#/components/schemas/TokenResponse")),
     *   @OA\Response(response=422, description="Invalid credentials")
     * )
     */
    public function login(Request $r)
    {
        $r->validate(['email' => 'required|email', 'password' => 'required|string']);
        $user = User::where('email', $r->input('email'))->first();
        if (!$user || !Hash::check($r->input('password'), $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 422);
        }
        $token = $user->createToken('api')->plainTextToken;
        return ['token' => $token];
    }
}
