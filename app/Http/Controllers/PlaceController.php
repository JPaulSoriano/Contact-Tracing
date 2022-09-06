<?php

namespace App\Http\Controllers;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $places = Place::latest()->paginate(5);

        return view('places.index',compact('places'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('places.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Place::create($request->all());

        return redirect()->route('places.index')
                        ->with('success','Pace created successfully.');
    }
}
