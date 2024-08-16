<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('category')->get();
        return view('faqs.index', compact('faqs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'new_category' => 'nullable|string|max:255',
        ]);
    
        // If a new category is provided, create it and use its ID
        $categoryId = $request->category_id;
    
        if ($request->filled('new_category')) {
            $category = Category::create(['name' => $request->new_category]);
            $categoryId = $category->id;
        }
    
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'category_id' => $categoryId,
        ]);

        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully');
    }

    public function edit(Faq $faq)
    {
        $categories = Category::all();
        return view('faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $faq->update($request->all());

        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully');
    }
}
