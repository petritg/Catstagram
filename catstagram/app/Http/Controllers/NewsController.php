<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('admin')->except(['index', 'show']);
    }


     // Display a listing of the resource
     public function index()
     {
         $news = News::all();
         return view('news.index', compact('news'));
     }
 
     // Show the form for creating a new resource
     public function create()
     {
         return view('news.create');
     }
 
     // Store a newly created resource in storage
     public function store(Request $request)
     {
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'content' => 'required|string',
             'cover_image' => 'nullable|image|max:2048',
             'publish_date' => 'required|date',
         ]);
 
         if ($request->hasFile('cover_image')) {
             $imagePath = $request->file('cover_image')->store('cover_images', 'public');
             $validated['cover_image'] = $imagePath;
         }
 
         News::create($validated);
 
         return redirect()->route('news.index')->with('success', 'News created successfully.');
     }
 
     // Display the specified resource
     public function show(News $news)
     {
         return view('news.show', compact('news'));
     }
 
     // Show the form for editing the specified resource
     public function edit(News $news)
     {
         return view('news.edit', compact('news'));
     }
 
     // Update the specified resource in storage
     public function update(Request $request, News $news)
     {
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'content' => 'required|string',
             'cover_image' => 'nullable|image|max:2048',
             'publish_date' => 'required|date',
         ]);
 
         if ($request->hasFile('cover_image')) {
             $imagePath = $request->file('cover_image')->store('cover_images', 'public');
             $validated['cover_image'] = $imagePath;
         }
 
         $news->update($validated);
 
         return redirect()->route('news.index')->with('success', 'News updated successfully.');
     }
 
     // Remove the specified resource from storage
     public function destroy(News $news)
     {
         $news->delete();
         return redirect()->route('news.index')->with('success', 'News deleted successfully.');
     }
}
