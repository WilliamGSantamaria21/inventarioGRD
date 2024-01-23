<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDomain extends Model
{
    use HasFactory;

    protected $table = 'subdomains';

    protected $fillable = [

        'id_domain',
        'description'
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class, 'id_domain', 'id');
    }
}
