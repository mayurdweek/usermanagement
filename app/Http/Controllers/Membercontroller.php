<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Membercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return ["message"=>"list the member"];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return ["message"=>"create the member"];

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return ["message"=>"store the member"];

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return ["message"=>"display the member"];

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return ["message"=>"edit the member"];
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return ["message"=>"update the member"];
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return ["message"=>"destroy the member"];
    }
}
