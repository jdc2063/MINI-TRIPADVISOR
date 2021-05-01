<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Establishment;
use App\Models\Comment;
use App\Models\User;

class EstablishmentController extends Controller
{
    // Affiche la page principale
    public function home() {
        $establishment_null = Establishment::wherenull('note')->get();       
        
        $establishment = Establishment::all()->sortByDesc('note')->whereNotNull('note');
        foreach ($establishment as $establishment) {
            $establishment_null = $establishment_null->concat([$establishment]);
        }
        if ($establishment_null->isEmpty() == "true") {
            return view('home_void');
        }
        return view('home')->withEstablishments($establishment_null->unique());
    }
    
    // Affiche la page pour créer un établissement
    public function new() {
        return view('add');
    }

    // Créer un établissement
    public function create(Request $request)  {
        // Appelle une fonction du model Establishment
        $establishment = Establishment::createDTOtoOBJECT($request);
        $establishment->save();
        return redirect('/');
    }

    // Affiche la page d'un établissement
    public function show($id) {
        // Vérifie si une personne est authentifié
        $auth = Auth::user();
        if ($auth) {
            $auth = $auth->id;
        } else {
            $auth = 0;
        }
        $user = User::all();
        $place = new Establishment;
        $place = $place->find($id);
        $comment = new Comment;
        $comment = Comment::where('establishment_id', 'like', $id)
        ->Orderby('created_at', 'desc')->get();    
        return view('/place')->withEstablishments($place)
        ->withComments($comment)
        ->withUsers($user)
        ->withAuth($auth);
    }

    // Supprime un établissement
    public function delete($id) {
        $place = Establishment::find($id);
        $place->delete();
        return redirect('/');
    }

    // Affiche la page de modification d'établissement
    public function page_change($id) {
        $place = Establishment::find($id);
        return view('modify_esta')->withPlaces($place);
    }

    // Modifie l'établissement
    public function update(Request $request)  {
        $establishment = Establishment::updateEstablishment($request);
        $establishment->save();
        return redirect('/');
    }
}
