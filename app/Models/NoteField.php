<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class NoteField extends Model
{
    use HasFactory;
    protected $fillable = [
        'note_id',
        'name',
        'value'
    ];
    protected $hidden = [
        'id',
    ];
}
