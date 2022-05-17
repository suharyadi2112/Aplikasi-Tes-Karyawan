<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTambahanKategori extends Model
{
    protected $table = "tambahan_kategori";
    protected $fillable = [	'id_tambahan',
							'id_user',
							'detail_ptk',
							'kategori',
							'soal',
							'created_at',
							'updated_at'

							];

    public $timestamps = true;
    protected $primarykey = 'id_tambahan';
}
