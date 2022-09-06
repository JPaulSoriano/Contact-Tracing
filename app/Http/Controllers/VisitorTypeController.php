<?php

namespace App\Http\Controllers;
use App\VisitorType;
use Illuminate\Http\Request;

class VisitorTypeController extends Controller
{
    public function index()
    {
        $visitortypes = VisitorType::latest()->paginate(5);

        return view('visitortypes.index',compact('visitortypes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('visitortypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        VisitorType::create($request->all());

        return redirect()->route('visitortypes.index')
                        ->with('success','Visitor Type created successfully.');
    }
}
