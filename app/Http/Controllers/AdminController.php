<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function updateStatus($id)
    {

            DB::table('users')->where('id',$id)->update([
                'status'=>'1',
            ]);

        return redirect()->route('adminHome')->with('success', 'Approved successfully');;
    }

    public function deleteUser($id)
    {

            DB::table('users')->where('id',$id)->delete();

        return redirect()->route('adminHome')->with('success', 'Deleted successfully');;
    }
}
