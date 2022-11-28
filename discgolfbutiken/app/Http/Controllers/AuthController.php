<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        if ($users != null) {
            return $users;
        } else {
            return response()->json([
                'message' => 'No users in the list.'
            ], 404);
        }
    }
    //register user 

    public function register(Request $request)
    {
        // validate the input
        $validatedUser = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:100'
            ]
        );
        // if the input has errors
        if ($validatedUser->fails()) {
            return response()->json([
                'message' => 'All fields must be filled. Email must be a correct email that does not have a previous user.',
                'error' => $validatedUser->errors()
            ], 401);
        }

        // if input is correct, store user and save token
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        $token = $user->createToken('APITOKEN')->plainTextToken;
        $response = [
            'message' => "User created.",
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    // login user 
    public function login(Request $request)
    {
        // validate the input
        $validatedUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:100'
            ]
        );
        // if the input has errors
        if ($validatedUser->fails()) {
            return response()->json([
                'message' => 'All fields must be filled. Email must be a correct email that does not have a previous user.',
                'error' => $validatedUser->errors()
            ], 401);
        }

        // incorrect login inputs - send error
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Incorrect login details.'
            ], 401);
        }

        // login user when details is correct
        $user = User::where('email', $request->email)->first();
        return response()->json([
            'message' => 'You are now logged in!',
            'token' => $user->createToken('APITOKEN')->plainTextToken
        ], 200);
    }

    // Logout 
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $response = [
            'message' => 'User is logged out.'
        ];
        return response($response, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->delete();
            return response()->json([
                'message' => 'The user has been deleted.'
            ]);
        } else {
            return response()->json([
                'message' => 'User not found.'
            ], 404);
        }
    }
}
