<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        $antrian = Antrian::with('pasien', 'dokter')->get();
        return view('antrian', compact('antrian'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Antrian $antrian)
    {
        //
    }

    public function edit(Antrian $antrian)
    {
        //
    }

    public function update(Request $request, Antrian $antrian)
    {
        //
    }

    public function destroy(Antrian $antrian)
    {
        //
    }
}
