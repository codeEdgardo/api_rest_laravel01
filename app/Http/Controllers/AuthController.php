<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \stdClass;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        // $nueva_cookie = cookie('token', $token);

        // return->response()

        return response()->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password')))
        {
            return response()->json(['message'=>'credenciales invalidas'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        // $nueva_cookie = setCookie('token', $token, time() + (60*60*24*31));
        // $response = $this->withCookie('color', 'blue')->get('/');

        // echo("nueva_cookie");
        // echo($nueva_cookie);
        return response()->json([
            'message' => 'Hola '.$user->name,
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ])->cookie(
            'session', $token, time() + (60*60*24*31)
        );

        // return redirect()->route('/index');
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Cierre de sesion'
        ];
    }

    
}
