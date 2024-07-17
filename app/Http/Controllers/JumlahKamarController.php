<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use App\Models\Payment;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class JumlahKamarController
{
    public Function index(){
        $rooms = Room::with('category')->get();
        foreach ($rooms as $room) {
            $payment = Payment::where('room_id', $room->id)
            ->first();
    
            if ($payment) {
            $room['statusTenant'] = "Ada";
            $room['tenant_name'] = $payment->tenant->name;
            $room['statusPayment'] = $payment->statusPayment;
            } else {
            $room['statusTenant'] = "Tidak";
            }
        } 
        return view("adminLayouts.partialLayouts.jumlahKamar",[
            "rooms"=>$rooms
        ]);
    }
    public function showFormTambah(){
        $categories = Category::all()->count();
        if ($categories === 0){
            return redirect('/jmlhKamar')->with('showError','Data jenis kamar tidak ditemukan, harap isi jenis kamar dahulu!');
        } else{
            return view("adminLayouts.childLayouts.tambah_jumlahKamar",[
                "categories"=>Category::all()
            ]);
        }
    }
    
    public function showFormEdit(Room $room){
        return view("adminLayouts.childLayouts.edit_jumlahKamar",[
            "rooms"=>Room::where("id",$room->id)->get(),
            "categories"=>Category::all()
        ]);
    } 

    public function store(Request $request){
        $validatedData = $request->validate([
            'nomor_kamar' => ['required','unique:rooms'],
            'category_id' => ['required','numeric']
        ]);

        Room::create($validatedData);

        return redirect("/jmlhKamar");
    }

    public function update(Request $request ,Room $room){
        $data = [
            "nomor_kamar" => $request['nomor_kamar'],
            "category_id" => $request["category_id"]
        ];
        Room::where("id",$room->id)->update( $data );

        return redirect("/jmlhKamar");
    }

    public function destroy(Room $room){
        Room::where("id",$room->id)->delete();
        
        return redirect("/jmlhKamar");
    }
}
