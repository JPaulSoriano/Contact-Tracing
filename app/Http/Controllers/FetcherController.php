<?php

namespace App\Http\Controllers;
use App\Fetcher;
use App\Mail\Approved;
use App\Mail\Declined;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Scanned;

class FetcherController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'create', 'store'
        ]]);
    }

    public function index()
    {
        $fetchers = Fetcher::latest()->paginate(5);

        return view('fetchers.index',compact('fetchers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create(Student $student)
    {
        return view('fetchers.create', compact('student'));
    }
    public function store(Request $request, Student $student)
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
        $data['student_id'] = $student->id;

        if ($image = $request->file('image')) {
            $image = $request->image->store('images', 'public');
            $data['image'] = "$image";
        }

        $data = Fetcher::create($data);
        return redirect('/qrcode/'.$data->id);
    }

    public function show(Fetcher $fetcher){
        $time = $fetcher->times()->create();
        Mail::to($fetcher->student->femail)->send(new Scanned($time));
        Mail::to($fetcher->student->memail)->send(new Scanned($time));
        return view('fetchers.show', compact('time', 'fetcher'));
    }

    public function approve(Fetcher $fetcher)
    {
         Mail::to($fetcher->student->femail)->send(new Approved($fetcher));
         Mail::to($fetcher->student->memail)->send(new Approved($fetcher));
         return view('home');
    }
    public function decline(Fetcher $fetcher)
    {
         Mail::to($fetcher->student->femail)->send(new Declined($fetcher));
         Mail::to($fetcher->student->memail)->send(new Declined($fetcher));
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
