<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establishment;
use Illuminate\Support\Facades\DB;
class EstablishmentController extends Controller
{
    public function home() {
        $establishment = new Establishment;
        $establishment = $establishment::all();
        return view('home')->withEstablishments($establishment);
    }
    
    public function new() {
        return view('add');
    }

    public function create(Request $request)  {
        $establishment = Establishment::createDTOtoOBJECT($request);
        $establishment->save();
        return redirect('/');
    }

    public function show($id) {
        $place = new Establishment;
        $place = $place->find($id);
        return view('place')->withEstablishments($place);
    }

    public function delete(Request $request) {
        $place = Establishment::find($request->id);
        $place->delete();
        return redirect('/');
    }
}
