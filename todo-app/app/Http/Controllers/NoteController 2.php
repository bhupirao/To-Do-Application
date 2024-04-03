<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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

    // public function store(Request $request)
    // {
    //     // Associate the authenticated user with the new note
    //     $note = new Note();
    //     $note->title = $request->input('title');
    //     $note->description = $request->input('description');
    //     $note->user_id = auth()->user()->id; // Associate the authenticated user
    //     $note->save();

    //     return redirect()->route('notes.index');
    // }

    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'shareable_link' => 'nullable|unique:notes',
        // ]);
       

        // $note = Note::create($data);
        if (Auth::check()) {
                $user = Auth::user();
    
                $note = new Note();
                $note->title = $request->input('title');
                $note->description = $request->input('description');
                $note->user_id = $user->id;
                $note->shareable_link = $this->generateShareableLink();
        //         $shareable_link = $request->input('shareable_link') . '_' . $this->generateShareableLink();
        // $note->shareable_link = $shareable_link;

                $note->save();
        }
        

        return redirect()->route('notes.index');
        // if (Auth::check()) {
        //     $user = Auth::user();

        //     $note = new Note();
        //     $note->title = $request->input('title');
        //     $note->description = $request->input('description');
        //     $note->user_id = $user->id;
        //     $note->shareable_link = $this->generateShareableLink();
        //     $note->save();
            
        //     // Return the created note along with the shareable link
        //     return response()->json([
        //         'note' => $note,
        //         'shareable_link' => $note->shareable_link,
        //     ]);
        // } else {
        //     return redirect()->route('login')->with('error', 'You need to be logged in to create a note.');
        // }
       
    }
//     public function showShareableNote($shareable_link)
// {
//     $note = Note::where('shareable_link', $shareable_link)->first();

//     if ($note) {
//         // Generate a shareable link if it's not already set
//         if (!$note->shareable_link) {
//             $note->shareable_link = $this->generateShareableLink();
//             $note->save();
//         }

//         // Return the note data along with the shareable link
//         return view('notes.show', compact('note'));
//     } else {
//         return abort(404); // Note not found
//     }
// }
    private function generateShareableLink()
    {
        // Generate a random shareable link using Laravel's Str::random() method
        return Str::random(10);
    }
   

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    // public function update(Request $request, Note $note)
    // {
    //     $note->update($request->all());
    //     return redirect()->route('notes.index');
    // }
    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'shareable_link' => 'nullable|unique:notes,shareable_link,' . $note->id,
        ]);

        $note->update($data);

        return redirect()->route('notes.index');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }
    public function showShareableNote($shareable_link)
{
    $note = Note::where('shareable_link', $shareable_link)->first();

    if ($note) {
        return view('notes.show', compact('note'));
    } else {
        return abort(404); // Note not found
    }
}
   
}
