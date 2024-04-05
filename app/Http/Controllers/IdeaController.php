<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{


    //storing ideas to the DB and displaying them to the dashboard page
    public function store(){


        //validation of an idea textarea
        // request()->validate([
        //     'content'=> 'required|min:5|max:240'
        // ]);

        // $ideas =Idea::create([

        //     'content' =>request()->get('content', '')
        // ]);




        //OR

        $validated = request()->validate([
            'content'=> 'required|min:5|max:240'
             ]);

             Idea::create($validated);




        //redirect user to the dashboard page after sharing an idea
        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }

    public function show(Idea $idea){


        return view('idea.show', compact('idea'));

    }

    public function edit(Idea $idea){

          $editing = true;

        return view('idea.show', compact('idea', 'editing'));

    }

    public function update(Idea $idea){

        //validation of an idea textarea
    //     request()->validate([
    //         'content'=> 'required|min:5|max:240'
    //     ]);

    //   $idea->content = request('content',  '');
    //   $idea->save();


    //OR
    $validated = request()->validate([
        'content'=> 'required|min:5|max:240'
         ]);

         $idea->update($validated);

      return redirect()->route('idea.show', $idea->id)->with('success', 'Idea updated  successfully');

  }

    public function destroy(Idea $idea){

        $idea->delete();


        return redirect()->route('dashboard')->with('success', 'Idea deleted  successfully');

    }
}
