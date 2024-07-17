<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class KeuanganController extends Controller
{
    
    public function index(){
        $payments = Payment::with(['tenant','room.category'])->where("statusPayment","Aktif")->orderBy('created_at','desc')->get();
        return view('adminLayouts.partialLayouts.keuangan',[
            "payments" => $payments
        ]);
    }

    public function generatePDF(Request $request)
    {
        require_once('vendor/autoload.php');

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }
}
