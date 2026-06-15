<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Employees;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employees::take(15)->orderBy('id', 'desc')->get();
        return view('landing', compact('employees'));
    }
    public function home()
    {
        $employees = Employees::take(15)->orderBy('id', 'desc')->get();
        return view('home', compact('employees'));
    }

    public function employees_list(Request $request)
    {
        $searchText = "";
        if(isset($request->searchText)){
            $searchText = $request->searchText;
            $employees = Employees::where('empid','LIKE','%'.$searchText.'%')
                ->orWhere('emp_name','LIKE','%'.$searchText.'%')
                ->orWhere('emp_designation','LIKE','%'.$searchText.'%')
                ->orWhere('emp_gender','LIKE', $searchText.'%')
                ->orWhere('emp_designation','LIKE','%'.$searchText.'%')
                ->orWhere('emp_address','LIKE','%'.$searchText.'%')
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            $employees = Employees::orderBy('id', 'desc')->paginate(10);
        }
        return view('employees', compact('employees', 'searchText'));
    }

    public function add_employee()
    {
        return view('addnewemployee');
    }
    public function get_employee($id)
    {
        $single_emp = Employees::find($id);
        return response()->json($single_emp);
    }

    public function save_employee(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'empid' => 'required|unique:employees|max:50',
                'emp_name' => 'required|max:120',
                'emp_designation' => 'required',
                'emp_date_of_join' => 'required',
                'emp_gender' => 'required',
                'emp_address' => 'required',
            ],
            [
                'empid.required' => 'The Employee ID is required.',
                'empid.unique' => 'Employee ID already taken.',
                'empid.max' => 'Employee ID maximum length is 50 characters.',
                'emp_name.max' => 'Name maximum length is 120 characters.',
                'emp_name.required' => 'Name is required',
                'emp_designation.required' => 'Designation is required',
                'emp_date_of_join.required' => 'Date of joining is required',
                'emp_gender.required' => 'Gender is required',
                'emp_address.required' => 'Address is required',
            ]
        );
       
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        Employees::insert([
            'empid' => $request->empid,
            'emp_name' => $request->emp_name,
            'emp_designation' => $request->emp_designation,
            'emp_date_of_join' => $request->emp_date_of_join,
            'emp_gender' => $request->emp_gender,
            'emp_address' => $request->emp_address
        ]);
        return redirect()->back()->with('success', 'Employee details has been saved.');
    }

    public function update_employee(Request $request)
    {
        if(isset($request->id)){
            $validator = Validator::make($request->all(), [
                    'empid' => 'required|max:50',
                    'emp_name' => 'required|max:120',
                    'emp_designation' => 'required',
                    'emp_date_of_join' => 'required',
                    'emp_gender' => 'required',
                    'emp_address' => 'required',
                ],
                [
                    'empid.required' => 'The Employee ID is required.',
                    'empid.unique' => 'Employee ID already taken.',
                    'empid.max' => 'Employee ID maximum length is 50 characters.',
                    'emp_name.max' => 'Name maximum length is 120 characters.',
                    'emp_name.required' => 'Name is required',
                    'emp_designation.required' => 'Designation is required',
                    'emp_date_of_join.required' => 'Date of joining is required',
                    'emp_gender.required' => 'Gender is required',
                    'emp_address.required' => 'Address is required',
                ]
            );
        
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            Employees::where('id', $request->id)->update([
                'empid' => $request->empid,
                'emp_name' => $request->emp_name,
                'emp_designation' => $request->emp_designation,
                'emp_date_of_join' => $request->emp_date_of_join,
                'emp_gender' => $request->emp_gender,
                'emp_address' => $request->emp_address
            ]);
            return redirect()->back()->with('success', 'Employee details has been updated.');
        } else {
            return redirect()->back()->with('error', 'Error while updating employee details.');
        }
    }

    public function delete_employee(Request $request)
    {
        $del_emp = Employees::find($request->id);
        $del_emp->delete();
        return redirect()->back()->with('success', 'Employee details has been deleted.');
    }
}
