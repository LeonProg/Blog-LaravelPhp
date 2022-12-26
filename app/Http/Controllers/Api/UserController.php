<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile() 
    {
        $user = $this->user();
        return [
            'name' => $user->name,
            'email' => $user->email
        ];
    }

    private function user() 
    {
        return Auth::user();
    }
}
