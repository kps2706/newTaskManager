<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request, Issue $issue)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $issue->comments()->create([
            'user_id' =>Auth()->id(),
            'comment' => $request->comment,
            'visibility' => $request->visibility, // or 'private' based on your logic
        ]);

        return redirect()->route('issue.show', $issue->id)->with('success', 'Comment added.');
    }
}
