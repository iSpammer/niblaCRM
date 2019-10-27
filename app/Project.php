<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'project_agent');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
