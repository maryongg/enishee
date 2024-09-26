<?php

namespace App\Http\Controllers;
use App\Models\Human;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
  
        public function create(Human $human)
        {
          return view('humans.comments.create', compact('human'));
        }   //
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Human $human)
    {
      $request->validate([
        'comment' => 'required|string|max:255',
      ]);
    
      $human->comments()->create([
        'comment' => $request->comment,
        'user_id' => auth()->id(),
      ]);
    
      return redirect()->route('humans.show', $human);
    }

    /**
     * Display the specified resource.
     */
    public function show(Human $human, Comment $comment)
    {
      return view('humans.comments.show', compact('human', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Human $human, Comment $comment)
    {
      return view('humans.comments.edit', compact('human', 'comment'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Human $human, Comment $comment)
    {
      $request->validate([
        'comment' => 'required|string|max:255',
      ]);
    
      $comment->update($request->only('comment'));
    
      return redirect()->route('humans.comments.show', [$human, $comment]);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Human $human, Comment $comment)
    {
      $comment->delete();
    
      return redirect()->route('humans.show', $human);
    }

}
