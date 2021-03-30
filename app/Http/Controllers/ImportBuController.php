<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BusinessUnitImport;
use App\Models\BusinessUnit;
use Illuminate\Pagination\Paginator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Toastr;
use Excel;

class ImportBuController extends Controller
{


    public function index()
    {
        $no = 1;
        $data = BusinessUnit::all();

        return view('admin.business_units.index', compact('data'))->with(['no' => $no]);
    }
    public function store(Request $request)
    {
        if ($request->file('select_file')) {
            $this->validate($request, [
                'select_file'   => 'required|mimes:xls,xlsx'
            ]);

            $path = $request->file('select_file')->getRealPath();
            $import = new BusinessUnitImport();
            $import->onlySheets('CODESEGMENT');
            Excel::import($import, $path);
            //$data = Excel::selectSheetsByIndex(1)->load($path, function ($reader) { })->get();
            //dd($data);
            Toastr::success('BU File Imported', 'Success');

            return back();
        }
        else {
            //toastr()->error('Data Not imported');
            Toastr::error('error occured', 'title', ['options']);
            return back();
        }
    }
    public function count($data){
        $data = DB::table('business_units')->count();

    }


}
