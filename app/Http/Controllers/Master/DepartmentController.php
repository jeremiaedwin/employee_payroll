<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Alert;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('masters.department.index');
    }

    /**
     * Get data from database to display it on serverside datatable 
     */
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $departments = Department::select(['id', 'name', 'updated_at', 'created_at']);
            return DataTables::of($departments)
                ->addIndexColumn() 
                ->editColumn('created_at', function ($department) {
                    return $department->created_at->format('Y-m-d H:i:s');
                })
                ->editColumn('updated_at', function ($department) {
                    return $department->updated_at->format('Y-m-d H:i:s');
                })
                ->make(true);
        }
    }

    /**
     * Get specify job data from database by primary key
     */
    public function getDataById($id)
    {
        // Find the job by its ID
        $department = Department::find($id);

        // Check if the department exists
        if (!$department) {
            // Return a 404 response if not found
            return response()->json([
                'message' => 'department not found'
            ], 404);
        }

        // Return the department as JSON
        return response()->json([
            'success' => true,
            'data' => $department
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
            ],
        );

        $department = new Department;
        $department->name = $request->name;
        if($department->save()){
            Alert::success('Success!', 'Department Created Successfully');
        } else {
            Alert::error('Gagal!', 'Department Fail Created');
        }
        
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
            ],
        );

        $department = Department::find($request->id);
        $department->name = $request->name;
        if($department->save()){
            Alert::success('Success!', 'Department Updated Successfully');
        } else {
            Alert::error('Gagal!', 'Department Fail Updated');
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }

        $department->delete();

        return response()->json(['message' => 'Department Deleted Successfully'], 200);
    }
       
}
