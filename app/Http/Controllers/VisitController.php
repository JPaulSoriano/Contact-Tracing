<?php

namespace App\Http\Controllers;
use App\Visit;
use App\VisitorType;
use App\Place;
use Illuminate\Http\Request;

class VisitController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => [
            'create', 'store'
        ]]);
    }

    public function index()
    {
        $visits = Visit::latest()->paginate(5);

        return view('visits.index',compact('visits'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $visitortypes = VisitorType::all();
        $places = Place::all();
        return view('visits.create', compact('visitortypes', 'places'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'visitortype_id' => 'required',
            'place_id' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'mi' => 'required',
            'address' => 'required',
            'contactno' => 'required'
        ]);

        $visit = Visit::create($request->all());

        return redirect('/qrcode/'.$visit->id);
    }

    public function show(Visit $visit){

        $time = $visit->times()->create();
        return view('visits.show', compact('visit', 'time'));
    }
}
