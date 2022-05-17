<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
   	protected $table = "datakesehatan";
    protected $fillable = [	'id_kesehatan', 'id_user', 'nama_penyakit','penyakit_lainnya'];

    public $timestamps = true;
    protected $primarykey = 'id_kesehatan';
}
