<?php

namespace App\Http\Controllers;
use App\Student;
use App\Grade;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'create', 'store'
        ]]);
    }

    public function index()
    {
        $students = Student::latest()->paginate(5);

        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $grades = Grade::all();
        return view('students.create', compact('grades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade_id' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'mi' => 'required',
            'address' => 'required',
            'email' => 'required',
            'contactno' => 'required',
            'image' => 'required',
            'father' => 'required',
            'femail' => 'required',
            'fcontactno' => 'required',
            'fimage' => 'required',
            'mother' => 'required',
            'memail' => 'required',
            'mcontactno' => 'required',
            'mimage' => 'required'
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $image = $request->image->store('images', 'public');
            $input['image'] = "$image";
        }
        if ($fimage = $request->file('fimage')) {
            $fimage = $request->fimage->store('images', 'public');
            $input['fimage'] = "$fimage";
        }
        if ($mimage = $request->file('mimage')) {
            $mimage = $request->mimage->store('images', 'public');
            $input['mimage'] = "$mimage";
        }
        $student = Student::create($input);
        return redirect()->route('fetcherscreate', $student->id)
                        ->with('success','Success! Now Enter The Details of Your Fetcher');
    }
}
