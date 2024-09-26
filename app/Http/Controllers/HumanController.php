<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $humans = Human::ownedByUser(Auth::id())->with('user')->latest()->get();
        return view('humans.index', compact('humans'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('humans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        $request->validate([
            'name' => 'nullable|max:255',
            'age' => 'nullable|max:255',
            'job' => 'nullable|max:255',
            'income' => 'nullable|max:255',
            'meet' => 'nullable|max:255', 
            'cost' => 'nullable|max:255', 
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
          ]);
    
          $data = $request->only('name', 'age', 'job', 'income', 'meet', 'cost');

          if ($request->hasFile('img')) {
              $imageName = time().'.'.$request->img->extension();
              $request->img->move(public_path('images'), $imageName);
              $data['img'] = 'images/' . $imageName;
          }
          $request->user()->humans()->create($data);

      
          return redirect()->route('humans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Human $human)
    {
        $human->load('comments');
        return view('humans.show', compact('human'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Human $human)
    {
        return view('humans.edit', compact('human'));  //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Human $human)
    {
        $request->validate([
            'name' => 'nullable|max:255',
            'age' => 'nullable|max:255',
            'job' => 'nullable|max:255',
            'income' => 'nullable|max:255',
            'meet' => 'nullable|max:255', 
            'cost' => 'nullable|max:255', 
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',   // 任意のフィールドの場合
          ]);
          $data = $request->only('name', 'age', 'job', 'income', 'meet', 'cost');

          if ($request->hasFile('img')) {
              // 古い画像を削除
              if ($human->img) {
                  $oldImagePath = public_path($human->img);
                  if (file_exists($oldImagePath)) {
                      unlink($oldImagePath);
                  }
              }
      
              // 新しい画像をアップロード
              $imageName = time().'.'.$request->img->extension();
              $request->img->move(public_path('images'), $imageName);
              $data['img'] = 'images/' . $imageName;
          }
      
          $human->update($data);
      
          return redirect()->route('humans.show', $human); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Human $human)
    {
        $human->delete();
        return redirect()->route('humans.index')->with('success', 'お見切りにしました！'); //
    }


    public function trashed()
{
    $trashedHumans = Human::ownedByUser(Auth::id())->onlyTrashed()->get();
    return view('humans.trashed', compact('trashedHumans'));
}


public function restore($id)
{
    $human = Human::onlyTrashed()->findOrFail($id);
    $human->restore();
    return redirect()->route('humans.trashed')->with('success', '人間が復元されました。');
}



}
