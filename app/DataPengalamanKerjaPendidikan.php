<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPengalamanKerjaPendidikan extends Model
{
   	protected $table 	= "pengalaman_kerja_pend";
   	protected $fillable = [	'id_pengalaman_kerja_pend',
							'id_user',
							'nama_sekolah',
							'jenis_pekerjaan',
							'jenis_pelajaran',
							'gaji',
							'pk_pend_mulai',
							'pk_pend_selesai',
							'created_at',
							'updated_at'];
							

    public $timestamps = true;
    protected $primarykey = 'id_pengalaman_kerja_pend';
}
