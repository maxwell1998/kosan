<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Tenant;
use App\Models\Payment;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class SewaController 
{
    public function index($id){
        $userId = auth()->user()->id;
        $availableTenant = Tenant::where('user_id',$userId)->whereHas('payment')->first();
        if(!is_null($availableTenant)){
            return redirect('/')->with('tenantError', 'Maaf, Anda sudah booking kamar');
        }
        return view("formLayouts.partialLayouts.formSewa",[
            "rooms"=>Room::where("category_id",$id)->whereDoesntHave('payment')->get()
        ]);
    }

    public function store(Request $request){
    // Cek Ketersediaan Kamar
    $availableRoom = Room::where('id', $request['room_id'])->whereHas('payment')->first();
    if (!is_null($availableRoom)) {
        return redirect('/#room')->with('sewaError','Maaf, Kamar yang anda tuju sudah ada yang booking');
    }

    // Inisiasi User ID dan Room ID
    $userId = auth()->user()->id;

    // Validasi Data Tenant
    $validatedDataTenant = $request->validate([
        'name' => 'required',
        'jk' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'jmlh_anggota' => 'required',
    ]);

    // Simpan Dokumen
    if ($request->file('dokumen')) {
        $validatedDataTenant['dokumen'] = $request->file('dokumen')->store('dokumen-tenants');
    };

    // Create tenant record
    $tenant = Tenant::create($validatedDataTenant + ['user_id' => $userId]);

    // Validasi Data Payment
    $validatedDataPayment = $request->validate([
        'tgl_masuk' => 'required',
        'tgl_keluar' => 'required',
        'paymentImage' => 'required',
        'nominal' => 'required'
     ]);

    // Simpan Payment Image
    if ($request->file('paymentImage')) {
        $validatedDataPayment['paymentImage'] = $request->file('paymentImage')->store('payment-images');
    };

    // Simpan Data Payment
    $validatedDataPayment['statusPayment'] = "Menunggu";
    Payment::create($validatedDataPayment + ['tenant_id' => $tenant->id, 'room_id'=>$request['room_id']]);


    return redirect("/dashboard")->with('sewaSuccess', 'Kamar berhasil disewa, harap menunggu konfirmasi dari admin atau hubungi pengelola.');
}
}
