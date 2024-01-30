<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = [
        'user_id',
        'new_user_id',
        'DateAdmission',
        'status_id',
    ];

    public function StatusRelation()
    {
        return $this->hasOne('App\Models\Subdomain', 'id', 'status_id');
    }

    public function ownerRelation()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function newOwnerRelation()
    {
        return $this->hasOne('App\Models\User', 'id', 'new_user_id');
    }
}
