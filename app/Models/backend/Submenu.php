<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $table = 'cms_menu_children';

    public function menu()
    {
        return $this->belongsTo('App\Models\backend\Menu', 'menu_id');
    }
}
