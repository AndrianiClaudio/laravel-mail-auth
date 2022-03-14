<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'url',
        'screen',
        // 'technologies',
    ];

    public function technologies() {
        return $this->belongsToMany("App\Technology");
    }
}
