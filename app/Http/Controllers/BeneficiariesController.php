<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaries;
use App\Imports\BeneficiariesImport;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class BeneficiariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $beneficiaries = Beneficiaries::all(); 
        return view('beneficiaries.index')
        ->withBeneficiaries($beneficiaries);
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
            Excel::import(new BeneficiariesImport, request()->file('file'));
            \Session::flash("msg"," تم إضافة الملف بنجاح ");

    //     Excel::import(new BeneficiariesImport($request->file));
    //    try {
    //        Excel::import(new BeneficiariesImport($request->file));
    //        \Session::flash("msg"," تم إضافة الملف بنجاح ");
    //    } catch (\Throwable $th) {
    //        \Session::flash("msg","w: حدث خطأ اثناء عملية الادخال يرجى التأكد من صحة الملف");
    //    }
    //     return redirect()->back();
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiaries  $beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiaries $beneficiaries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beneficiaries  $beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiaries $beneficiaries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiaries  $beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiaries $beneficiaries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiaries  $beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiaries $beneficiaries)
    {
        //
    }
}
