<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->id;
        $rol_use = DB::table('role_user')
                   ->join('users', 'role_user.user_id', '=', 'users.id')
                   ->join('roles', 'role_user.role_id', '=', 'roles.id')
                   ->select('roles.name')
                   ->where('user_id', '=', $user)
                   ->first();
        return view('home');
    }
}
