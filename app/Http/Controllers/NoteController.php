<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{

    public static function create(Request $request, array $fields)
    {
        try {
            $note = new Note();
            $note->user_id = Auth::user()->id;
            $note->title = $request->title;
            $note->description = $request->description;
            $note->save();
            foreach ($fields as $field) {
                $noteField = new NoteField();
                $noteField->note_id = $note->id;
                $noteField->name = $field['name'];
                $noteField->value = $field['value'];
                $noteField->save();
            }
            toastr()->success('Guardado con Éxito.');
        } catch (\Throwable $th) {
            toastr()->error($th);
        }
    }

    public static function destroy(Request $request)
    {
        try {
            $note = Note::find($request->id);
            $note->delete();
            toastr()->success('Eliminado con Éxito.');
        } catch (\Throwable $th) {
            toastr()->error($th);
        }
        return back();
    }

    public static function update()
    {
    }
}
