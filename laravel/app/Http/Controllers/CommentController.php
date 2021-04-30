<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Establishment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
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

    public function delete($id) {
        $comment = Comment::find($id);
        $id_place = $comment->establishment_id;
        $comment->delete();
        
        
        Comment::new_note($id_place);
        
        return redirect("/place/$id_place");
    }
    
    public function page_change($id) {
        $comment = Comment::find($id);
        $place = Establishment::find($comment->establishment_id);
        return view("modify_comment")->withComments($comment)->withEstablishments($place);
    }

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
}
