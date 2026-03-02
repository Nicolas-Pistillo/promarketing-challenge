<?php

namespace App\Traits;

use App\Models\Note;

trait Noteable
{
    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable');
    }
}