<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'notes';

    protected $hiddden = [
        'id'
    ];

    protected $fillable = [
        'title',
        'description'
    ];

    public function notefields()
    {
        return $this->hasMany(related: NoteField::class);
    }
}
