<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|unique:articles|max:50',
            'content' => 'required|max:250'
        ]);

        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;

        $comment = Comment::create($data );

        return redirect()->route('articles.show', $comment->article->id);
    }
}
