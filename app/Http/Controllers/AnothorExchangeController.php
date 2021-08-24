<?php

namespace App\Http\Controllers;

use App\Models\AnothorExchange;
use Illuminate\Http\Request;
use App\Models\Basket;
use App\Http\Requests\AnothorRequest;

class AnothorExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $anothors = AnothorExchange::get();
        return view('anothorexchange.index',[
            'anothors' => $anothors
        ]);
    }
    public function search()
    { 
        dd(22);  
        // $anothors = AnothorExchange::get();
        // return view('anothorexchange.index',[
        //     'anothors' => $anothors
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    //dd(22);
      // $anothor = AnothorExchange::get();
       $baskets = Basket::where('status' , '=' , 'active')->pluck('name' , 'id');
       return view('anothorexchange.create',[
           'baskets'=> $baskets,
           'anothor'=> new AnothorExchange(),
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnothorRequest $request)
    {
     // dd($request->all());

      $id = request()->input('basket_id');
        
        
        $request->validate([
            'quantity' => ['int', 'min:1', function($attr, $value, $fail) {
                $id = request()->input('basket_id');
                $basket = Basket::find($id);
               // dd($basket);
                if ($value > $basket->quantity) {
                    $fail(__('الكمية المطلوبة أكبر من القيمة المخزنة'));
                }
            }],
        ]);
        $basket = Basket::find($id);
        $anothor = AnothorExchange::Create([
            'name' => $request->post('name'),
            'id_number' => $request->post('id_number'),
            'address' => $request->post('address'),
            'quantity' => $request->post('quantity'),
            'basket_id' => $request->post('basket_id'),
            'note' => $request->post('note'),
        ]);
        $basket->decrement('quantity', $request->quantity);
         \Session::flash("msg", "s:تم إضافة المستفيد ($anothor->name) بنجاح");
         return redirect()->route('anothor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnothorExchange  $anothorExchange
     * @return \Illuminate\Http\Response
     */
    public function show(AnothorExchange $anothorExchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnothorExchange  $anothorExchange
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $baskets = Basket::where('status' , '=' , 'active')->pluck('name' , 'id');
          $anothor = AnothorExchange::findOrFail($id);
          return view('anothorexchange.edit',[
          'anothor'=> $anothor,
          'baskets'=> $baskets,
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnothorExchange  $anothorExchange
     * @return \Illuminate\Http\Response
     */
    public function update(AnothorRequest $request, $id)
    {
        $id = request()->input('basket_id');
        
        $request->validate([
            'quantity' => ['int', 'min:1', function($attr, $value, $fail) {
                $id = request()->input('basket_id');
                $basket = Basket::find($id);
                if ($value > $basket->quantity) {
                    $fail(__('الكمية المطلوبة أكبر من القيمة المخزنة'));
                }
            }],
        ]);
        $basket = AnothorExchange::findOrFail($id);
        $anothor-update([ 
            'name' => $request->post('name'),
            'id_number' => $request->post('id_number'),
            'address' => $request->post('address'),
            'quantity' => $request->post('quantity'),
            'basket_id' => $request->post('basket_id'),
            'note' => $request->post('note'),
        ]);
        $basket->decrement('quantity', $request->quantity);
        \Session::flash("msg", "s:تم تعديل المستفيد ($anothor->name) بنجاح");
        return redirect()->route('anothor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnothorExchange  $anothorExchange
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   //dd(20);
         $anothor = AnothorExchange::findOrFail($id);
         $anothor->delete();
        \Session::flash("msg", "w:تم المستفيد المستفيد ($anothor->name) بنجاح");
        return redirect()->route('anothor.index');
    }
}
