<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPendNonFormal extends Model
{
   	protected $table 	= "datapendnonformal";
   	protected $fillable = [	'id_pen_nonformal',
							'id_user',
							'jenis_pelatihan',
							'nama_penyelenggara',
							'kota',
							'nf_mulai',
							'nf_selesai',
							'created_at',
							'updated_at'];
							

    public $timestamps = true;
    protected $primarykey = 'id_pen_nonformal';
}
