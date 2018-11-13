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

    public function priority()
    {
        return $this->hasOne('App\Priority', 'id', 'status_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'author_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments', 'task_id', 'id')
            ->orderBy('created_at', 'desc')
            ->limit(5);
    }

}
