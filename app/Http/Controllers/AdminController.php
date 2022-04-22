<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rule;
use App\Models\Year;
use Illuminate\Support\Str;


class AdminController extends Controller
{

    public function displayByYear(Request $request)
    {
    
        $years = Year::all();

        $selected = $request['year'] ?? "";

        if ($selected != "") {

            $data = Student::where('year_id', $selected)->first();
            if ($data === null) {
                return redirect()->back()->with('student_year', 'There are no students in that year!');
            } else {
                $data = Student::orderBy('last_name')->where('year_id', $selected)->get();
            }
        } else {
            $data = Student::orderBy('last_name')->get();
        }
        return view('/admin', compact('data', 'years'));
    }


    public function displayBySearch(Request $request)
    {

        if(Student::all()->isEmpty()) {
            return redirect('/create')->with('student_create', 'Create a student!');;
        } else {
        $years = Year::all();

        $search = $request['search'] ?? "";

            if ($search != "") {

                $data = Student::where('first_name', 'LIKE', "%$search%")->orWhere('last_name', 'LIKE', "%$search%")->first();
                if ($data === null) {
                    return redirect()->back()->with('student_search', 'There are no students found!');
                } else {
                    $data = Student::orderBy('last_name')->where('first_name', 'LIKE', "%$search%")->orWhere('last_name', 'LIKE', "%$search%")->get();
                }
            } else {
                $data = Student::orderBy('last_name')->get();
            }
        }
      
        return view('/admin', compact('data', 'years'));
    }

    public function delete($id)
    {
        $data = Student::find($id);
        $data->delete();
        return redirect()->back()->with('student_delete', 'Student deleted successfully!');
    }

    public function edit($id)
    {
        $data = Student::find($id);
        $years = Year::all();
        return view('/edit', compact('data', 'years'));
    }


    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required',

            'email' => [
                'required',
                Rule::unique('students', 'email')->ignore($id)
            ],
            'year' => 'required',
        ]);


        $data = Student::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->year_id = $request->year;
        $data->save();
        return redirect()->back()->with('student_edit', 'Student updated successfully!');
    }

    public function create()
    {
        $years = Year::all();
        return view('/create', compact('years'));
    }

    public function createStudent(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|unique:students|max:255',
            'year' => 'required',
        ]);


        $data = new Student;
        $data->first_name = $request->first_name;
        $data->first_name = Str::ucfirst($data->first_name);
        $data->last_name = $request->last_name;
        $data->last_name = Str::ucfirst($data->last_name);
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->year_id = $request->year;
        $data->save();

        return redirect()->back()->with('student_create', 'Student created successfully!');
    }
}
