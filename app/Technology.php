<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'id','name'
    ];

    public function projects() {
        return $this->belongsToMany("App\Project");
    }
}