<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    //
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    
        $user = Auth::user(); // Get the authenticated user
        $noteData = $request->all();
        $noteData['user_id'] = $user->id; // Associate the authenticated user with the note
    
        Note::create($noteData);
    
        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
     }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
{
    $note = Note::findOrFail($id);
    $note->completed = !$note->completed; // Toggle the status
    $note->save();

    return redirect()->route('notes.index')->with('success', 'Status updated successfully.');
}

}
