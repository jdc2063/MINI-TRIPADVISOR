<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establishment;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class EstablishmentController extends Controller
{
    public function home() {
        $establishment_null = Establishment::wherenull('note')->get();
        
        $establishment = Establishment::all()->sortByDesc('note')->whereNotNull('note');
        foreach ($establishment as $establishment) {
            $establishment_null = $establishment_null->concat([$establishment]);
        }
        return view('home')->withEstablishments($establishment_null->unique());
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
        $comment = Comment::where('establishment_id', 'like', $id)->Orderby('created_at', 'desc')->get();
    
        return view('/place')->withEstablishments($place)
        ->withComments($comment)
        ->withUsers($user)
        ->withAuth($auth);
        
    }

    public function delete($id) {
        $place = Establishment::find($id);
        $place->delete();
        return redirect('/');
    }

    public function page_change($id) {
        $place = Establishment::find($id);
        return view('modify_esta')->withPlaces($place);
    }

    public function update(Request $request)  {
        $establishment = Establishment::updateEstablishment($request);
        $establishment->save();
        return redirect('/');
    }
}
