<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'user_id',
        'request_id',
        'active_id',
    ];

    public function requestRelation()
    {
        return $this->hasOne('App\Models\Requests', 'id', 'request_id');
    }

    public function activeRelation()
    {
        return $this->hasOne('App\Models\Active', 'id', 'active_id');
    }
}
