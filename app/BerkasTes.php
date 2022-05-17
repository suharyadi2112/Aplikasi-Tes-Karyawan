<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BerkasTes extends Model
{
    protected $table 	= "berkas_tes";
   	protected $fillable = [	'id_berkastes',
   							'id_tambahankat',
							'id_user',
							'nama_filetes',
							'type_filetes',
							'size_filetes',
							'created_at',
							'updated_at',

							];
							

    public $timestamps = true;
    protected $primarykey = 'id_berkastes';
}
