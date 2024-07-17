<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $id = auth()->user()->id;
        $email = auth()->user()->email;
        
        // pengecekan data user udah tersewa atau belum
        $availble = Tenant::where("user_id",$id)->count();
        if ($email === "fawkostel@gmail.com"){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }elseif ($availble>0){
            $request->session()->regenerate();
            return redirect()->intended("/user");
        }elseif ($availble === 0){
            return redirect()->intended('/#room')->with('dashboardError','Maaf, anda harus sewa kamar untuk melanjutkan');
        }
    }
}
