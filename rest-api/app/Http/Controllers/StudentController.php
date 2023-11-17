<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request){
        //query builder
        $query = Student::query();

        // sorting
        if ($request->has('sort')) {
            $sortColumn = $request->input('sort');
            $sortDirection = $request->input('order','asc');
            $query->orderBy($sortColumn, $sortDirection);

            $data = [
                "message" => "Sorting students",
                "data" => $query->get()
            ];
            return response()->json($data,200);
        }

        //filtering
        elseif($request->has('jurusan')){
            $jurusan = $request->input('jurusan');

            $data = [
                "message" => "Filtering students by jurusan",
                "data" => $query->where('jurusan', $jurusan)->get()
            ];
            return response()->json($data,200);
        }

        //get all
        elseif($request->has('nama')){
            $nama = $request->input('nama');

            $data = [
                "message" => "Filtering students by nama",
                "data" => $query->where('nama', $nama)->get()
            ];
            return response()->json($data,200);
        }
        else{
            $students = Student::all();
            $data = [
                "message"=>"Get all students",
                "data"=>$students
            ];
            return response()->json($data,200);
        }
    }

    public function store(Request $request){
        $validateInput = $request->validate([
            "nama"=>"required",
            "nim"=>"numeric|required",
            "email"=>"email|required",
            "jurusan"=>"required"
        ]);

        $student = Student::create($validateInput);

        $data1 = [
            "message" => "Student is created succesfully",
            "data" => $student
        ];
        return response()->json($data1,201);
    }
    public function update(Request $request,$id){
        $student = Student::find($id);
        if ($student){
            $input = [
                "nama" => $request->nama ?? $student->nama,
                "nim" => $request->nim ?? $student->nim,
                "email" => $request->email ?? $student->email,
                "jurusan" => $request->jurusan ?? $student->jurusan
            ];
            $student->update($input);

            $data = [
                "massage" => "Data updated",
                "data" => $student
            ];

            return response()->json($data,200);
        }
        else{
            $data = [
                "message" => "Student not found"
            ];
            return response()->json($data,404);
        }
       
    }

    public function destroy(Request $request,$id){
        $student = Student::find($id);
        if($student){
            $student->delete();

            $data = [
                "message" => "Student is deleted",
            ];
            return response()->json($data,200);
        }
        else{
            $data = [
                "message" => "Student not found",
            ];
            return response()->json($data,404);
        }
    }

    public function indexDetail(Request $request,$id){
        $student = Student::find($id);
        if ($student){
            $data =[
                "message" => "Get detail student",
                "data" => $student
            ];
            return response()->json($data,200);
        }   
        else{
            $data = [
                "message" => "Student not found",
            ];
            return response()->json($data,404);     
        }
    }
}

