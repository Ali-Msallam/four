<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    public function signup(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'f_name' => 'required|max:20|min:2',
            'l_name' => 'required|max:20|min:2',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:8|max:20',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->all(),400);
        }
        //$email=$request->email;
        //$code = ((10000*rand(0, 10))+(1000*rand(0, 10))+(100*rand(0, 10))+(10*rand(0, 10))+rand(0, 10));
        //Mail::to($email)->send(new Subscribe($email,$code));
        echo('the code has been sent to your email,please check your inbox');
        User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' =>$request->email,
            'password' => bcrypt($request->password),
            'image' =>$request->image,
        ]);
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->all(),400);
        }
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
        //return $this->returnData('user',$user,'Log in Successfully');
    }
    public function logout(Request $request)
    {

        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
