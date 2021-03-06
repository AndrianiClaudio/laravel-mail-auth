<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];
    public function users()
    {
        return $this->belongsTo('App\User','role_id');
    }
}
