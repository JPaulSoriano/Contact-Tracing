<?php

namespace App\Http\Controllers;
use App\Visit;
use App\VisitorType;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::latest()->paginate(5);

        return view('visits.index',compact('visits'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $visitortypes = VisitorType::all();
        return view('visits.create', compact('visitortypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'visitortype_id' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'mi' => 'required',
            'address' => 'required',
            'contactno' => 'required'
        ]);

        $visit = Visit::create($request->all());

        return redirect('/qrcode/'.$visit->id);
    }
}
