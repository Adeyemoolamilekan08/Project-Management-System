<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{


    use HasFactory;

     // protected $guarded = [];

     protected $fillable = [
        'title',
        'description',
        'priority',
        'project_id',
        'admin_id' 
    ];

    protected $hidden = [
        'password',
    ];

public function projects()
{
    return $this->hasMany(Project::class, 'admin_id');
}

public function tasks()
{
    return $this->hasMany(Task::class);
}


}
