<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'amount', 'currency', 'country'];

    public function prerequisites()
    {
        return $this->belongsToMany(Task::class, 'task_dependencies', 'task_id', 'prerequisite_id');
    }

    public function dependents()
    {
        return $this->belongsToMany(Task::class, 'task_dependencies', 'prerequisite_id', 'task_id');
    }
}
