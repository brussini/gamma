<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DigitalProductImport;
use App\Models\DigitalProduct;
use Illuminate\Pagination\Paginator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Toastr;
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
            $import->onlySheets('Sheet1');
            Excel::import($import, $path);
            //$data = Excel::selectSheetsByIndex(1)->load($path, function ($reader) { })->get();
            //dd($data);
            Toastr::success('DP File Imported', 'Success');

            return back();
        }
        else {
            Toastr::error('Error Occured', 'Error');
            return back();
        }
    }
    public function count($data){
        $data = DB::table('digital_products')->count();

    }


}
