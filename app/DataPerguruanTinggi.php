<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPerguruanTinggi extends Model
{
    protected $table = "dataperguruantinggi";
    protected $fillable = [	'id_perguruantinggi',
							'id_user',
							'pt_ipk',
							'pt_jenjang',
							'pt_mulai',
							'pt_nama',
							'pt_selesai',
							'pt_studi',
							'created_at',
							'updated_at'
							];

    public $timestamps = true;
    protected $primarykey = 'id_perguruantinggi';
}
