<?php

namespace App\Http\Controllers;
use App\Fetcher;
use App\Mail\Approved;
use App\Mail\Declined;
use App\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Scanned;
use Illuminate\Support\Facades\Storage;

class FetcherController extends Controller
{

    public function index()
    {
        $fetchers = Fetcher::latest()->paginate(5);
        return view('fetchers.index',compact('fetchers'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create(Guardian $guardian)
    {
        return view('fetchers.create', compact('guardian'));
    }
    public function store(Request $request, Guardian $guardian)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'mi' => 'required',
            'address' => 'required',
            'email' => 'required',
            'contactno' => 'required',
            'image' => 'required',
        ]);


        $data = $request->all();
        $data['guardian_id'] = $guardian->id;

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = "images/".$imageName;

        Storage::disk('local')->put("public/".$imageFullPath, $image_base64 );
        $data['image'] = "$imageFullPath";

        $data = Fetcher::create($data);
        return redirect('/qrcode/'.$data->id);
    }

    public function show(Fetcher $fetcher){
        $time = $fetcher->times()->create();
        Mail::to($fetcher->email)->send(new Scanned($time));
        Mail::to($fetcher->guardian->email)->send(new Scanned($time));
        return view('fetchers.show', compact('time', 'fetcher'));
    }

    public function approve(Fetcher $fetcher)
    {
         Mail::to($fetcher->email)->send(new Approved($fetcher));
         Mail::to($fetcher->guardian->email)->send(new Approved($fetcher));
         return view('home');
    }
    public function decline(Fetcher $fetcher)
    {
         Mail::to($fetcher->email)->send(new Declined($fetcher));
         Mail::to($fetcher->guardian->email)->send(new Declined($fetcher));
         return view('home');
    }

    public function verify(Fetcher $fetcher)
    {
        $fetcher->verification = '1';
        $fetcher->save();
        return redirect()->route('fetchersindex');
    }

    public function unverify(Fetcher $fetcher)
    {
        $fetcher->verification = '0';
        $fetcher->save();
        return redirect()->route('fetchersindex');
    }
}
