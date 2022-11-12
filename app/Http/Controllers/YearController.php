<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class YearController extends Controller
{

    public function index()
    {

        $course = Course::all();
        $years = Year::latest()->get();

        // if (request('search')) {
        //     $yearCollection = $yearCollection
        //         ->where('year_name', 'like', '%' . request('search') . '%');
        // }

        // $years = $yearCollection->paginate(10);
        // dd($years);

        return view('backend.year.index', [
            'years' => $years,
        ]);
    }

    public function create()
    {
        $students = User::where('role_id', '=', '3')->get();
        $course = Course::all();
       

        return view('backend.year.create', ['course' => $course, 'students' => $students]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'year' => 'required',
            'course_year' => 'required',
            'student_id' => 'required',
        ]);
        $course = Course::all();
        try {
            Year::create([
                'student_id' => $request->student_id,
                'course_year' => $request->course_year,
                'year' => $request->year,
                'section' => $request->section,
                
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('year.index')->withMessage('Successfully Created!');
    }


    public function edit(Year $year)
    {
        $course = Course::all();
        $year = Year::find($year->id);
        $students = User::where('role_id', '=', '3')->get();

        return view('backend.year.edit', [
            'single_year' => $year, 'course' => $course, 'students' => $students,
        ]);
    }

    public function show(Year $year)
    {
        return view('backend.year.show', [
            'show_year' => $year
        ]);
    }

    public function update(Request $request, $id)
    {
        $year = Year::find($id);
        $course = Course::all();
        $students = Student::all();

        $year->update([

            'student_id' => $request->student_id,
                'course_year' => $request->course_year,
                'year' => $request->year,
                'section' => $request->section,
        ]);

        $year->update();


        return redirect()->route('year.index');
    }

    public function destroy(Year $year)
    {
        try {
            $year->delete();
            return redirect()->route('year.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function showStudents()
    {
        return view('backend.yearwise.temp');
    }

    public function showFirstYearASection($course_year, $year)
    {
        $yearwisestudents = Year::where('course_year', '=', $course_year)->where('year', '=', $year)->get();
        //dd($yearwisestudents);
        return view('backend.yearwise.yearwisestudent', ['yearwisestudents' => $yearwisestudents]);
    }
}
