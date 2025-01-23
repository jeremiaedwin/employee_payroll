<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Alert;
use App\Models\Department;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('masters.position.index');
    }

    /**
     * Get data from database to display it on serverside datatable 
     */
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $positions = Position::select([
                    'positions.id',
                    'positions.name as position_name',
                    'departments.name as department_name',
                    'positions.created_at',
                    'positions.updated_at'
                ])
                ->join('departments', 'positions.department_id', '=', 'departments.id'); // Perform the join

            return DataTables::of($positions)
                ->addIndexColumn()
                ->editColumn('created_at', function ($position) {
                    return $position->created_at->format('Y-m-d H:i:s');
                })
                ->editColumn('updated_at', function ($position) {
                    return $position->updated_at->format('Y-m-d H:i:s');
                })
                ->make(true);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                "department_id" => 'required'
            ],
        );

        $isExist = Position::where('name', '=', $request->name)->where("department_id", "=", $request->department_id)->first();

        if($isExist) {
            Alert::error('Gagal!', 'The position has been assigned to this department');
            return redirect()->back();
        }

        $position = new Position;
        $position->name = $request->name;
        $position->department_id = $request->department_id;
        if($position->save()){
            Alert::success('Success!', 'Position Created Successfully');
        } else {
            Alert::error('Gagal!', 'Position Fail Created');
        }
        
        return redirect()->back();
    }

}
