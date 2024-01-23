<?php

namespace App\Models\Admin;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
  use HasRoles;
  
    static $rules = [
		'name' => 'required',
		'email' => 'required',
    // 'password' => 'nullable',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'email',
      'password',
      'identification_number',
      'phone_number',
      'start_date',
      'end_date',
      'two_factor_secret',
      'two_factor_recovery_codes',
      'two_factor_confirmed_at',
      'remember_token',
      'profile_photo_path',
      'current_team_id',
  ];

    
  }
