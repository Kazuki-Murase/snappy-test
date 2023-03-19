<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    //
    public function details()
    {
        return $this->hasMany('App\Detail', 'no', 'no');
    }
}
