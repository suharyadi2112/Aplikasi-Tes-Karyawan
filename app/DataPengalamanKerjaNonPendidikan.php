<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPengalamanKerjaNonPendidikan extends Model
{
    protected $table 	= "pengalaman_kerja_non_pend";
   	protected $fillable = [	'id_pk_nonpendidikan',
							'id_user',
							'nama_perusahaan_np',
							'Jabatan_np',
							'gaji_np',
							'deskripsi_np',
							'mulai_np',
							'selesai_np',
							'alasan_pindah',
							'created_at',
							'updated_at'
];
							

    public $timestamps = true;
    protected $primarykey = 'id_pk_nonpendidikan';
}
