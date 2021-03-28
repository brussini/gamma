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
        $no = 1;
        $data = DB::table('segmentations')->select('*')->get();

        return view('admin.segments.index', compact('data'))->with(['no' => $no]);
    }
    public function store(Request $request)
    {
        if ($request->file('file')) {

            $this->validate($request, [
                'file'   => 'required|mimes:xls,xlsx',
                'file' => 'max:500000',
            ]);

            $path = $request->file('file')->getRealPath();
            $import = new SegmentImport();
            // $import->onlySheets('Sheet1');
            Excel::import($import, $path);
            //$data = Excel::selectSheetsByIndex(1)->load($path, function ($reader) { })->get();
            //dd($import);
            //toastr()->success('Data imported successfully');
            return back()->with('success','Excel File Queued Successfully');
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
