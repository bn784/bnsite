<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'management_access',
        'user_access',
        'user_create',
        'user_edit',
        'user_view',
        'user_delete',
        'role_access',
        'role_create',
        'role_edit',
        'role_view',
        'role_delete',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
