<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('home');
    }

    public function adminHome()
    {
        $users=DB::table('users')->where('role','1')->where('status','2')->get();

        return view('adminHome')->with('users',$users);
    }
    public function unapproved()
    {
        if(Auth::user()->status==2){
            return view('unapproved');
        }else{
            return abort(404);
        }

    }

}
