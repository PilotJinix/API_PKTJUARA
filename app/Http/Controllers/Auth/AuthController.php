<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $response = [
        'message' => null,
        'data' => null
    ];

    public function register(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'npk' => 'required',
            'unitkerja' => 'required',
            'nama_user' => 'required',
        ]);

        User::create([
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'npk' => $req->npk,
            'unitkerja' => $req->unitkerja,
            'nama_user' => $req->nama_user,
        ]);

        $this->response['message'] = 'success';
        return response()->json($this->response, 200);
    }

}
