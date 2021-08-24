<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use App\Http\Requests\BasketRequest;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //dd(22);
        $baskets = Basket::all();
        return view('basket.index')
        ->with('baskets' , $baskets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('basket.create',[
            'basket' => new basket()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BasketRequest $request)
    {   
       // dd($request->all());
       // $file = $request->file('file'); // UplodedFile Obje
         if ($request->hasFile('file')) {
         // $file = $request->file('file'); // UplodedFile Object
         $fileName = time().'.'.$request->file->extension();
         $request->file->move(public_path('uploads'), $fileName);
         }
        $basket = Basket::create([
            'file' => $fileName ?? "",
            'name' => $request->post('name'),
            'price' => $request->post('price'),
            'quantity' => $request->post('quantity'),
            'o_qty' => $request->post('quantity'),
            'source' => $request->post('source'),
            'status' => $request->post('status', 'active'), 
        ]);
        \Session::flash("msg", "s:تم إضافة السلة ($basket->name) بنجاح");
        return redirect()->route('basket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(Basket $basket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $basket = Basket::findOrFail($id);
         return view('basket.edit',[
          'basket'=> $basket
         ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(BasketRequest $request, $id)
    {

       $basket = Basket::find($id);
           if ($request->hasFile('file')) {
           $fileName = time().'.'.$request->file->extension();
           $request->file->move(public_path('uploads'), $fileName);
           }

           // $ss = Basket::find($id);
            //dd($ss->file);
           $basket->update([
           'file' => $fileName ?? "$basket->file",
           'name' => $request->post('name'),
           'price' => $request->post('price'),
           'quantity' => $request->post('quantity'),
           'source' => $request->post('source'),
           'status' => $request->post('status', 'active'),
            ]);
        \Session::flash("msg", "s:تم تعديل السلة ($basket->name) بنجاح");
        return redirect()->route('basket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $basket = Basket::findOrFail($id);
       $basket->delete();
      // \Storage::disk('uploads')->delete($basket->file);
       \Session::flash("msg", "w:تم حذف سلة ($basket->name) بنجاح");
       return redirect()->route('basket.index');
    }
}
