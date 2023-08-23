<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'deadline', 'completed'];

    protected $dates = ['created_at', 'deadline'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}

