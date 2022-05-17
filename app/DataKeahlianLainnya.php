<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeahlianLainnya extends Model
{
    protected $table 	= "datakeahlianlainnya";
   	protected $fillable = [	'id_keahlianlainnya',
							'id_user',
							'jenis_keahlian',
							'keahlian_lainnya',
							'created_at',
							'updated_at' ];
							

    public $timestamps = true;
    protected $primarykey = 'id_keahlianlainnya';
}
