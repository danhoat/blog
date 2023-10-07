<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;
use Response;

class CommentController extends Controller
{

    /**
     * Ajax:savecomment
     * **/
    public function store(Request $request){
        if( ! auth()->user() ){
            $res = array('success' => false,'msg' => "Denied.");
            return Response::json($res);
        }
        $attribues = $request->validate([
            'post_id'   => 'required',
            'user_id'   => 'required',
            'body'      => 'required',
        ]);

        $comment = Comment::create($attribues);
        return Response::json($comment);
    }
}
