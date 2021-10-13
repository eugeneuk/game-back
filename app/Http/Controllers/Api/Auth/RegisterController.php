<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $redirect_name = 'profile';

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->fill( $request->validated() );
        $user->password = Hash::make($request->password);
        $user->save();

        $token = $user->createToken('auth_token')->accessToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'user_type' => $user->type
        ]);

    }
}
