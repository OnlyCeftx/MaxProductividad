<?php

namespace App\Livewire\Note;

use App\Http\Controllers\NoteController;
use App\Models\Note;
use App\Models\NoteField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class CreateNote extends Component
{
    public $notes = [];
    public $notefields = [];
    public $fields = [];
    public $title = '';
    public $description = '';

    public function add()
    {
        $request = new Request();
        $request->merge([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        NoteController::create($request, $this->fields);

        $this->title = '';
        $this->description = '';
        $this->fields = [];
    }



    public function see()
    {
        $todos_test = Note::all();
        dd($todos_test);
    }

    public function new()
    {
        $this->fields[] = [
            'name' => '',
            'value' => '',
        ];
    }

    public function test()
    {
        $id = '66234de6f1385d5e420e6013';
        $test = Note::find($id);
        $test = $test->notefields()->where('note_id', $id)->get();
        dd($test);
    }

    public function removeField($index)
    {
        unset($this->fields[$index]);
        $this->fields = array_values($this->fields);
    }

    public function render()
    {
        $notes = $this->notes = Note::where('user_id', Auth::user()->id)->get();
        $notefields = [];
        foreach ($notes as $note) {
            $notefields = $this->notefields = array_merge($notefields, $note->notefields()->get()->all());
        }
        return view('livewire.note.create-note', compact('notes', 'notefields'));
    }
}
