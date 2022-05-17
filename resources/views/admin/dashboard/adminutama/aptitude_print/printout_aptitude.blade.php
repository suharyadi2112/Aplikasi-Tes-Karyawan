<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="window.print()">


	<table style="border-collapse: collapse; width: 100%; " border="1">
		<tbody>
		<tr style="height: 1px;">
		<td style="width: 16.7932%; padding: 3px;text-align: center;" colspan="2" rowspan="2"><img src="{{ URL::asset('admin/dist/img/logo2.png') }}" style="width: 50%;"></td>
		<td style="width: 30.8629%;  text-align: center; font-family: arial, helvetica, sans-serif; font-size: 20px;" colspan="5" rowspan="2"><b>UNIVERSITAS UNIVERSAL</b></td>
		<td style="width: 10.2585%; text-align: center; font-family: arial, helvetica, sans-serif; font-weight: bold;font-size:11px;" colspan="5">Nilai</td>
		</tr>
		<tr style="height: 21px;">
		<td style="width: 3.27103%; text-align: center;font-family: arial, helvetica, sans-serif;font-weight: bold;font-size:11px;" colspan="2">V</td>
		<td style="width: 3.27103%; text-align: center;font-family: arial, helvetica, sans-serif;font-weight: bold;font-size:11px;">N</td>
		<td style="width: 3.27103%; text-align: center;font-family: arial, helvetica, sans-serif;font-weight: bold;font-size:11px;">P</td>
		<td style="width: 3.27103%; text-align: center;font-family: arial, helvetica, sans-serif;font-weight: bold;font-size:11px;">R</td>
		</tr>
		<tr style="height: 40px;">
		<td style="width: 8.39661%; font-family: arial, helvetica, sans-serif;font-weight: bold;font-size:11px;">Tgl.</td>
		<td style="width: 8.39661%; font-family: arial, helvetica, sans-serif;font-size:11px;text-align: center;"><b>KEPEGAWAIAN</b></td>
		<td style="width: 30.8629%;  text-align: center;font-family: arial, helvetica, sans-serif; font-size: 9px;" colspan="5">
		KOMPLEK MAHA VIHARA DUTA MAITREYA, SUNGAI PANAS - BATAM<br>
		Telp. 0778 - 473399, 466869. www.uvers.ac.id
		</td>
		@foreach($skoring as $vskor)
		<td style="width: 3.27103%; text-align: center; font-family: arial, helvetica, sans-serif; font-weight: bold;font-size:11px;" colspan="2">{{ $vskor->skor_verbal}}</td>
		<td style="width: 3.71643%; text-align: center; font-family: arial, helvetica, sans-serif; font-weight: bold;font-size:11px;">{{$vskor->skor_numerik}}</td>
		<td style="width: 2.1028%; text-align: center; font-family: arial, helvetica, sans-serif; font-weight: bold;font-size:11px;">{{$vskor->skor_logical}}</td>
		<td style="width: 1.16822%; text-align: center; font-family: arial, helvetica, sans-serif; font-weight: bold;font-size:11px;">{{$vskor->rata_rata}}</td>
		@endforeach
		</tr>
		<tr style="height: 10px;">
		<td style="width: 16.7932%; font-family: arial, helvetica, sans-serif;font-weight: bold;font-size:11px;" colspan="2">Nama: {{ $datadiri->nama_lengkap }}</td>
		<td style="width: 30.8629%; text-align: center;font-family: arial, helvetica, sans-serif;font-weight: bold;" colspan="5" rowspan="2">
		<font size="1">LEMBAR JAWABAN </font><br>
		<font size="3">APTITUDE TEST</font><br>
		<font size="1">UNTUK DOSEN UVERS</font><br>
		</td>
		<td style="width: 10.2585%; height: 10px; text-align: center;font-family: arial, helvetica, sans-serif;font-weight: bold;font-size:11px;" colspan="5">Untuk Posisi</td>
		</tr>
		<tr style="height: 21px;">
		<td style="width: 16.7932%;font-family: arial, helvetica, sans-serif;font-weight: bold;font-size:11px;" colspan="2">Hp/Tel: {{ $datadiri->nomor_telepon }}</td>
		<td style="width: 10.2585%;font-family: arial, helvetica, sans-serif;" colspan="5"></td>
		</tr>
		</tbody>
	</table>
	<hr>
	<br>

	<table style="width: 100%;" border="0">
		<tbody>
			<td style="vertical-align: top;">
				<b>Verbal</b>
				@php $noV = 1; @endphp
				<table border="1" style=" border: 1px solid black;border-collapse: collapse;">
					<tbody>
						@foreach($CekJawaban as $tyr => $valueCek)
						@if($valueCek->nama_kategori == 'verbal')
						<tr >
							<td style="padding-left: 6px;padding-right: 6px; text-align: center; vertical-align: middle; font-size:13px;">{{ $noV }}</td>
							<td style="padding-left: 6px;padding-right: 6px; text-align: center; vertical-align: middle;font-size:13px;

							@if('a' == $valueCek->jawaban)
								background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'a')
								background-color: #3BE63F;
							@endif
							">
							A</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;
							@if('b' == $valueCek->jawaban)
								background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'b')
								background-color: #3BE63F;
							@endif
							">B</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;
							@if('c' == $valueCek->jawaban)
							background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'c')
								background-color: #3BE63F;
							@endif
							">C</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;
							@if('d' == $valueCek->jawaban)
							background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'd')
								background-color: #3BE63F;
							@endif
							">D</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;
							@if('e' == $valueCek->jawaban)
							background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'e')
								background-color: #3BE63F;
							@endif
							">E</td>

						</tr>
						@endif
						@php $noV++ @endphp
						@endforeach
					</tbody>
				</table>
			</td>
			<td style="vertical-align: top;">
				<b>Numerik</b>
				@php $noN = 1; @endphp
				<table border="1" style=" border: 1px solid black;border-collapse: collapse;">
					<tbody>
						@foreach($CekJawaban as $tyr => $valueCek)
						@if($valueCek->nama_kategori == 'numerical')
						<tr>
							<td style="padding-left: 6px;padding-right: 6px; text-align: center; vertical-align: middle;font-size:13px;">{{$noN}}</td>
							<td style="padding-left: 6px;padding-right: 6px; text-align: center; vertical-align: middle;font-size:13px;
							@if('a' == $valueCek->jawaban)

								background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'a')
								background-color: #3BE63F;
							@endif
							">
							A</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;

							@if('b' == $valueCek->jawaban)
								background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'b')
								background-color: #3BE63F;
							@endif
							">B</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;
							@if('c' == $valueCek->jawaban)
							background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'c')
								background-color: #3BE63F;
							@endif
							">C</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;
							@if('d' == $valueCek->jawaban)
							background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'd')
								background-color: #3BE63F;
							@endif
							">D</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;
							@if('e' == $valueCek->jawaban)
							background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'e')
								background-color: #3BE63F;
							@endif
							">E</td>
						</tr>
						@endif
						@php $noN++ @endphp
						@endforeach
					</tbody>
				</table>
			</td>
			<td style="vertical-align: top;">
				<b>Penalaran</b>
				@php $noP = 1; @endphp
				<table border="1" style=" border: 1px solid black;border-collapse: collapse;">
					<tbody>
						@foreach($CekJawaban as $tyr => $valueCek)
						@if($valueCek->nama_kategori == 'logical')
						<tr>
							<td style="padding-left: 6px;padding-right: 6px; text-align: center; vertical-align: middle;font-size:13px;">{{$noP}}</td>
							<td style="padding-left: 6px;padding-right: 6px; text-align: center; vertical-align: middle;font-size:13px;

							@if('a' == $valueCek->jawaban)

								background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'a')
								background-color: #3BE63F;
							@endif
							">
							A</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;

							@if('b' == $valueCek->jawaban)
								background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'b')
								background-color: #3BE63F;
							@endif
							">B</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;
							@if('c' == $valueCek->jawaban)
							background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'c')
								background-color: #3BE63F;
							@endif
							">C</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;
							@if('d' == $valueCek->jawaban)
							background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'd')
								background-color: #3BE63F;
							@endif
							">D</td>


							<td style="padding-left: 6px;padding-right: 6px;text-align: center; vertical-align: middle;font-size:13px;
							@if('e' == $valueCek->jawaban)
							background-color: #898989;
							@endif
							@if($valueCek->jawaban == $valueCek->jawaban_benar && $valueCek->jawaban == 'e')
								background-color: #3BE63F;
							@endif
							">E</td>
						</tr>
						@endif
						@php $noP++ @endphp
						@endforeach
					</tbody>
				</table>
			</td>
		</tbody>
	</table>
	<hr>

	<table>
		<tbody>
			<tr>
				<td>
						
					<table border="1" style=" border: 1px solid black;border-collapse: collapse;">
						<thead>
							<tr>
								<th colspan="3" style="text-align: left; font-family: arial, helvetica, sans-serif;font-size:13px;">Rumus</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">VERBAL</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">Jumlah Benar * 10/3</td>
							</tr>
							<tr>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">NUMERIK</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">Jumlah Benar * 5</td>
							</tr>
							<tr>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">PENALARAN</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">Jumlah Benar * 4</td>
							</tr>
							<tr>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">RATA-RATA</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">NILAI (V + N + P) / 3</td>
							</tr>
						</tbody>
					</table>

				</td>
				<td>
						
					<table border="1" style=" border: 1px solid black;border-collapse: collapse;">
						<thead>
							<tr>
								<th colspan="3" style="text-align: left; font-family: arial, helvetica, sans-serif;font-size:13px;">Skoring</th>
							</tr>
						</thead>
						<tbody>
							@foreach($skoring as $vskor)
							<tr>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">VERBAL</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">{{ $vskor->jumber_verbal }} * 10/3</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">{{ $vskor->skor_verbal }}</td>
							</tr>
							<tr>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">NUMERIK</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">{{ $vskor->jumber_numerik }} * 5</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">{{ $vskor->skor_numerik }}</td>
							</tr>
							<tr>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">PENALARAN</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">{{ $vskor->jumber_logical }} * 4</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">{{ $vskor->skor_logical }}</td>
							</tr>
							<tr>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">RATA-RATA</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">NILAI ({{$vskor->skor_verbal}} + {{$vskor->skor_numerik}} + {{$vskor->skor_logical}}) / 3</td>
								<td style="font-family: arial, helvetica, sans-serif;font-size:13px;">{{ $vskor->rata_rata }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>

				</td>
				<td style="vertical-align: top;">
						
					<table>
						<tr>
							<td style=" background-color: #898989; font-family: arial, helvetica, sans-serif;font-size:13px;">
								 &nbsp; &nbsp; &nbsp;
							</td>
							<td>
								Jawaban Salah
							</td>
						</tr>
						<tr>
							<td style=" background-color: #3BE63F; font-family: arial, helvetica, sans-serif;font-size:13px;">
								
							</td>
							<td>Jawaban Benar</td>
						</tr>
					</table>

				</td>
			</tr>
		</tbody>
	</table>

	
</body>
</html>