<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'cms_menu_master';

    public function submenus()
    {
        return $this->hasMany('App\backend\Models\Submenu', 'menu_id');
    }
}
