<?php

namespace App\Http\Controllers;

use App\Models\AnothorExchange;
use Illuminate\Http\Request;

class AnothorExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anothorexchange.index');
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
        //
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
    public function edit(AnothorExchange $anothorExchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnothorExchange  $anothorExchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnothorExchange $anothorExchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnothorExchange  $anothorExchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnothorExchange $anothorExchange)
    {
        //
    }
}
