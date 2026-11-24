<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Application;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(CommentsRequest $request, Application $application)
    {
        $comment = New Comment();
        $comment->comment = $request->comment;
        $comment->application_id = $application->id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return back();
    }
}
