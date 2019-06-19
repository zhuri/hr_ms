<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "report";

    protected $fillable = array('name', 'description', 'report_type', 'user_id');

    public $timestamps = false;
}
