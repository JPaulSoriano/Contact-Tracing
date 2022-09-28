<?php

namespace App\Http\Controllers;
use App\Student;
use App\Guardian;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function create(Student $student)
    {
        return view('guardians.create', compact('student'));
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
            'image' => 'required'
        ]);

        $input = $request->all();
        $input['student_id'] = $student->id;

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = "images/".$imageName;

        Storage::disk('local')->put("public/".$imageFullPath, $image_base64 );
        $input['image'] = "$imageFullPath";


        $guardian = Guardian::create($input);
        return redirect()->route('fetcherscreate', $guardian->id)->with('success','Success! Now Enter The Details of Your Fetcher');
    }
}
