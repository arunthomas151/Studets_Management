<?php

namespace App\Http\Controllers;

use DB;
use App\Gender;
use App\Student;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    protected $key=202;
    public function student(){
        try {
            if (View::exists('Admin.student')) {
                $data = Department::get();
                $data1 = Gender::get();
                return view('Admin.student')->with(['data' => $data , 'data1' => $data1]);
            } else {
                throw new \Exception('Page not found...!');
            }
        } catch (\Throwable $e) {
            return view('Error.404')->with(['msg'=>$e->getMessage()]);
        }
    }
    public function home(){
        try {
            if (View::exists('Admin.home')) {
                $student = DB::table('students')->join('department','students.department_id','=','department.department_id')
                    ->join('gender','students.gender_id','=','gender.gender_id')->get();
                return view('Admin.home')->with(['student' => $student]);
            } else {
                throw new \Exception('Page not found...!');
            }
        } catch (\Throwable $e) {
            return view('Error.404')->with(['msg'=>$e->getMessage()]);
        }
    }
    public function add_student(Request $request){
        $key = 202;
        try{
            $input = $request->except('_token');
            $this->status = Student::create($input);
            if($this->status){
                $key = 200;
                throw new \Exception('Student Added Successfully...!');
            }else{
                throw new \Exception('Stuent Addition Failed...!');
            }
        }catch(\Throwable $e){
            return response()->json(['msg'=>$e->getMessage()],$key);
        }
    }
    public function edit_student($id){
        try {
            if (View::exists('Admin.student')) {
                $data = Department::get();
                $data1 = Gender::get();
                $student = DB::table('students')->join('department','students.department_id','=','department.department_id')
                    ->join('gender','students.gender_id','=','gender.gender_id')->where('student_id',$id)->first();
                return view('Admin.editstudent')->with(['data' => $data , 'data1' => $data1 , 'student' => $student]);
            } else {
                throw new \Exception('Page not found...!');
            }
        } catch (\Throwable $e) {
            return view('Error.404')->with(['msg'=>$e->getMessage()]);
        }
    }
    public function update_student(Request $request){
        $key = 202;
        try{
            $input = $request->except('_token','student_id');
            $this->status = Student::where('student_id',$request->student_id)->update($input);
            if($this->status){
                $key = 200;
                throw new \Exception('Student Updated Successfully...!');
            }else{
                throw new \Exception('No Updates Yet...!');
            }
        }catch(\Throwable $e){
            return response()->json(['msg'=>$e->getMessage()],$key);
        }
    }
    public function delete_student(Request $request){
        try{
            $this->status = Student::where('student_id',$request->student_id)->delete();
            if($this->status){
                $key = 200;
                throw new \Exception('Student Deleted Successfully...!');
            }else{
                throw new \Exception('Something Went Wrong...!');
            }
        }catch(\Throwable $e){
            return response()->json(['msg' => $e->getMessage()],$key);
        }
    }
}
