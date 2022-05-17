<!DOCTYPE html>
<html>
<head>
</head>

<body onload="window.print()" style=" margin-left:25px; margin-right: 25px;" >

	<table style="border-collapse: collapse;" width="100%" border="0">
		<tbody>
		<tr style="height: 14.5pt;">
		<td style="" class="judul1" rowspan="2">
		  <img src="{{ URL::asset('admin/dist/img/fotoformulir.png') }}" >
		</td>
		<td class="judul2" style="padding-left: 5px; "><b>SDM BPH Yayasan Pancaran Maitri</b></td>
		<td rowspan="2">
			<?php for ($i=0; $i < 22; $i++) { echo '&nbsp;';}?>
		</td>
		</tr>
		<tr style="height: 14.5pt;">
		<td class="judul1"> 
		      Kompleks Maha Vihara Duta Maitreya,
		      Bukit Beruntung, Sungai Panas, Batam 29433<br>
		      Telp. (0778) 468029,	
		      E-mail : sdmpancaranmaitri@gmail.com<br></td>
		</tr>
		</tbody>
	</table>

	<table width="100%">
		<tbody>
		<tr style="height: 28.5pt;">
		<td class="hatd" colspan="29">HASIL AKHIR TES DISC</td>
		</tr>
		</tbody>
	</table>

	<table width="40%" border="0" class="datadiri">
		<tr>
			<td style="width: 40%">Nama</td>
			<td style="width: 5%">:</td>
			<td style="text-transform: uppercase;">{{ $datadiri->nama_lengkap }} <hr></td>
		</tr>
		<tr><td><br></td></tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td style="text-transform: uppercase;">{{ $datadiri->jenis_kelamin }} <hr></td>
		</tr>
		<tr><td></td></tr>
	</table>

	@php 
	$CekData = DB::table('d_core_mask')->select('jenis_tipe','kategori')->where('id_user','=',$id)->orderBy('kategori','ASC')->get();

	//dd($CekData);
	@endphp

	@foreach($CekData as $keyout => $val)
		
	<table border="0" width="100%">
		<tr>
			<td rowspan="2"><p class="datadiri2">{{ Kelompok($val->kategori) }}</p></td>
			<td><span style="float: right">
				<table style="border-collapse: collapse; width: 46pt;">
					<tbody>
					<tr style="height: 8.15pt;">
					<td class="kotakkelas1" colspan="2" rowspan="2">TIPE</td>
					</tr>
					<tr style="height: 8.15pt;"></tr>
					<tr style="height: 8.15pt;">
					<td class="kotakkelas2" colspan="2" rowspan="4">{{ strtoupper($val->jenis_tipe) }}</td>
					</tr>
					<tr style="height: 8.15pt;"></tr>
					<tr style="height: 10.0pt;"></tr>
					<tr style="height: 7.5pt;"></tr>
					</tbody>
				</table></span>
			</td>
	</tr></table>			

	<table width="100%" style="border-collapse: collapse;" border="0">
		<tr>
			<td class="isiKarakter" width="50%" style="vertical-align: top;">
				<font <?php echo warnacek($val->kategori) ?>>{{ strtoupper($val->jenis_tipe) }} Tinggi, Ciri-ciri...</font>
				<table border="0" style="margin-top: 5px;">

					@forelse($data as $key1 => $valueCore)
					@if($valueCore->golongan == 'ciri' && $valueCore->jenis_tipe == $val->jenis_tipe)
						
						@if($valueCore->kategori == 'core')
							<tr>
								<td style="width: 1px;"><li></li></td>
								<td style="line-height: 1">{{ $valueCore->karakteristik }}</td>
							</tr>
						@endif
						@if($valueCore->kategori == 'mask')
							<tr>
								<td style="width: 1px;"><li></li></td>
								<td style="line-height: 1">{{ $valueCore->karakteristik }}</td>
							</tr>
						@endif

					@endif
					@empty
					<p>Core Dan Mask Belum Diisi</p>
					@endforelse
				</table>
			</td>
			<td class="isiKarakter" width="50%" style="vertical-align: top; text-align: justify;">
				<font  <?php echo warnacek($val->kategori) ?>>Mengelola {{ strtoupper($val->jenis_tipe) }} Tinggi</font>
				<table border="0" style="margin-top: 5px;">
					@forelse($data as $key1 => $valueCore)
					@if($valueCore->golongan == 'tinggi' && $valueCore->jenis_tipe == $val->jenis_tipe)
					<tr>
						<td style="width: 1px;"><li></li></td>
						<td style="line-height: 1">{{ $valueCore->karakteristik }}</td>
					</tr>
					@endif
					@empty
					<p>Core Dan Mask Belum Diisi</p>
					@endforelse
				</table>
			</td>
		</tr>
	</table>

	@endforeach

@php

function warnacek($value){

	 if ($value == 'core') {
	 	return 'style="background-color: #22D659"';
	 }elseif ($value == 'mask') {
	 	return 'style="background-color: #E5D919"';
	 }else{
	 	return 'Terjadi Kesalahan';
	 }

}

function Kelompok($value){
	if ($value == 'core') {
		return 'Watak asli dalam kondisi lingkungan netral (CORE)';
	}elseif($value == 'mask'){
		return 'Kepribadian dalam kondisi lingkungan adanya tekanan/tuntutan(MASK)';
	}else{
		return 'terjadi kesalahan';
	}
}

@endphp															

</body>
</html>
<style type="text/css">
	.judul1{
		text-align: center;padding:0px;color:black;font-size:12pt;font-weight:400;font-style:normal;font-family:Calibri,sans-serif;vertical-align:middle;border-image:initial;white-space:nowrap;
	}
	.judul2{
		font-size: 28pt; font-weight: 400;font-style: normal; font-family: Calibri, sans-serif; text-align: center; vertical-align: middle;  padding: 0px; white-space: nowrap; 
	}
	.hatd{
		color: white; font-size: 22pt; font-weight: bold; font-family: 'Trebuchet MS', sans-serif; text-align: center; vertical-align: middle; background: #366092; padding-top: 1px; padding-right: 1px; padding-left: 1px; font-style: normal; border: none; white-space: nowrap;
	}
	.datadiri{
		font-weight: bold;  font-family: Calibri, sans-serif; font-size: 12px;
	}
	.datadiri2{ 
		font-weight: bold;  font-family: Calibri, sans-serif; font-size: 16px; text-decoration: underline;
	}
	.isiKarakter{ 
		 font-family: Calibri, sans-serif; font-size: 11px;
	}
	.kotakkelas1{
		border-width: 0.5pt; border-style: solid; border-color: windowtext black black windowtext; width: 46pt; color: white; font-weight: bold; text-align: center; vertical-align: middle; background: black; padding: 0px; font-size: 11pt; font-style: normal; font-family: Calibri, sans-serif; border-image: initial; white-space: nowrap;
	}
	.kotakkelas2{
		border-right: 0.5pt solid black; border-bottom: 0.5pt solid black; width: 46pt; color: windowtext; font-size: 32pt; font-weight: bold; text-align: center; border-top: none; border-left: 0.5pt solid windowtext; padding: 0px; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;
	}
	hr{
		margin: 0px;
	}
	p {
		margin: 0px;
	}
</style>