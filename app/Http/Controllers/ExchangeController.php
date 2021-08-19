<?php

namespace App\Http\Controllers;
use App\Models\Beneficiaries;

use App\Models\Exchange;
use Illuminate\Http\Request;
use App\Models\Basket;
use App\Http\Requests\ExchangeRequest;
use Illuminate\Support\Facades\DB;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $exchanges = Exchange::all();
        return view('exchange.index')
        ->withExchanges($exchanges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $baskets = Basket::where('status' , '=' , 'active')->pluck('name' , 'id');
        $beneficiaries = Beneficiaries::pluck('name' , 'id');
        //dd($beneficiaries);
        return view('exchange.create',[
          'baskets'=> $baskets,
          'exchange'=> new exchange(),
          'beneficiaries'=> $beneficiaries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExchangeRequest $request)
    {  //dd($request->all()); 
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
        $basket = Basket::find($id);
        $exchange = Exchange::updateOrCreate([
            'beneficiarie_id' => $request->post('beneficiarie_id'),
            'quantity' => $request->post('quantity'),
            'note' => $request->post('note'),
            'basket_id' => $request->post('basket_id'),
        ]);
        $basket->decrement('quantity', $request->quantity);
        \Session::flash("msg", "s:تم إضافة مستفيد بنجاح");
        return redirect()->route('exchange.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function show(Exchange $exchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    //dd($id);
        $baskets = Basket::where('status' , '=' , 'active')->pluck('name' , 'id');
        $exchange = Exchange::findOrFail($id);
        $beneficiaries = Beneficiaries::pluck('name' , 'id');
        return view('exchange.edit',[
        'exchange'=> $exchange,
        'baskets'=> $baskets,
        'beneficiaries'=> $beneficiaries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
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
        $basket = Basket::find($id);
        $exchange = Exchange::updateOrCreate([
            'beneficiarie_id' => $request->post('beneficiarie_id'),
            'quantity' => $request->post('quantity'),
            'note' => $request->post('note'),
            'basket_id' => $request->post('basket_id'),
        ]);
        $basket->decrement('quantity', $request->quantity);
        \Session::flash("msg", "s:تم إضافة مستفيد بنجاح");
        return redirect()->route('exchange.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exchange = Exchange::find($id);
        $exchange->delete();
        \Session::flash("msg", "w:تم حذف مستفيد  بنجاح");
        return redirect()->route('beneficiaries.index');
    }
}
