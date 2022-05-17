<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPengalamanOrganisasi extends Model
{
   	protected $table 	= "pengalaman_organisasi";
   	protected $fillable = [	'id_pengalamanorganisasi',
   							'id_user',
							'nama_organisasi',
							'posisi_organisasi',
							'deskripsitugasorganisasi',
							'mulaiorganisasi',
							'selesaiorganisasi',
							'kotaorganisasi',
							'created_at',
							'updated_at'
							];
							

    public $timestamps = true;
    protected $primarykey = 'id_pengalamanorganisasi';
}
