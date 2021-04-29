<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function create(Request $request) {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->establishment_id = $request->establishment_id;
        $comment->note = $request->note;
        $comment->save();
        return redirect("/place/$request->establishment_id");
    }

    public function delete(Request $request) {
        $comment = Comment::find($request->id);
        $establishment_id = $comment->establishment_id;
        $comment->delete();
        return redirect("/place/$establishment_id");
    }

}
