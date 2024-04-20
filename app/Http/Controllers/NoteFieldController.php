<?php

namespace App\Http\Controllers;

use App\Models\NoteField;
use Illuminate\Http\Request;

class NoteFieldController extends Controller
{
    public static function create($id, array $data)
    {
        $noteField = new NoteField($data);
        $noteField->note_id = $id;
        $noteField->name = $data['name'];
        $noteField->value = $data['value'];
        $noteField->save();
    }
}
