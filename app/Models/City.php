<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'tbl_cities';
    protected $fillable=['name','state_id'];
}