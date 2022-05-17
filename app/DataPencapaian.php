<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPencapaian extends Model
{
    protected $table 	= "datapencapaian";
   	protected $fillable = [	'id_pencapaian',
							'id_user',
							'bidang_penghargaan',
							'bentuk_penghargaan',
							'tahun_penghargaan',
							'created_at',
							'updated_at'
							];
							

    public $timestamps = true;
    protected $primarykey = 'id_pencapaian';
}
