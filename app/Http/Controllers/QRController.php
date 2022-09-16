<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Fetcher;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function generateQrCode($id)
    {
        $fetcher = Fetcher::find($id);
        return view('qrcode', compact('fetcher'));
    }
}
