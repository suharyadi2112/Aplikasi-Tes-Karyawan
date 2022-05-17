<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPekerjaanLamaran extends Model
{
    protected $table 	= "data_pekerjaanyangdilamar";
   	protected $fillable = [	'id_pekerjaanyangdilamar',
							'id_user',
							'posisi',
							'tingkat',
							'penghasilan',
							'alasan_melamar',
							'tanggung_jawab',
							'created_at',
							'updated_at'
							];
							

    public $timestamps = true;
    protected $primarykey = 'id_pekerjaanyangdilamar';
}
