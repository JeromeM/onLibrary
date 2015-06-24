<?php

namespace onLibrary\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public function author()
    {
        return $this->belongsTo('onLibrary\Models\Authors');
    }


}
