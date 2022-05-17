<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TesAptiDisc extends Model
{
    protected $table = "berkas_apti_disc";
    protected $fillable = [	'id_apti_disc',
							'id_user',
							'tipe_tes',
							'nama_file',
							'size_file',
							'type_file',
							'created_at',
							'updated_at' ];

    public $timestamps = true;
    protected $primarykey = 'id_apti_disc';
}
