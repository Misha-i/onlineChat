<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return response(['employees' =>
            EmployeeResource::collection($employees),
            'message' => 'Successful'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'message' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(),
                'Validation Error']);
        }

        $employee = Employee::create($data);

        return response(['employee' => new
        EmployeeResource($employee),
            'message' => 'Success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return response(['employee' => new
        EmployeeResource($employee), 'message' => 'Success'], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {

        $employee->update($request->all());

        return response(['employee' => new
        EmployeeResource($employee), 'message' => 'Success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response(['message' => 'Employee deleted']);
    }
}
