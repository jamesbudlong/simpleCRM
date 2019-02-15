<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        return User::latest()->paginate(10);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }

    public function getAllUsers()
    {
        // return User::all();
        $posts = User::paginate(10);
        // $response = [
        //     'pagination' => [
        //         'total' => $posts->total(),
        //         'per_page' => $posts->perPage(),
        //         'current_page' => $posts->currentPage(),
        //         'last_page' => $posts->lastPage(),
        //         'from' => $posts->firstItem(),
        //         'to' => $posts->lastItem()
        //     ],
        //     'data' => $posts
        // ];
        return response()->json($posts);
    }
}
