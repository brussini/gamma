<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\SegmentImport;
use App\Models\Segmentation;
use Illuminate\Pagination\Paginator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use \Maatwebsite\Excel\Validators\ValidationException;
use toastr;
use Excel;
use Validator;

class ImportSegmentController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Segmentation::select('*'))
            ->addColumn('action', function($row){
   
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="View" class="edit btn btn-primary btn-sm editBook">View</a>';


                 return $btn;
         })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            }

        return view('admin.seg.index');
    }
    public function store(Request $request)
    {
        if ($request->file('file_seg')) {

            $this->validate($request, [
                'file_seg'   => 'required|mimes:xls,xlsx|size:500000',
                'file_seg' => 'max:500000',
            ]);

            $path = $request->file('file_seg')->getRealPath();
            $import = new SegmentImport();
            // $import->onlySheets('Sheet1');
            Excel::import($import, $path);
            //$data = Excel::selectSheetsByIndex(1)->load($path, function ($reader) { })->get();
            //dd($import);
            //toastr()->success('Data imported successfully');
            return back()->with('success','Excel File Processed in Queue');
        }
        else {
            //toastr()->error('Data Not imported');
            return back()->with('error','An error occured');
        }
    }
    public function count($data){
        $data = DB::table('segmentations')->count();

    }
}
