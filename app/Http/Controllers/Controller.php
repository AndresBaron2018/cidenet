<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         return User::where('user_id', auth()->id())->get();
    //     } else {
    //         return view('home');
    //     }
    // }

    public function store(Request $request)
    {
        $user = User::create([
            'name',
            'identification_card',
            'email',
            'cell_phone_number',
            'password',
        ] + $request->all());

        return $user;
    }
}
