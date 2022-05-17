<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    protected $table = "level";
    public $timestamps = false;
    protected $primarykey = 'id_level';
    protected $fillable = (array('id_level', 'nama_level'));

}