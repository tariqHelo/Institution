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
        $basketss = Basket::all();
        $beneficiaries = Beneficiaries::pluck('id_number' , 'id');
        //dd($beneficiaries);
        return view('exchange.create',[
          'baskets'=> $baskets,
          'exchange'=> new exchange(),
          'beneficiaries'=> $beneficiaries,
        'basketss'=> $basketss,
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
        //dd($request->all()); 
      //  الاسم- الهوية- العنوان- الكميه - ملاحظات
        $id = request()->input('basket_id');
        $request->validate([
            'quantity' => ['int', 'min:1', function($attr, $value, $fail) {
                $id = request()->input('basket_id');
                $basket = Basket::find($id);
                //dd($ss);
                if ($value > $basket->quantity) {
                    $fail(__('الكمية المطلوبة أكبر من القيمة المخزنة'));
                }
            }],
        ]);
        $basket = Basket::find($id);
        $exchange = Exchange::create([
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
        $beneficiaries = Beneficiaries::pluck('id_number' , 'id');
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
    public function update(ExchangeRequest $request , $id)
    { 
        $ids = request()->input('basket_id');

        $request->validate([
            'quantity' => ['int', 'min:1', function($attr, $value, $fail) {
                $id = request()->input('basket_id');
                $basket = Basket::find($id);
                if ($value > $basket->quantity) {
                    $fail(__('الكمية المطلوبة أكبر من القيمة المخزنة'));
                }
            }],
        ]);
        $exchange = Exchange::find($id);
       // dd($exchange->quantity);
        if($exchange->quantity > $request->quantity){
           $ids = request()->input('basket_id');
           DB::table('baskets')->where('id', $ids)->update([
           'quantity' => DB::raw('quantity +'.($request->quantity + $exchange->quantity))
           ]);
        }elseif($exchange->quantity < $request->quantity) {
            $basket = Basket::find($ids);
            $basket->decrement('quantity', ($request->quantity - $exchange->quantity));
        }
        $exchange->update([
            'beneficiarie_id' => request()->input('beneficiarie_id'),
            'quantity' => request()->input('quantity'),
            'basket_id' => request()->input('basket_id'),
            'note' => request()->input('note'),
        ]);
        \Session::flash("msg", "s:تم تعديل المستفيد بنجاح");
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
        $id  = $exchange->basket_id;
       // dd($id);
        DB::table('baskets')->where('id', $id)->update([
        'quantity' => DB::raw('quantity +'.$exchange->quantity),
        ]);
        $exchange->delete();
        \Session::flash("msg", "w:تم حذف مستفيد  بنجاح");
        return redirect()->route('exchange.index');
    }
}
// $ids = request()->input('basket_id');
// DB::table('baskets')->where('id', $ids)->update([
// 'quantity' => DB::raw('quantity +'.$request->quantity),
// ]);
