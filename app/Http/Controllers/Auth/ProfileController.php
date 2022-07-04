<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $user =  $request->user();

        return response()->json([
            'last_name' => $user->last_name,
            'first_name' => $user->first_name,
            'middle_name' => $user->middle_name,
            'code' => $user->code,
            'profile_photo_path' => $user->profile_photo_path,
            'email' => $user->email,
            // 'role' => $user->role,
        ]);
    }
}
