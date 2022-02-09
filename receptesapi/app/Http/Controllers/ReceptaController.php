<?php

namespace App\Http\Controllers;

use App\Models\Recepta;
use App\Http\Requests\StoreReceptaRequest;
use App\Http\Requests\UpdateReceptaRequest;
use Illuminate\Support\Facades\DB;

class ReceptaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(String $lang)
    {
        $recepta = DB::table('receptas')
                    ->select('title','ingredients','pasos','imatge')
                    ->where('lang',$lang)
                    ->get();

        return $recepta;
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
     * @param  \App\Http\Requests\StoreReceptaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReceptaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recepta  $recepta
     * @return \Illuminate\Http\Response
     */
    public function show(Recepta $recepta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recepta  $recepta
     * @return \Illuminate\Http\Response
     */
    public function edit(Recepta $recepta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReceptaRequest  $request
     * @param  \App\Models\Recepta  $recepta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReceptaRequest $request, Recepta $recepta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recepta  $recepta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recepta $recepta)
    {
        //
    }
}
