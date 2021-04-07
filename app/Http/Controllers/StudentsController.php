<?php

namespace App\Http\Controllers;

use App\students;
use App\logbook;
use App\Imports\StudentImport;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Excel;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        //
        return view('layouts.dashboard.skelton');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.addStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('avatar'))
        {
            $img=$request->reg_no.'.jpeg';
            $filepath  = Storage::putFileAs('public/avatars', $request->file('avatar'),$img);
            $data['avatar']=$img;
        }


         $student= students::create($data);
         return redirect()->route('home');

      return   $student ;


    }



          public function importExcel(Request $request)
      {
          Excel::import(new StudentImport, request()->file('import_file'));
         return back()->with('success', 'Insert Record successfully.');
         // $path = $request->file('import_file')->getRealPath();
         // Excel::import(new StudentImport, $path);

      }

          /**
     * Display the specified resource.
     *
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(students $student)
    {
        //
        $student;
        $data=logbook::where('student_id',$student->id)->latest()->paginate(15);
        return view('userlog',compact('data','student'));

        return $student;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(students $students)
    {
        //
    }
}
