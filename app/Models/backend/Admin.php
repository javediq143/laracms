<?php

namespace App\Models\backend;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Admin extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $guard = 'admin';
    protected $table = 'cms_users';

    protected $fillable = [
        'name', 'username', 'email', 'password', 'remember_token', 'last_login_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function submenus()
    {
        return $this->hasMany('App\Models\backend\Submenu', 'cms_users_menu_priviledges', 'user_id', 'submenu_id', 'id', 'id');        
        //return $this->hasMany('App\Models\backend\Submenu')->using('App\Models\backend\UserMenuPriviledge');        
    }
}
