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
        // $this->validate($request, [
        //     'select_file'  => 'required|mimes:xls,xlsx'
        // ],
        // [
        //     'select_file.required' => __('يرجي إدخال الملف '),
        // ]);
       try {
            Excel::import(new BeneficiariesImport, request()->file('file'));
           \Session::flash("msg","s: تم إضافة الملف بنجاح ");
       } catch (\Throwable $th) {
           \Session::flash("msg","w: حدث خطأ اثناء عملية الادخال يرجى التأكد من صحة الملف");
       }
       return redirect()->back();
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
    public function edit($id)
    {   //dd($id);
        $beneficiarie = Beneficiaries::findOrFail($id);
        return view('beneficiaries.edit',[
        'beneficiarie'=> $beneficiarie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiaries  $beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   //dd($request->all());
         $beneficiarie = Beneficiaries::find($id);
         $beneficiarie->update($request->all());
         \Session::flash("msg", "s:تم تعديل مستفيد ($beneficiarie->name) بنجاح");
         return redirect()->route('beneficiaries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiaries  $beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
       $beneficiarie = Beneficiaries::find($id);
       $beneficiarie->delete();
       \Session::flash("msg", "w:تم حذف مستفيد ($beneficiarie->name) بنجاح");
       return redirect()->route('beneficiaries.index');

    }
}
