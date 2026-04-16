<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cours extends Model
{
    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class);
    }
}
