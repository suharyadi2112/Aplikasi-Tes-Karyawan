<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berkas extends Model
{
    protected $table 	= "berkas";
   	protected $fillable = [	'id_file',
							'id_user',
							'jenis',
							'nama_file',
							'type_file',
							'size_file',
							'keterangan',
							'created_at',
							'updated_at'
							];
							

    public $timestamps = true;
    protected $primarykey = 'id_file';
}
