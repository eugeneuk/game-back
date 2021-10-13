<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Messages;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(!Auth::check()){
            if (!Auth::guard('web')->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'message' => Messages::getMessage('login_error')
                ], 401);
            }
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->accessToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'user_type' => $user->type,
            'avatar' => $user->image
        ]);
    }

    public function me(Request $request)
    {
        return Auth::user();
    }

    public function check(Request $request)
    {
        if( !Auth::check() )
            return abort(404);

        if( !$request->has('mytoken') )
            return abort(404);

        if( $request->mytoken != Auth::user()->currentAccessToken() )
            return abort(404);

        return true;
    }
}
