<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Comment;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comment";

    static function new_note($id_place) {
        $list = Comment::where('establishment_id', 'like', $id_place)->get();
        $new_note = 0;
        $number_comment = 0;
        foreach ($list as $comment) {
            # code...
            
            $new_note = $new_note + $comment->note;
            $number_comment = $number_comment + 1;
        }
        if ($number_comment == 0) {
            $new_note = NULL;
        } else { 
            $new_note = (float)($new_note/$number_comment);
        }
        $note_place = Establishment::find($id_place);
        $note_place->note = $new_note;
        $note_place->save();
        return(0);
    }
}
