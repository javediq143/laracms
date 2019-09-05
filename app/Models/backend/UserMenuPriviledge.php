<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserMenuPriviledge extends Pivot
{
    protected $table = 'cms_users_menu_priviledges';

    public function user()
    {
        return $this->belongsToMany('App\Models\Backend\Admin', 'user_id', 'id');
    }

    public function submenus()
    {
        return $this->belongsTo('App\Models\Backend\Submenu', 'submenu_id', 'id');
    }
}
