<?php

namespace App\Http\Controllers;

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
        $baskets = Basket::pluck('name' , 'id');
        return view('exchange.create',[
          'baskets'=> $baskets
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExchangeRequest $request)
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
            'name' => $request->post('name'),
            'quantity' => $request->post('quantity'),
            'note' => $request->post('note'),
            'basket_id' => $request->post('basket_id'),
        ]);
        $basket->decrement('quantity', $request->quantity);
        \Session::flash("msg", "s:تم إضافة مستفيد ($exchange->name) بنجاح");
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
    public function edit(Exchange $exchange)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        //
    }
}
