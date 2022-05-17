<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataBerbahasaAsing extends Model
{
    protected $table 	= "databerbahasaasing";
   	protected $fillable = [	'id_berbahasaasing',
							'id_user',
							'jenis_bahasa',
							'lisan_bahasa',
							'tulisan_bahasa',
							'created_at',
							'updated_at'
							];
							

    public $timestamps = true;
    protected $primarykey = 'id_berbahasaasing';
}
