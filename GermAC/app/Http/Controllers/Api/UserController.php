<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

            $user = User::create([
            'name'=> request('name'),
            'phone' =>request('phone'),
            'email'=>request('email'),
            'work'=>"User",
            'role_id'=> 1 ,
            'password'=>bcrypt(request('password')),
        ]);


        $token = $user->createToken('authToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
            'message'=>'User created successfully'
        ];

        return response()->json($response, 201);
        }



    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */

     // method to login user

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $email=request('email');
        $password=request('password');
            $userByEmail = User::where('email', $email)->first();
        if ($userByEmail!=null){

                $user= $userByEmail;
                if(hash::check($password,$user->password)) {

            $token = $user->createToken('authToken')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
                'message'=>'User Logged in successfully'
            ];
            return response($response, 200);

        }
                else{
                    return response(['message'=>'Sorry ,You entered a wrong password'], 400);

                }

            }   else{
                return response([ 'message'=>'This User Email is not exist'], 400);

            }


    }

    //method to logout user

    public function logout() {
        try {
            auth('sanctum')->user()->currentAccessToken()->delete();

    return [
        'message' => 'Logged out'
    ];
    }catch (\Error $ex) {
        return  response()->json(["error"=>$ex->getMessage(),"message"=>"The token is not valid or expired"],401);
    }catch (\Exception $ex) {
        return  response()->json(["error"=>$ex->getMessage(),"message"=>"The token is not valid or expired"],401);
    }}

}
