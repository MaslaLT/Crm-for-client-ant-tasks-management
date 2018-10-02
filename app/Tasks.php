<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    public function status()
    {
        return $this->hasOne('App\Status', 'id', 'status_id');
    }

    public function project()
    {
        return $this->hasOne('App\Projects', 'id', 'project_id');
    }
}
