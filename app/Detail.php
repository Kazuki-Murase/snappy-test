<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    public function header()
    {
        return $this->belongsTo('App\Header', 'no', 'no');
    }
}
