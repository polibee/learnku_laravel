<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CommentsController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    
    

    public function store(Status $status, Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:140'
        ]);

        $comment = $status->comments()->create([
            'content' => $validated['content'],
            'user_id' => auth()->id()
        ]);

        return back()->with('success', '评论发表成功！');
    }

    public function destroy(Status $status, Comment $comment)
    {
        $this->authorize('destroy', $comment);
        $comment->delete();
        return back()->with('success', '评论已删除！');
    }
}