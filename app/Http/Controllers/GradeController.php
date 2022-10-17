<?php

namespace App\Http\Controllers;
use App\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:admin');
    }

    public function index()
    {
        $grades = Grade::latest()->paginate(5);

        return view('grades.index',compact('grades'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('grades.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Grade::create($request->all());

        return redirect()->route('grades.index')->with('success','Grade created successfully.');
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit',compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $grade->update($request->all());

        return redirect()->route('grades.index')
                        ->with('success','Grade updated successfully');
    }
}
