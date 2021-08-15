<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;
use App\Models\Basket;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $repositoreis = Repository::all();
         return view('repository.index')
         ->with('repositoreis' , $repositoreis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        
        $baskets = Basket::pluck('name' , 'id');
        return view('repository.create',[
        'baskets'=> $baskets,
        'basket' => new basket(),
        'repository' => new repository()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  //dd($request->all());
        $repository = Repository::create($request->all());
        $repository->baskets()->sync($request->input('baskets', []));
        \Session::flash("msg", "s:تم إضافة المستودع ($repository->name) بنجاح");
        return redirect()->route('repository.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repository = Repository::find($id);
        //$cities = City::where('id', '=', $country->id)->get();
        $baskets= $repository->baskets;
         return view('repository.show')
         ->with('baskets' , $baskets);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function edit(Repository $repository)
    {   //dd($id);
        $baskets = Basket::pluck('name' , 'id');
        $repository->load('baskets');
         return view('repository.edit',[
         'basket' => new basket(),
        'baskets'=> $baskets,
         'repository' => $repository
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repository $repository)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repository $repository)
    {
        //
    }
}
