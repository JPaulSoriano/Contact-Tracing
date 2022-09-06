<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Visit;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function generateQrCode($id)
    {
        $visit = Visit::find($id);
        return view('qrcode', compact('visit'));
    }
}
