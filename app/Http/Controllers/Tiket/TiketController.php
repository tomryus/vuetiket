<?php

namespace App\Http\Controllers\Tiket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Model\Tiket\Tiket;
use \App\Http\Resources\Tiket\TiketResource;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiketshow = Tiket::all();
        return TiketResource::collection($tiketshow);
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
        $tiketsave = tiket::create($request->all());
        return response(new TiketResource($tiketsave));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(tiket $tiket)
    {
        return new TiketResource($tiket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiket $tiket)
    {
        $tiket->UPDATE($request->all());
        return response(new TiketResource($tiket));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( tiket $tiket)
    {
        $tiket->delete();
        return response('deleted');
    }
}
