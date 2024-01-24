<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Active extends Model
{

    static $rules = [
        'area_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'marca_id' => 'required',
        // 'type_id' => 'required',
        'serial' => 'required',
        'placaInt' => 'required',
        'ubication_id' => 'required',
        // 'clasification_id' => 'required',
        // 'confidentiality_id' => 'required',
        // 'integrity_id' => 'required',
        // 'disponibility_id' => 'required',
        // 'justification_id' => 'required',
        'owner_id' => 'required',
        'access_id' => 'required',
        'dateAdmission' => 'required',
        'departureDate',
        // 'status_id' => 'required',
        'actualizacion',
        'category_id' => 'required'
    ];

    protected $perPage = 21;

    protected $fillable = [
        'area_id',
        'name',
        'description',
        'marca_id',
        // 'type_id',
        'serial',
        'placaInt',
        'ubication_id',
        // 'clasification_id',
        // 'confidentiality_id',
        // 'integrity_id',
        // 'disponibility_id',
        // 'justification_id',
        'owner_id',
        'access_id',
        'dateAdmission',
        'departureDate',
        // 'status_id',
        'actualizacion',
        'state_id',
        'category_id'
    ];


    // public function typeRelation()
    // {
    //     return $this->hasOne('App\Models\Subdomain', 'id', 'type_id');
    // }

    // public function integrityRelation()
    // {
    //     return $this->hasOne('App\Models\Subdomain', 'id', 'integrity_id');
    // }

    // public function clasificationRelation()
    // {
    //     return $this->hasOne('App\Models\Subdomain', 'id', 'clasification_id');
    // }

    public function accessRelation()
    {
        return $this->hasOne('App\Models\Subdomain', 'id', 'access_id');
    }

    public function ubicationRelation()
    {
        return $this->hasOne('App\Models\Subdomain', 'id', 'ubication_id');
    }

    // public function justificationRelation()
    // {
    //     return $this->hasOne('App\Models\Subdomain', 'id', 'justification_id');
    // }

    // public function confidentialityRelation()
    // {
    //     return $this->hasOne('App\Models\Subdomain', 'id', 'confidentiality_id');
    // }

    // public function actualiRelation()
    // {
    //     return $this->hasOne('App\Models\Subdomain', 'id', 'actuali_id');
    // }

    public function statusRelation()
    {
        return $this->hasOne('App\Models\Subdomain', 'id', 'status_id');
    }

    // public function disponibilityRelation()
    // {
    //     return $this->hasOne('App\Models\Subdomain', 'id', 'disponibility_id');
    // }

    public function areaRelation()
    {
        return $this->hasOne('App\Models\Subdomain', 'id', 'area_id');
    }

    public function ownerRelation()
    {
        return $this->hasOne('App\Models\User', 'id', 'owner_id');
    }

    public function StateRelation()
    {
        return $this->hasOne('App\Models\Subdomain', 'id', 'state_id');
    }

    public function categoryRelation()
    {
        return $this->hasOne('App\Models\Subdomain', 'id', 'category_id');
    }

    public function marcaRelation()
    {
        return $this->hasOne('App\Models\Subdomain', 'id', 'marca_id');
    }
}
