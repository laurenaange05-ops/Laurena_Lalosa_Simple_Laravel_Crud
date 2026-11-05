<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    // Display all visitors
    public function index()
    {
        $visitors = Visitor::all();

        return view('visitors', compact('visitors'));
    }

    // Show create form
    public function create()
    {
        return view('create');
    }

    // Insert visitor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        Visitor::create($validated);

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor added successfully!');
    }

    // Show visitor details
    public function show(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('show', compact('visitor'));
    }

    // Show edit form
    public function edit(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('edit', compact('visitor'));
    }

    // Update visitor
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $visitor = Visitor::findOrFail($id);
        $visitor->update($validated);

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor updated successfully!');
    }

    // Delete visitor
    public function destroy(string $id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor deleted successfully!');
    }
}
