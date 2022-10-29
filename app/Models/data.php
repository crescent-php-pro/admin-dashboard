<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    use HasFactory;
    // Btn get and Attribute is variable name Body
    public function getTitleAttribute($value)
    {
        return ucfirst($value); //Accessor ** Set first letter to capital from databade
    }

    // public function setBodyAttribute($value)
    // {
    //     return $this->attributes['body'] = ucfirst($value); //Mutator ** Set first letter to CAPITAL in insering string to database
    // }
}
