<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use Toastr;

class BusinessUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(BusinessUnit::select('*'))
            ->addColumn('action', function($row){
   
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBusiness">Edit</a>';

                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBusiness">Delete</a>';

                 return $btn;
         })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            }
            return view('admin.business.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BusinessUnit::updateOrCreate(['mis_code' => $request->mis_code],
                ['description' => $request->description, 
                'bu' => $request->bu,
                'segment'=> $request->segment,
                'code'=> $request->code]);    
                
                Toastr::success('BU created', 'title', ['options']);
   
        //return response()->json(['success'=>'BusinessUnit saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessUnit  $businessUnit
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessUnit $businessUnit)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessUnit  $businessUnit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = BusinessUnit::find($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessUnit  $businessUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessUnit $businessUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessUnit  $businessUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BusinessUnit::find($id)->delete();
     
        return response()->json(['success'=>'BusinessUnit deleted successfully.']);
    }
}
