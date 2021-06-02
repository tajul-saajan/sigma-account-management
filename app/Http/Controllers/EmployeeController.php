<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete', ['only' => ['index','show']]);
         $this->middleware('permission:employee-create', ['only' => ['create','store']]);
         $this->middleware('permission:employee-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:employee-delete', ['only' => ['delete']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $employeeJson = $this->preProcessRequest($request);
        $employee = Employee::create($employeeJson);

        return response()->json($employee, 201);
    }

    private function preProcessRequest($request){
        $employeeJson = json_decode($request->employee,true);
        $nid = $request->file('nid');
        $image = $request->file('image');

        if ($nid){
            $filename = time().'.'.$nid->getClientOriginalExtension();
            $nid->storeAs('employees/NIDs/',$filename);
            $employeeJson[Employee::FIELD_NID_PATH] = $filename;
        }

        if ($image){
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('employees/images/',$filename);
            $employeeJson[Employee::FIELD_IMAGE_PATH] = $filename;
        }
        return $employeeJson;
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return $employee;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if ($employee->nid_path && $request->file('nid')){
            unlink(storage_path('app/employees/NIDs/'.$employee->nid_path));
        }
        if ($employee->image_path && $request->file('image')){
            unlink(storage_path('app/employees/images/'.$employee->image_path));
        }

        $employeeJson = $this->preProcessRequest($request);
        $employee->update($employeeJson);
        return response()->json($employee, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $employee = Employee::find($id);
        if ($employee->nid_path)
            unlink(storage_path('app/employees/NIDs/'.$employee->nid_path));
        if ($employee->image_path)
            unlink(storage_path('app/employees/images/'.$employee->image_path));
        $employee->delete();

        return response()->json(null, 204);
    }

    public function getTypes()
    {
        return DB::table('employee_types')->get();
    }
}
