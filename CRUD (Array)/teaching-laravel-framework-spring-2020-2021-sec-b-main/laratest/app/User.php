<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /* protected $table = null; */
    protected $primaryKey = "user_id";

    public $timestamps = false;
    /* const CREATED_AT = null;
       const UPDATED_AT = null; 
    */
}
