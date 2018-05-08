<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Forum;

class CommentController extends Controller
{
    public function buatKomentar(Request $request, Forum $forum)
    {
    	$this->validate($request, [
    			'isi_komentar' => 'required'
    	]);
    	$comment = New Comment;
    	$comment->isi_komentar = $request->isi_komentar;
    	$comment->user_id = auth()->user()->id;

    	$forum->comments()->save($comment);

    	return redirect()->route('forum.show', $forum->slug)->withMessage('Komentar berhasil ditambahkan');
    }
}
