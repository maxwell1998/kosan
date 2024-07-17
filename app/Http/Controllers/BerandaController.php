<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Room;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BerandaController
{
    public function index() {
        $rooms = Room::with('category')->get();
      
        foreach ($rooms as $room) {
          if ($room->whereHas('payment')) {
            $payment = Payment::where('room_id', $room->id)
              ->orderBy('tgl_keluar', 'desc')
              ->first();
      
            if ($payment) {
              $room['tenant_name'] = $payment->tenant->name;
              $room['tgl_keluar'] = $payment->tgl_keluar;
              $room['statusPayment'] = $payment->statusPayment;
            } else {
              $room['statusPayment'] = "Kosong";
            }
          } else {
            $room['statusPayment'] = "Kosong";
          }
        }
      
        return view('adminLayouts.partialLayouts.beranda', [
          "rooms" => $rooms
        ]);
      }
}
