<?php

namespace App\Livewire;

use App\Http\Controllers\NoteController;
use App\Models\Note;
use Illuminate\Http\Request;
use Livewire\Component;


class CreateNote extends Component
{
    public $todos = [];
    public $title = '';
    public $description = '';

    public function add()
    {
        $request = new Request();
        $request->merge([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        NoteController::create($request);

        $this->title = '';
        $this->description = '';
    }
    public function see()
    {
        $todos_test = Note::all();
        dd($todos_test);
    }

    public function render()
    {
        $todos = $this->todos = Note::all();
        return view('livewire.note.create-note', compact('todos'));
    }
}
