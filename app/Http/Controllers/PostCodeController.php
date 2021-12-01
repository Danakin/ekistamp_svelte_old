<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostCodeRequest;
use App\Http\Requests\UpdatePostCodeRequest;
use App\Models\PostCode;

class PostCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCode  $postCode
     * @return \Illuminate\Http\Response
     */
    public function show(PostCode $postCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostCodeRequest  $request
     * @param  \App\Models\PostCode  $postCode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCodeRequest $request, PostCode $postCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCode  $postCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCode $postCode)
    {
        //
    }
}
