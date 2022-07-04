<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;

use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        $users = User::all();
        foreach($users as $user)
        {
            $data[] = [
                
                'last_name' => $user->last_name,
                'first_name' => $user->first_name,
                'middle_name' => $user->middle_name,
                'code' => $user->code,
                'profile_photo_path' => $user->profile_photo_path,
                'email' => $user->email,
                'role' => $user->role,
                
            ];
        }
        return response()->json($data);
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
    public function store(UserRequest $userRequest, User $user)
    {
        $data = User::create([
            'last_name' => $userRequest->last_name,
            'first_name' => $userRequest->first_name,
            'middle_name' => $userRequest->middle_name,
            'code' => $userRequest->code,
            'role_id' => $userRequest->role_id,
            'profile_photo_path' => $userRequest->profile_photo_path,
            'email' => $userRequest->email,
            'password' =>  Hash::make($userRequest->password),
        ]);
        $data->role = $data->role;
        return response()->json(['message' => 'User has been added successfully', 'data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'last_name' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'profile_photo_path' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255|unique:users,code,'.$id,
            'email' => 'nullable|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'nullable|numeric'
        ]);

        $data = User::find($id);
        if($data)
        {
            $data->fill($request->except(['password']));
            if($request->has('password'))
            {
                $data->password = Hash::make($request->password);
            }
            $data->save();
            $data->role = $data->role;
            return response()->json(['message' => 'User has been updated successfully', 'data' => $data]);
        }
        
        return response()->json(['message' => 'No User found with ID:' . $id]);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User has been removed successfully']);
    }
}
