<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DigitalProductImport;
use App\Models\DigitalProduct;
use Illuminate\Pagination\Paginator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use toastr;
use Excel;

class ImportDigitalProductController extends Controller
{


    public function index()
    {
        $no = 1;
        $data = DigitalProduct::all();

        return view('admin.digital_product.index', compact('data'))->with(['no' => $no]);
    }
    public function store(Request $request)
    {
        if ($request->file('file_dp')) {
            $this->validate($request, [
                'file_dp'   => 'required|mimes:xls,xlsx'
            ]);

            $path = $request->file('file_dp')->getRealPath();
            $import = new DigitalProductImport();
            $import->onlySheets('DigitalProduct');
            Excel::import($import, $path);
            //$data = Excel::selectSheetsByIndex(1)->load($path, function ($reader) { })->get();
            //dd($data);
            //toastr()->success('Data imported successfully');
            return back()->with('success','Excel File Imported Successfully');
        }
        else {
            //toastr()->error('Data Not imported');
            return back()->with('error','An error occured');
        }
    }
    public function count($data){
        $data = DB::table('digital_products')->count();

    }


}
