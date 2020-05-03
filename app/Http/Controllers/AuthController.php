<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class AuthController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()){
            return response()->json([
                'message' => 'user create successfully!',
                'status_code' => 201
            ], 201);
        } else{
            return response()->json([
                'message' => 'Some errors occurred, please try again',
                'status_code' => 500
            ], 500);
        }

    }
    /**
     * Login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean',
        ]);
            if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return response()->json([
                    'message' => 'Unauthorized',
                    'status_code' => 401
                ], 401);
            }

        $user = $request->user();

        if($user->role == 'administrator'){
            $tokenData = $user->createToken('Personal Access Token', ['do_anything']);
        } else {
            $tokenData = $user->createToken('Personal Access Token', ['can_create']);
        }

        $token = $tokenData->token;

        if($request->remember_me){
            $token->expires_at = Carbon::now()->addweeks(1);
        }

        if($token->save()){
            return response()->json([
                'user' => $user,
                'access_token' => $tokenData->accessToken,
                'token_type' => 'Bearer',
                'token_scope' => $tokenData->token->scopes[0],
                'expires_at' => Carbon::parse($tokenData->token->expires_at)->toDateString(),
                'status_code' => 200
            ], 200);
        } else{
            return response()->json([
                'message' => 'Some errors occurred, please try again',
                'status_code' => 500
            ], 500);
        }
    }
    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'logout successfully!',
            'status_code' => 200
        ], 200);
    }
}
