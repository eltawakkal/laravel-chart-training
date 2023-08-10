<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function getAllUser() {
        return [
            'status' => true,
            'message' => 'Berhalsil Mengambil Data',
            'data' => User::all()
        ];
    }

    function getUserByGender($gender) {
        return [
            'status' => true,
            'message' => 'Berhalsil Mengambil Data',
            'data' => User::where('gender', $gender)->get()
        ];
    }

    function storeUser(Request $request) {
        $user = User::create($request->all());

        return [
            'status' => true,
            'message' => 'Berhalsil Menambahkan Data',
            'data' => $user
        ];
    }
}
