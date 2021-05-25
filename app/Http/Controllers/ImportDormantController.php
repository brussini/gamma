<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DormantImport;
use App\Models\Dormant;
use Illuminate\Pagination\Paginator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use \Maatwebsite\Excel\Validators\ValidationException;
use Toastr;
use Excel;
use Validator;

class ImportDormantController extends Controller
{


    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Dormant::select('*'))
            ->addColumn('action', function($row){
   
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="View" class="edit btn btn-primary btn-sm editBook">View</a>';


                 return $btn;
         })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            }

        return view('admin.dormant.index');
    }
    public function store(Request $request)
    {
        if ($request->file('file')) {

            $this->validate($request, [
                'file'   => 'required|mimes:xls,xlsx',
                'file' => 'max:500000',
            ]);

            DB::table('dormants')->truncate();

            $path = $request->file('file')->getRealPath();
            $import = new DormantImport();
            // $import->onlySheets('Sheet1');
            Excel::import($import, $path);
            //$data = Excel::selectSheetsByIndex(1)->load($path, function ($reader) { })->get();
            //dd($import);
            Toastr::success('DO File Processed in Queue', 'Success');

            return back();
        }
        else {
            Toastr::error('Error Occured', 'Error');
            return back();
        }
    }
    public function count($data){
        $data = DB::table('dormants')->count();

    }


}
