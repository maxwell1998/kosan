<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Room;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenghuniController
{
    public function index() {
        $tenant_active = Tenant::get();
      
        // Ambil semua pembayaran dengan eager loading
        $payments = Payment::with('room.category')
          ->orderBy('tgl_keluar', 'desc')
          ->get();
      
        // Filter pembayaran untuk setiap penyewa (menggunakan metode collection)
        foreach ($tenant_active as $tenant) {
          $tenantPayment = $payments->where('tenant_id', $tenant->id)
                                    ->where('statusPayment', 'Aktif')
                                    ->first();
      
          if ($tenantPayment) {
            $tenant['data_payment'] = "Ada";
            $tenant['nomor_kamar'] = $tenantPayment->room->nomor_kamar;
            $tenant['category_name'] = $tenantPayment->room->category->name;
            $tenant['tgl_masuk'] = $tenantPayment->tgl_masuk;
            $tenant['tgl_keluar'] = $tenantPayment->tgl_keluar;
            $tenant['paymentImage'] = $tenantPayment->paymentImage;
          } else {
            $tenant['data_payment'] = "Tidak";
          }
        }
      
        // Filter pembayaran menunggu dan perpanjang (menggunakan metode collection)
        $payment_waiting = $payments->where('statusPayment', 'Menunggu');
        $payment_extend = $payments->where('statusPayment', 'Perpanjang');
      
        return view("adminLayouts.partialLayouts.penghuni", [
          'tenant_active' => $tenant_active,
          'payment_waiting' => $payment_waiting,
          'payment_extend' => $payment_extend
        ]);
    }

    public function showDataWaiting($id){
        $payment = Payment::with(['tenant','room.category'])->where('id',$id)->first();
        return view("adminLayouts.childLayouts.view_dataWaiting",[
            "payment" => $payment
        ] );
    }

    public function showDataExtend($id){
        $payment = Payment::with(['tenant','room.category'])->where('id',$id)->first();
        return view("adminLayouts.childLayouts.view_dataWaiting",[
            "payment" => $payment
        ] );
    }

    public function addTenant($id){
        Payment::where("id",$id)->update(["statusPayment"=> "Aktif"]);

        return redirect("/penghuni")->with("sewaDiterima","Penghuni sudah diverifikasi aktif");
    }

    public function rejectTenant($id){
        $tenant = Tenant::where('id',$id)->first();
        Payment::where('tenant_id', $id)
        ->get()
        ->each(function ($payment) {
            if ($payment["paymentImage"]) {
                Storage::delete($payment["paymentImage"]);
            }
        $payment->delete();
        });
        
        if($tenant["dokumen"]){
            Storage::delete($tenant["dokumen"]);
        }
        $tenant->delete();
        
        return redirect("/penghuni")->with("sewaDitolak","Penghuni sudah ditolak");
    }

    public function addExtend($id){
        Payment::where('id',$id)->update(["statusPayment" => "Aktif"]);
        return redirect("/penghuni")->with("extendDiterima","Perpanjang sewa sudah diterima");
    }

    public function rejectExtend($id){
        $payment = Payment::where('id',$id)->first();
        if($payment["paymentImage"]){
            Storage::delete($payment["paymentImage"]);
        }
        $payment->delete();
        return redirect("/penghuni")->with("extendDitolak","Perpanjang sewa sudah ditolak");
    }
}
