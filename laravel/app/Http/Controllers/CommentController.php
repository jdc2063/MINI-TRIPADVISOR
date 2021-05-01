<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Comment;
use App\Models\Establishment;

class CommentController extends Controller
{
    // Créer un nouveau commentaire
    public function create(Request $request) {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $id_place = $request->establishment_id;
        $comment->establishment_id = $id_place;
        $comment->note = $request->note;
        $comment->author = $request->author;
        $comment->save();
        Comment::new_note($id_place);
        return redirect("/place/$id_place");
    }

    // Supprimer un commentaire
    public function delete($id) {
        $comment = Comment::find($id);
        $id_place = $comment->establishment_id;
        $comment->delete();
        Comment::new_note($id_place);
        return redirect("/place/$id_place");
    }
    
    // Transition vers la page de modification de commentaire
    public function page_change($id) {
        $comment = Comment::find($id);
        $place = Establishment::find($comment->establishment_id);
        return view("modify_comment")->withComments($comment)->withEstablishments($place);
    }

    // Modification de commentaire
    public function update(Request $request) {
        $comment = Comment::find($request->id);
        $comment->comment = $request->comment;
        $comment->note = $request->note;
        $comment->save();
        $id_place = Establishment::find($comment->establishment_id);
        $id_place = $id_place->id;
        Comment::new_note($id_place);
        return redirect("/place/$id_place");
    }

    public function pub() {
        return view('/pub');
    }
}
