<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'name'
    ];

    public function projects() {
        return $this->belongsToMany("App\Project");
    }
}