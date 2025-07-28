<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //retrive all nete from the db
        // $notes = NOte::where('user_id', auth()->id())->get();
        // $notes = Note::whereUserId(auth()->id())->get();
        $title = "all note";
        $notes = Note::whereUserId(auth()->id())->latest()->paginate(5);
        return view('notes.index',compact('notes','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $title = "Create Note";
    return view('notes.create', compact('title'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'title' => 'required|string|min:2|max:255|unique:notes',
        'body' => 'required|string|min:2',
    ]);

    $request->user()->notes()->create($validated);
         return redirect(route('note.index'))->with('success', 'Note created successfully!');
 }


    /**
     * Display the specified resource.
     */
    public function show(note $note)
    {
        $this->authorize('view', $note);
        $title = "Show Note";
        return view('notes.show', compact(['note','title']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(note $note)
    {
        
        $this->authorize('update', $note);
        $title = "Edit Note";
        return view('notes.edit', compact(['note', 'title']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, note $note)
    {
        
      $this->authorize('update', $note);
        $validated = $request->validate([
        'title' => ['required','string','min:2','max:255',Rule::unique('notes')->ignore($note->id)],
        'body' => 'required|string|min:2',
    ]);
        $note->update($validated);
         return redirect(route('note.index'))->with('success', 'Note updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();
        return redirect(route('note.index'))->with('success', 'Note deleted successfully!');
    }
}
