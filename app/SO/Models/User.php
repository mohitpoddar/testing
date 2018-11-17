<?php

namespace App\SO\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\SO\Helpers\Uuids as Uuids;

class User extends Authenticatable
{
    use Notifiable;
    use Uuids;

    //Table name
    protected $table = 'users';
    // Primary key
    public $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'on_behalf_id', 'username', 'password', 'is_permission', 'activation_code', 'status', 'group', 'name', 'email', 'assign_right', 'delegate_right', 'on_behalf_right', 'lotus_solution',
    ];

    // Default Laravel connections

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
