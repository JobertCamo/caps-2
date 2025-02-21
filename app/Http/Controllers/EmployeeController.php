<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return EmployeeResource::collection(Employee::all());
        return Employee::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Employee $employee, Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'contact' => 'required',
            'job_position' => 'required|max:255',
            'salary' => 'required',
            'department' => 'required|string|max:255',
        ]);

        if(Employee::where('id', $employee->id))
        {
            $employeeinfo = Employee::find($employee->id);

            $employeeinfo->update([
                'email' => $validatedData['email'],
                'contact' => $validatedData['contact'],
                'job_position' => $validatedData['job_position'],
                'salary' => $validatedData['salary'],
                'department' => $validatedData['department'],
            ]);
            
            return response()->json([
                'message' => 'Employee Updated.'
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => 'Employee Not Found.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'message' => 'Employee Deleted Successfully'
        ]);
    }
}
