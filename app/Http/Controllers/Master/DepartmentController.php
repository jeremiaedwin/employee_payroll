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
}
