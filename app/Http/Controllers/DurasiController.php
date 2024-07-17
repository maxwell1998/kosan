<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DurasiController extends Controller
{
    public function index(){
        $payments = Payment::with(['tenant','room.category'])
        ->whereHas('tenant',function($query){
            $query->where('user_id',auth()->user()->id);
        })->orderBy('tgl_keluar','desc')->get();
        $payments_last = $payments->where('statusPayment','Aktif')->first();
        return view("userLayouts.partialLayouts.durasi",[
            "payments" => $payments,
            "payments_last" => $payments_last
        ]);
    }

    public function showFormPerpanjang(){
        $tenant = Tenant::where('user_id',auth()->user()->id)->first();

        $existingExtension = Payment::where('tenant_id',$tenant->id)
        ->where('statusPayment','Perpanjang')->first();

        if($existingExtension){
            return redirect("/durasi")->with('extendError', 'Harap tunggu konfirmasi admin dalam perpanjangan sewa');
        } 
        else{
            $payments = Payment::where('tenant_id', $tenant->id)
            ->orderBy('tgl_keluar','desc')
            ->first();

            return view("userLayouts.childLayouts.perpanjangSewa", [
                "payments" => $payments
            ]);
        }
    }

    public function perpanjangSewa(Request $request){
        $validatedDataPayment = $request->validate([
            'tgl_keluar' => 'required',
            'paymentImage' => 'required',
            'nominal' => 'required'
         ]);
        if ($request->file('paymentImage')) {
            $validatedDataPayment["paymentImage"] = $request->file('paymentImage')->store('payment-images');
        };
        $validatedDataPayment['statusPayment'] = "Perpanjang";
        Payment::create($validatedDataPayment + [
            "tenant_id" => $request->tenant_id, 
            "tgl_masuk" => $request->tgl_masuk,
            "room_id" => $request->room_id
         ]);
        return redirect("/durasi");
    }
}
