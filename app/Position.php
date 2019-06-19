<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = "position";
    protected $fillable = array('name','department_id');
    public $timestamps = false;
}
