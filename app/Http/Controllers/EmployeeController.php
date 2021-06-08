<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    CONST NID_PATH = "employees/NIDs/";
    CONST IMAGE_PATH = "employees/images/";

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
        $employee = Employee::make($employeeJson);
        $employee[Employee::FIELD_USER_ID] = auth()->user()->id;
        $employee->save();

        return response()->json($employee, 201);
    }

    private function preProcessRequest($request){
        $employeeJson = json_decode($request->employee,true);
        $nid = $request->file('nid');
        $image = $request->file('image');

        if ($nid){
            $filename = time().'.'.$nid->getClientOriginalExtension();
            $nid->storeAs(self::NID_PATH,$filename);
            $employeeJson[Employee::FIELD_NID_PATH] = $filename;
        }

        if ($image){
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs(self::IMAGE_PATH,$filename);
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
            unlink(storage_path('app/'.self::NID_PATH.$employee->nid_path));
        }
        if ($employee->image_path && $request->file('image')){
            unlink(storage_path('app/'.self::IMAGE_PATH.$employee->image_path));
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
            unlink(storage_path('app/'.self::NID_PATH.$employee->nid_path));
        if ($employee->image_path)
            unlink(storage_path('app/'.self::IMAGE_PATH.$employee->image_path));
        $employee->delete();

        return response()->json(null, 204);
    }

    public function getTypes()
    {
        return DB::table('employee_types')->get();
    }

    public function downloadNid($id)
    {
        $filename = Employee::find($id)->nid_path;
        $file = storage_path('app/employees/NIDs/'.$filename);
        $headers = [
            'Content-Type' => 'image/png'
        ];

        return response()->download($file,'nid.png',$headers);
    }

    public function downloadImage($id)
    {
        $filename = Employee::find($id)->image_path;
        $file = storage_path('app/employees/images/'.$filename);
        $headers = [
            'Content-Type' => 'image/png'
        ];

        return response()->download($file,'image.png',$headers);
    }
}
