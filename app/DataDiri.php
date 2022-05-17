<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{	
	protected $table = "datadiri";
    protected $fillable = [	'id_data_diri',
    						'id_user',
							'nama_lengkap',
							'nama_mandarin',
							'no_ktp',
							'masa_berlaku_ktp',
							'no_npwp',
							'kartu_keluarga',
							'paspor',
							'sim_a',
							'sim_b',
							'sim_c',
							'bpjs_kesehatan',
							'bpjs_tenagakerja',
							'bpjs_jaminanpensiun',
							'tempatlahir_provinsi',
							'tempatlahir_kota',
							'tanggal_lahir',
							'golongan_darah',
							'alamat_sekarang',
							'nomor_telepon',
							'nomor_telepon2',
							'kepemilikan_tempat_tinggal',
							'nomor_wa',
							'email',
							'nomor_rekening',
							'agama',
							'tinggi_badan',
							'berat_badan',
							'jenis_kelamin',
							'status_marital',
							'jumlah_anak',
							'anak_ke',
							'jumlah_saudara',
							'nama_pasangan',
							'pekerjaan_pasangan',
							'nomor_telepon_pasangan',
							'nama_ayah',
							'nama_ibu',
							'pekerjaan_ayah',
							'pekerjaan_ibu',
							'nomor_telepon_ayah',
							'nomor_telepon_ibu',
							'hobi',
							'status_cpns',
							'status_merokok',
							'minat_olahraga',
							'status_beasiswa',
							'kesediaan_lama_bekerja',
							'nama_nodarurat',
							'nama_nodarurat2',
							'hubungan_nodarurat',
							'hubungan_nodarurat2',
							'nomor_darurat',
							'nomor_darurat2',
							'kota_nodarurat',
							'kota_nodarurat2',
							'nama_wali',
							'alamat_wali',
							'nomor_wali',
							'status',
							'status_finish',

							'created_at',
							'updated_at'];

    public $timestamps = true;
    protected $primarykey = 'id_data_diri';
}
