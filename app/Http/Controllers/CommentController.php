<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea){






            $comment = new Comment();

            //creating relationships using id's
            $comment->idea_id = $idea->id;

            // get a commnent from input field and save it to the database
            $comment->Comment = request()->get('comment');
            $comment->save();

            return redirect()->route('idea.show', $idea->id)->with('success', 'comment created sucessfully');






        //redirect user to the dashboard page after sharing a comment
        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }

}
