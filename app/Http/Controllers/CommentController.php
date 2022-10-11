<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;
use Response;

class CommentController extends Controller
{

    public function store(Request $request){
        if( ! auth()->user() ){
            $res = array('success' => false,'msg' => "Denied.");
            return Response::json($res);
        }
        $attribues = $request->validate([
            'post_id' => 'required|max:255',
            'user_id' => 'required',
            'content' => 'required',
        ]);
//        $args = array(
//            'post_id' => $request->post_id,
//            'user_id' => $request->user_id,
//            'content' => $request->content
//        );
        $comment = Comment::create($attribues);
        return Response::json($comment);
    }
}
