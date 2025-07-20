<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Issue;
use Illuminate\Http\Request;
use App\Mail\CommentAddedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    //
    public function store(Request $request, Issue $issue)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = $issue->comments()->create([
            'user_id' =>Auth()->id(),
            'comment' => $request->comment,
            'visibility' => $request->visibility, // or 'private' based on your logic
        ]);


        // Send email to issue creator
        if ($issue->reporter && $issue->reporter->email) {
            Mail::to($issue->reporter->email)->send(new CommentAddedMail($comment, $issue->reporter));
        }
         // Send email to comment creator
        $commenter = auth()->user();
        if ($commenter && $commenter->email) {
            Mail::to($commenter->email)->send(new CommentAddedMail($comment, $commenter));
        }

        return redirect()->route('issue.show', $issue->id)->with('success', 'Comment added.');
    }
}
