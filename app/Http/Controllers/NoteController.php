<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public static function create(Request $request)
    {
        try {
            $newTodo = new Note();
            $newTodo->title = $request->title;
            $newTodo->description = $request->description;
            $newTodo->save();
            toastr()->success('Eliminado con Éxito.');
        } catch (\Throwable $th) {
            toastr()->error($th);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $todo = Note::find($request->id);
            $todo->delete();
            toastr()->success('Eliminado con Éxito.');
        } catch (\Throwable $th) {
            toastr()->error($th);
        }
        return back();
    }
}
