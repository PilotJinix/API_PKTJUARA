<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $req)
    {
        $req->validate([
            'npk' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('npk', $req->npk)->first();
//        var_dump($user);

        if (!$user || !Hash::check($req->password, $user->password)) {
            return response()->json([
                'message' => "failed"
            ]);
        }

        $token =  $user->createToken($req->device_name)->plainTextToken;
        $this->response['message'] = 'success';
        $this->response['data'] = [
            'token' => $token
        ];

        return response()->json($this->response, 200);
    }

    public function check()
    {
        $user = Auth::user();

        $this->response['message'] = 'success';
        $this->response['data'] = $user;

        return response()->json($this->response, 200);
    }

}
