<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPendidikan extends Model
{
   	protected $table 	= "datapendidikan";
   	protected $fillable = [	'id_pendidikan',
							'id_user',
							'smp_namasekolah',
							'sma_namasekolah',
							'sma_jurusan',
							'smp_tahunmulai',
							'smp_tahunselesai',
							'sma_tahunmulai',
							'sma_tahunselesai',
							'created_at',
							'updated_at'
							];
							

    public $timestamps = true;
    protected $primarykey = 'id_pendidikan';
}
