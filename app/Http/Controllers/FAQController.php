<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    // Display a listing of the FAQs.
    public function index()
    {
        $faqs = FAQ::all();
        return view('faqs.index', compact('faqs'));
    }

    // Show the form for creating a new FAQ.
    public function create()
    {
        return view('faqs.create');
    }

    // Store a newly created FAQ in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
        ]);

        FAQ::create($validated);

        return redirect()->route('faqs.index')->with('success', 'FAQ added successfully');
    }

    // Show the form for editing the specified FAQ.
    public function edit(FAQ $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    // Update the specified FAQ in storage.
    public function update(Request $request, FAQ $faq)
    {
        $validated = $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
        ]);

        $faq->update($validated);

        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully');
    }

    // Remove the specified FAQ from storage.
    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully');
    }
}
