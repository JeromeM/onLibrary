<?php

namespace onLibrary\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{

    public static function allSorted()
    {
        return self::all()->sortBy('lastname');
    }

}
