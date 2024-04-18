<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;


class CreateNote extends Component
{
    public $title = '';
    public $description = '';

    public function add()
    {
        $newTodo = new Note();
        $newTodo->title = $this->title;
        $newTodo->description = $this->description;

        $newTodo->save();

        $this->title = '';
        $this->description = '';
    }
    public function see()
    {
        $todos = Note::all();
        dd($todos);
    }

    public function render()
    {
        $todos = Note::all();
        return view('livewire.note.create-note', compact('todos'));
    }
}
