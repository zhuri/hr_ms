<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    protected $table = "reporttype";

    protected $fillable = array('name');

    public $timestamps = false;
}
