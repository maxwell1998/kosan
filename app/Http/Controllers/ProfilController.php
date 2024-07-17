<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index(){
    $payments = Payment::with(['tenant','room.category'])
    ->whereHas('tenant',function($query){
        $query->where('user_id',auth()->user()->id);
    })
    ->orderBy('tgl_keluar','desc')->first();
    if($payments){
        return view("userLayouts.partialLayouts.profil",[
            "payments" => $payments
        ]);
    } else{
        return redirect("/#room")->with('sewaRejected','Maaf sewa anda ditolak, harap sewa kamar kembali!');
    }
    }
}