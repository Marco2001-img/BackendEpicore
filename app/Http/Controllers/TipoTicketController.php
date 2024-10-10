<?php

namespace App\Http\Controllers;

use App\Models\TipoTicket;
use Illuminate\Http\Request;

class TipoTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TipoTicket::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        $post = TipoTicket::create([
            'nombre' => $request->nombre,
        ]);

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
