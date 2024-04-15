<?php

namespace App\Livewire;

use Livewire\Component;

class CreateNote extends Component
{
    public $todos = [];
    public $id;
    public $todoName = '';
    public $description = '';

    public function add()
    {
        $newTodo = [
            "name" => $this->todoName,
            "description" => $this->description,
        ];
        $this->todos[] = $newTodo;

        $this->todoName = '';
        $this->description = '';
    }
    public function see()
    {
        dd($this->todos);
    }

    public function render()
    {
        return view('livewire.note.create-note');
    }
}
