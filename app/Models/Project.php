<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'deadline', 'completed'];

    // Relation One-to-Many : Un projet a plusieurs tâches
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Relation Many-to-Many : Un projet a plusieurs utilisateurs ajoutés
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    // Relation One-to-Many : Un projet appartient à un utilisateur (propriétaire)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
