@extends('admin.layout.master')

@section('content')

<?php

$status = array('0' => 'Tidak',

                '1' => 'Iya' );

$statuslb = array('0' => '-',

                '1' => '1 Tahun',

                '2' => '2 Tahun',

                '3' => 'Lebih Dari 3 Tahun' );

?>

<style type="text/css">

    table { page-break-inside:auto}

    tr    { page-break-inside:avoid; page-break-after:auto}

    thead { display:table-header-group}

    tfoot { display:table-footer-group }

   

</style>

<div class="content-header">

  <input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="Print" />

<!-- left column -->

</div>



<div id="printableArea">

<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>

  <!-- /.content-header --> 

<div class="container-fluid">

    <div class="row">

      <div class="col-12 mx-auto">

      <div style="margin: 30px">



       <table style="border-collapse: collapse; width: 720pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 48pt;" span="3" /></colgroup>

        <tbody>

        <tr style="height: 14.5pt;">

        <td style="text-align: center; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" rowspan="2">

          <img src="{{ URL::asset('admin/dist/img/fotoformulir.png') }}" style="width: 120px;">

        </td>



        <td style=" font-size: 45pt; font-weight: 400; font-style: normal; font-family: 'Kaushan Script', cursive; text-align: center; vertical-align: bottom;  padding: 0px; white-space: nowrap;"><b>Yayasan  Pancaran  Maitri</b></td>



        <td style=" width: 64px; text-align: center; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: middle; border-image: initial; white-space: nowrap; opacity: 0.5; " rowspan="2"><b></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

        </tr>

        <tr style="height: 14.5pt;">

        <td style="font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap; width: 63.3333px; text-align: center;  "> 

              Kompleks Maha Vihara Duta Maitreya,

              Bukit Beruntung, Sungai Panas, Batam 29433<br>

              Telp. (0778) 462880,

              E-mail : yayasanpancaranmaitri@yahoo.co.id<br></td>

        </tr>

        </tbody>

        </table>

        <br>

        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="15" /> <col style="width: 23pt;" /> <col style="width: 19pt;" span="8" /> <col style="width: 22pt;" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 26.25pt;">

          <td style="width: 526pt; color: white; font-size: 28pt; font-weight: bold; font-family: 'Trebuchet MS', sans-serif; text-align: center; vertical-align: middle; background: #244062; padding: 0px; font-style: normal; border: none; white-space: nowrap;" colspan="27">FORMULIR PERMOHONAN KERJA</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 526pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="15" /> <col style="width: 23pt;" /> <col style="width: 19pt;" span="8" /> <col style="width: 22pt;" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 10.5pt;">

          <td style="width: 526pt; text-align: center; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          </tbody>

        </table>





        <!----------------------------------------DATA DIRI------------------------------------------>





        <table style="border-collapse: collapse; width: 730pt; height: 26px;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="25" /> <col style="width: 35pt;" /></colgroup>

        <tbody>

        <tr style="height: 16.5pt;">

        <td style="width: 678.667px; color: white; font-size: 14pt; font-weight: bold; font-family: Tahoma, sans-serif; text-align: left; vertical-align: middle; background: #366092; padding: 2px; font-style: normal; border: none; white-space: nowrap;" colspan="27">DATA DIRI</td>

        </tr>

        </tbody>

        </table>



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="25" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 21.0pt;">

          <td style="width: 313pt; font-size: 12pt; text-align: left; border-top: none; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="17">Nama Lengkap (sesuai KTP)</td>

          <td style="width: 206pt; font-size: 12pt; text-align: left; border-top: none; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="10">Nama Mandarin (jika ada)</td>

          </tr>

          <tr style="height: 18.0pt;">



          <td style="border-right: 0.5pt solid black; font-size: 12pt; font-style: italic; text-align: center; border-top: none; border-bottom: 0.5pt solid windowtext; border-left: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="17">{{ $nama_lengkap }}</td>



          <td style="font-size: 12pt; font-style: italic; text-align: center; border-top: none; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="10">{{ $nama_mandarin }}</td>

          </tr>

          </tbody>

        </table>





        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="25" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 18.0pt;">

          <td style="width: 256pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="14">Tanda Pengenal Identitas</td>

          <td style="width: 19pt; font-size: 12pt; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 244pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="12">Jenis Tanda Pengenal Lainnya</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">Keterangan</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6">Nomor Identitas</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">Berlaku s.d.</td>

          <td style="padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="12">Jenis Kartu Identitas</td>

          </tr>

          <tr style="height: 12.75pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">



            KTP



          </td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6">



            {{ $no_ktp }}



          </td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $masa_berlaku_ktp }}</td>

          <td style="padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $kartu_keluarga }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $paspor }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4"></td>

          </tr>

          <tr style="height: 15.0pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">



          NPWP



          </td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6">



          {{ $no_npwp }}



          </td>

          <td style="border-left: none; font-size: 12pt; text-align: left; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #bfbfbf; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4"></td>

          <td style="padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $sim_a }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $sim_b }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $sim_c }}</td>

          </tr>

          <tr style="height: 15.0pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4"></td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6"></td>



          <td style="border-left: none; font-size: 12pt; text-align: left; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #bfbfbf; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4"></td>



          <td style="padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;"></td>



          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $bpjs_kesehatan }}</td>



          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $bpjs_tenagakerja }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $bpjs_jaminanpensiun }}</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="25" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 21.0pt;">

          <td style="width: 218pt; font-size: 12pt; text-align: left; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-top: none; border-image: initial; white-space: nowrap;" colspan="12">Tempat Lahir (kota-propinsi)</td>

          <td style="width: 19pt; font-size: 12pt; text-align: center; border: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" rowspan="2">&nbsp;</td>

          <td style="width: 76pt; font-size: 12pt; text-align: left; border-top: none; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="4">Tanggal Lahir</td>

          <td style="width: 19pt; font-size: 12pt; text-align: center; border: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" rowspan="2"></td>

          <td style="width: 57pt; font-size: 12pt; text-align: left; border-top: none; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="3">Gol Darah</td>

          <td style="width: 19pt; font-size: 12pt; text-align: center; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" rowspan="2"></td>

          <td style="width: 111pt; font-size: 12pt; text-align: left; border-top: none; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="5">Nomor WhatsApp</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="12">{{ nama_prov($tempatlahir_provinsi) }} - {{ nama_kota($tempatlahir_kota) }}</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $tanggal_lahir }}</td>

          <td style="text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="3">{{ $golongan_darah }}</td>

          <td style="font-size: 12pt; text-align: center; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" colspan="5">{{ $nomor_wa }}</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="25" /> <col style="width: 29pt;" /></colgroup>

          <tbody>

          <tr style="height: 21.0pt;">

          <td style="width: 206pt; font-size: 12pt; text-align: left; border-top: none; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="11">Alamat Tinggal Sekarang</td>

          <td style="width: 18pt; font-size: 12pt; text-align: center; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" rowspan="3">&nbsp;</td>

          <td style="width: 5%; font-size: 12pt; text-align: left; border-top: none; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="5">Kepemilikan Tempat&nbsp;</td>

          <td style="width: 19pt; font-size: 12pt; text-align: center; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" rowspan="3">&nbsp;</td>

          <td style="width: 16.5%; font-size: 12pt; text-align: left; border-top: none; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="4">Tinggi &amp; Berat Badan</td>

          <td style="width: 19pt; font-size: 12pt; text-align: center; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" rowspan="3">&nbsp;</td>

          <td style="width: 86pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="4">Nomor Telepon</td>

          </tr>

          <tr style="height: 14.25pt;">

          <td style="font-size: 12pt; text-align: justify; vertical-align: top; border: 0.5pt solid windowtext; padding: 3px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; " colspan="11" rowspan="2">{{ $alamat_sekarang }}</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: top; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="5" rowspan="2">{{ $kepemilikan_tempat_tinggal }}</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: top; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="3">{{ $tinggi_badan }}</td>

          <td style="border-top: none; font-size: 12pt; text-align: center; vertical-align: middle; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border-image: initial; white-space: nowrap;">cm</td>

          <td style="border-width: 0.5pt; border-style: solid; border-color: windowtext black windowtext windowtext; font-size: 12pt; text-align: center; vertical-align: middle; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border-image: initial; white-space: nowrap;" colspan="4">{{ $nomor_telepon }}</td>

          </tr>

          <tr style="height: 13.5pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: top; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="3">{{ $berat_badan }}</td>

          <td style="border-top: none; font-size: 12pt; text-align: center; vertical-align: middle; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border-image: initial; white-space: nowrap;">kg</td>

          <td style="border-width: 0.5pt; border-style: solid; border-color: windowtext black windowtext windowtext; font-size: 12pt; text-align: center; vertical-align: middle; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border-image: initial; white-space: nowrap;" colspan="4">{{ $nomor_telepon2 }}</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="25" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 21.0pt;">

          <td style="width: 137pt; font-size: 12pt; text-align: left; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-top: none; border-image: initial; white-space: nowrap;" colspan="8">E-mail</td>

          <td style="width: 19pt; font-size: 12pt; border: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;">&nbsp;</td>

          <td style="width: 76pt; font-size: 12pt; text-align: left; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-top: none; border-image: initial; white-space: nowrap;" colspan="4">Agama</td>

          <td style="width: 19pt; font-size: 12pt; border: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;">&nbsp;</td>

          <td style="width: 78pt; font-size: 12pt; text-align: left; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-top: none; border-image: initial; white-space: nowrap;" colspan="3">Jenis Kelamin</td>

          <td style="width: 19pt; text-align: left; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 187pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="9">Nomor Rekening BCA</td>

          </tr>

          <tr style="height: 15.75pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $email }}</td>

          <td style="font-size: 12pt; vertical-align: middle; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $agama }}</td>

          <td style="font-size: 12pt; vertical-align: middle; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" colspan="3">{{ $jenis_kelamin }}</td>

          <td style="text-align: left; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $nomor_rekening }}</td>

          </tr>

          </tbody>

        </table>

        



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="19" /> <col style="width: 12pt;" /> <col style="width: 21pt;" /> <col style="width: 27pt;" /> <col style="width: 21pt;" /> <col style="width: 19pt;" span="2" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 21.0pt;">

          <td style="width: 122pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="7">Status Marital</td>

          <td style="width: 19pt; text-align: left; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 19pt; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 19pt; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 19pt; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 19pt; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 19pt; font-size: 12pt; vertical-align: middle; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 19pt; font-size: 12pt; vertical-align: middle; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 86pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="3">Jumlah Anak</td>

          <td style="width: 19pt; text-align: left; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 192pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="9">Status Dalam Keluarga</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="13">{{ $status_marital }}</td>

          <td style="font-size: 12pt; vertical-align: middle; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;"></td>

          <td style="font-size: 12pt; vertical-align: middle; text-align: center; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;">

          <?php if ($status_marital != "Menikah") {

              echo "-";

            }else{

              echo $jumlah_anak;

            }

          ?>

          </td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Orang</td>

          <td style="text-align: left; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="3">Anak ke</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;">{{ $anak_ke }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;">Dari</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;">{{ $jumlah_saudara }}</td>

          <td style="border-right: 0.5pt solid black; border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border-image: initial; white-space: nowrap;" colspan="3">Bersaudara</td>

          </tr>

          </tbody>

        </table>



        <?php if ($status_marital != "Menikah") { ?>

        <!--posisi jika tidak menikah kotak-kotak marital tidak ada-->

        

          <?php }else{ ?>

          <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="19" /> <col style="width: 12pt;" /> <col style="width: 21pt;" /> <col style="width: 27pt;" /> <col style="width: 21pt;" /> <col style="width: 19pt;" span="2" /> <col style="width: 35pt;" /></colgroup>

            <tbody>

            <tr style="height: 21.0pt;">

            <td style="width: 142pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="8">Nama Suami/Istri</td>

            <td style="width: 19pt; font-size: 12pt; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

            <td style="width: 152pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="8">Pekerjaan</td>

            <td style="width: 19pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

            <td style="width: 192pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="9">Nomor Telepon</td>

            </tr>

            <tr style="height: 16.5pt;">

            <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $nama_pasangan }}</td>

            <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

            <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $pekerjaan_pasangan }}</td>

            <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

            <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $nomor_telepon_pasangan }}</td>

            </tr>

            </tbody>

          </table>

        <?php } ?>





        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="19" /> <col style="width: 12pt;" /> <col style="width: 21pt;" /> <col style="width: 27pt;" /> <col style="width: 21pt;" /> <col style="width: 19pt;" span="2" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 21.0pt;">

          <td style="width: 142pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="8">Nama Ayah &amp; Ibu Kandung</td>

          <td style="width: 19pt; text-align: left; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 152pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="8">Pekerjaan</td>

          <td style="width: 19pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 192pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="9">Nomor Telepon</td>

          </tr>

          <tr style="height: 17.25pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $nama_ayah }}</td>

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $pekerjaan_ayah }}</td>

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $nomor_telepon_ayah }}</td>

          </tr>

          <tr style="height: 15.75pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $nama_ibu }}</td>

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $pekerjaan_ibu }}</td>

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $nomor_telepon_ibu }}</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="19" /> <col style="width: 12pt;" /> <col style="width: 21pt;" /> <col style="width: 27pt;" /> <col style="width: 21pt;" /> <col style="width: 19pt;" span="2" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 18.75pt;">

          <td style="width: 142pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="8">Hobi</td>

          <td style="width: 19pt; font-size: 12pt; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 152pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="8">Sedang Melamar CPNS</td>

          <td style="width: 19pt; font-size: 12pt; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 192pt; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="9">Merokok</td>

          </tr>

          <tr style="height: 17.25pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; " colspan="8">{{ $hobi }}</td>

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $status[$status_cpns] }}</td>

          <td style="padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $status[$status_merokok] }}</td>

          </tr>

          <tr style="height: 18.75pt;">

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="8">Olahraga Yang Disukai</td>

          <td style="font-size: 12pt; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: left; border-top: 0.5pt solid windowtext; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="8">Sedang Pengajuan Beasiswa</td>

          <td style="font-size: 12pt; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="9">Kesediaan Lama Bekerja</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $minat_olahraga }}</td>

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $status[$status_beasiswa] }}</td>

          <td style="text-align: left; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $statuslb[$kesediaan_lama_bekerja] }}</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 526pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="15" /> <col style="width: 23pt;" /> <col style="width: 19pt;" span="8" /> <col style="width: 22pt;" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 10.5pt;">

          <td style="width: 526pt; text-align: center; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 730pt; height: 93px;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="19" /> <col style="width: 12pt;" /> <col style="width: 21pt;" /> <col style="width: 27pt;" /> <col style="width: 21pt;" /> <col style="width: 19pt;" span="2" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 18.0pt;">

          <td style="width: 697.333px; font-size: 12pt; text-align: left; vertical-align: middle; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap; height: 23px;" colspan="27">Bila Keadaan Darurat, Orang Yang Bisa Dihubungi</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap; height: 24px; width: 222.667px;" colspan="8">Nama</td>

          <td style="font-size: 12pt; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap; height: 24px; width: 25.3333px;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap; height: 24px; width: 211.333px;" colspan="8">Hubungan</td>

          <td style="font-size: 12pt; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap; height: 24px; width: 25.3333px;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap; height: 24px; width: 212.667px;" colspan="9">Kota</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap; height: 23px; width: 222.667px;" colspan="8">{{ $nama_nodarurat }}</td>

          <td style="font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap; height: 23px; width: 24.6667px;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap; height: 23px; width: 210.667px;" colspan="8">{{ $hubungan_nodarurat }}</td>

          <td style="padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap; height: 23px; width: 24.6667px;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap; height: 23px; width: 212px;" colspan="9">{{ $kota_nodarurat }}</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap; height: 23px; width: 222.667px;" colspan="8">{{ $nama_nodarurat2 }}</td>

          <td style="font-size: 12pt; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap; height: 23px; width: 24.6667px;">&nbsp;</td>

          <td style="border-width: 0.5pt; border-style: solid; border-color: windowtext black windowtext windowtext; font-size: 12pt; text-align: center; vertical-align: middle; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border-image: initial; white-space: nowrap; height: 23px; width: 210.667px;" colspan="8">{{ $hubungan_nodarurat2 }}</td>

          <td style="vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap; height: 23px; width: 24.6667px;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap; height: 23px; width: 212px;" colspan="9">{{ $kota_nodarurat2 }}</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="16" /></colgroup>

          <tbody>

          <tr style="height: 18.0pt;">

          <td style="width: 142pt; font-size: 12pt; text-align: left; border-top: none; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="8">Nomor Telepon I</td>

          <td style="width: 19pt; font-size: 12pt; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="width: 152pt; font-size: 12pt; text-align: left; border-top: none; border-right: none; border-bottom: 0.5pt solid windowtext; border-left: none; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="8">Nomor Telepon II</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $nomor_darurat }}</td>

          <td style="font-size: 12pt; vertical-align: middle; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;">&nbsp;</td>

          <td style="font-size: 12pt; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="8">{{ $nomor_darurat2 }}</td>

          </tr>

          </tbody>

        </table>



        <!----------------------------------------DATA DIRI------------------------------------------>







        <!----------------------------------------DATA KESEHATAN------------------------------------------>





        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="15" /> <col style="width: 23pt;" /> <col style="width: 19pt;" span="8" /> <col style="width: 22pt;" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 10.5pt;">

          <td style="width: 526pt; text-align: center; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="27" /></colgroup>

          <tbody>

          <tr style="height: 18.0pt;">

          <td style="width: 513pt; color: white; font-size: 14pt; font-weight: bold; font-family: Tahoma, sans-serif; text-align: left; vertical-align: middle; background: #366092; padding: 2px; font-style: normal; border: none; white-space: nowrap;" colspan="27">DATA KESEHATAN</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 730pt; height: 80px;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="16" /></colgroup>

          <tbody>

          <tr style="height: 21.0pt;">

          <td style="width: 416px; font-size: 12pt; text-align: left; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap; height: 27px;" colspan="17">Penyakit Dan Kelainan Fisik Yang Pernah Diderita Dan Masih Sampai Saat Ini</td>

          </tr>

          <tr style="height: 14.25pt;">

          <td style="font-size: 12pt; text-align: center; vertical-align: top; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; height: 53px; width: 416px;" colspan="17" rowspan="2">

            <?php if ((empty($kes->nama_penyakit)) && (empty($kes->penyakit_lainnya))) {

              echo "Sehat Jasmani Dan Rohani";

            }else{

              echo $kes->nama_penyakit; echo $kes->penyakit_lainnya;

            }

            ?>



          </td>

          </tr>

          </tbody>

        </table>



        <!----------------------------------------DATA KESEHATAN------------------------------------------>

          <p style="page-break-before: always"></p>

        <!----------------------------------------DATA PENDIDIKAN------------------------------------------>

      

        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="15" /> <col style="width: 23pt;" /> <col style="width: 19pt;" span="8" /> <col style="width: 22pt;" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 10.5pt;">

          <td style="width: 526pt; text-align: center; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          </tbody>

        </table>



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="27" /></colgroup>

          <tbody>

          <tr style="height: 18.0pt;">

          <td style="width: 513pt; color: white; font-size: 14pt; font-weight: bold; font-family: Tahoma, sans-serif; text-align: left; vertical-align: middle; background: #366092; padding: 2px; font-style: normal; border: none; white-space: nowrap;" colspan="27">DATA PENDIDIKAN</td>

          </tr>

          </tbody>

        </table>





        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="27" /></colgroup>

          <tbody>

          <tr style="height: 21.0pt;">

          <td style="width: 513pt; font-weight: bold; text-align: left; border: none; padding: 0px; color: black; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" colspan="27">FORMAL</td>

          </tr>

          <tr style="height: 15.75pt;">

          <td style="width: 114pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6" rowspan="2">Jenjang Pendidikan</td>

          <td style="width: 171pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9" rowspan="2">Nama Sekolah/Perguruan Tinggi</td>

          <td style="width: 76pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4" rowspan="2">Jurusan/ Program Studi</td>

          <td style="width: 76pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4" rowspan="2">IPK</td>

          <td style="border: 0.5pt solid windowtext; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">Tahun</td>

          </tr>

          <tr style="height: 15.75pt;">

          <td style="border: 0.5pt solid windowtext; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Mulai</td>

          <td style="border: 0.5pt solid windowtext; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Selesai</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="font-size: 12pt; text-align: left; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6">&nbsp;&nbsp; S M P</td>

          <td style="border-left: none; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $pen->smp_namasekolah }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: left; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #bfbfbf; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">&nbsp;</td>

          <td style="border-left: none; font-size: 12pt; text-align: left; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #bfbfbf; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">&nbsp;</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $pen->smp_tahunmulai }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $pen->smp_tahunselesai }}</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="font-size: 12pt; text-align: left; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6">&nbsp;&nbsp; S M A</td>

          <td style="border-left: none; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $pen->sma_namasekolah }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; " colspan="4">{{ $pen->sma_jurusan }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: left; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #bfbfbf; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">&nbsp;</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $pen->sma_tahunmulai }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $pen->sma_tahunselesai }}</td>

          </tr>



          @foreach($perting as $tampilperting)

          <tr style="height: 18.0pt;">

            <td style="font-size: 12pt; text-align: left; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6">&nbsp;&nbsp; {{ $tampilperting->pt_jenjang }}</td>

            <td style="border-left: none; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $tampilperting->pt_nama }}</td>

            <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; " colspan="4">{{ $tampilperting->pt_studi }}</td>

            <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $tampilperting->pt_ipk }}</td>

            <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $tampilperting->pt_mulai }}</td>

            <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $tampilperting->pt_selesai }}</td>

          </tr>

          @endforeach



          </tbody>

        </table>

        <!----------------------------------------DATA PENDIDIKAN------------------------------------------>





        <!----------------------------------------DATA PENDIDIKAN NON FORMAL------------------------------------------>



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="27" /></colgroup>

          <tbody>

          <tr style="height: 21.0pt;">

          <td style="width: 513pt; font-weight: bold; text-align: left; border: 0.5pt solid windowtext; padding: 0px; color: black; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" colspan="27">NON FORMAL</td>

          </tr>

          <tr style="height: 15.75pt;">

          <td style="width: 171pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9" rowspan="2">Jenis Pelatihan</td>

          <td style="width: 171pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9" rowspan="2">Nama Penyelenggara</td>

          <td style="width: 95pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="5" rowspan="2">Kota</td>

          <td style="border: 0.5pt solid windowtext; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">Tahun</td>

          </tr>

          <tr style="height: 15.75pt;">

          <td style="border: 0.5pt solid windowtext; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Mulai</td>

          <td style="border: 0.5pt solid windowtext; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Selesai</td>

          </tr>



          @foreach($nonformal as $tampilnf)



          <tr style="height: 18.0pt;">

          <td style="text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $tampilnf->jenis_pelatihan }}</td>

          <td style="border-left: none; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif;" colspan="9">{{ $tampilnf->nama_penyelenggara }}</td>

          <td style="border-left: none; width: 95pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="5">{{ $tampilnf->kota }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $tampilnf->nf_mulai }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $tampilnf->nf_selesai }}</td>

          </tr>



          @endforeach



          </tbody>

        </table>

        <!----------------------------------------DATA PENDIDIKAN NON FORMAL------------------------------------------>





        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="15" /> <col style="width: 23pt;" /> <col style="width: 19pt;" span="8" /> <col style="width: 22pt;" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 10.5pt;">

          <td style="width: 526pt; text-align: center; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          </tbody>

        </table>





        <!------------------------------------PENGALAMAN KERJA BIDANG PENDIDIKAN----------------------------------->

        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="27" /></colgroup>

          <tbody>

          <tr style="height: 18.0pt;">

          <td style="width: 513pt; color: white; font-size: 14pt; font-weight: bold; font-family: Tahoma, sans-serif; text-align: left; vertical-align: middle; background: #366092; padding: 2px; font-style: normal; border: none; white-space: nowrap;" colspan="27">PENGALAMAN KERJA</td>

          </tr>

          <tr style="height: 21.0pt;">

          <td style="font-weight: bold; text-align: left; border: none; padding: 0px; color: black; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" colspan="27">BIDANG PENDIDIKAN (SEKOLAH/PERGURUAN TINGGI)</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="color: windowtext; font-weight: bold; text-align: center; vertical-align: middle;border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9" rowspan="2">Nama Sekolah/Perguruan Tinggi</td>

          <td style="width: 76pt; color: windowtext; font-size: 12pt; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4" rowspan="2">Jabatan</td>

          <td style="width: 95pt; color: windowtext; font-size: 12pt; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="5" rowspan="2">Mengajar Mata Pelajaran/Mata Kuliah</td>

          <td style="width: 95pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="5" rowspan="2">Gaji</td>

          <td style="border: 0.5pt solid windowtext; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">Tahun</td>

          </tr>

          <tr style="height: 25.5pt;">

          <td style="border: 0.5pt solid windowtext; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Mulai</td>

          <td style="border: 0.5pt solid windowtext; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Selesai</td>

          </tr>



          @foreach($pkpen as $tampilpkpen)



          <tr style="height: 18.0pt;">

          <td style="text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $tampilpkpen->nama_sekolah }}</td>

          <td style="border-left: none; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif;" colspan="4">{{ $tampilpkpen->jenis_pekerjaan }}</td>

          <td style="border-left: none; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; " colspan="5">{{ $tampilpkpen->jenis_pelajaran }}</td>

          <td style="border-left: none; width: 95pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="5">{{ number_format($tampilpkpen->gaji) }}</td>

          <td style="border-left: none; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $tampilpkpen->pk_pend_mulai }}</td>

          <td style="border-left: none; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $tampilpkpen->pk_pend_selesai }}</td>

          </tr>

          @endforeach



          </tbody>

        </table>



        <!------------------------------------PENGALAMAN KERJA BIDANG PENDIDIKAN----------------------------------->

        <!--p style="page-break-before: always"></p-->

        <!------------------------------------PENGALAMAN KERJA BIDANG NON PENDIDIKAN----------------------------------->

        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="27" /></colgroup>

          <tbody>

          <tr style="height: 21.0pt;">

          <td style="width: 513pt; font-weight: bold; text-align: left; padding: 0px; color: black; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="27">BIDANG NON PENDIDIKAN</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="width: 114pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6" rowspan="2">Nama Perusahaan</td>

          <td style="width: 76pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4" rowspan="2">Jabatan</td>

          <td style="color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="3" rowspan="2">Gaji&nbsp;</td>

          <td style="width: 114pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6" rowspan="2">Deskripsi Tanggung Jawab Kerja</td>

          <td style="border-left: none; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">Tahun</td>

          <td style="color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4" rowspan="2">Alasan Pindah</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="border-left: none; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Mulai</td>

          <td style="border-left: none; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Selesai</td>

          </tr>

          @foreach($pknonpen as $tampilpknonpen)

          <tr style="height: 18.0pt;">

          <td style="text-align: center; vertical-align: top; border: 0.5pt solid windowtext; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; " colspan="6">{{ $tampilpknonpen->nama_perusahaan_np }}</td>

          <td style="border-left: none; text-align: center; vertical-align: top; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif;" colspan="4">{{ $tampilpknonpen->Jabatan_np }}</td>

          <td style="border-left: none; text-align: center; vertical-align: top; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; " colspan="3">{{ number_format($tampilpknonpen->gaji_np) }}</td>

          <td style="border-left: none; text-align: justify; vertical-align: top; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 3px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif;" colspan="6">{{ $tampilpknonpen->deskripsi_np }}</td>

          <td style="border-left: none; text-align: center; vertical-align: top; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $tampilpknonpen->mulai_np }}</td>

          <td style="border-left: none; text-align: center; vertical-align: top; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $tampilpknonpen->selesai_np }}</td>

          <td style="border-left: none; text-align: justify; vertical-align: top; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 4px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif;" colspan="4">{{ $tampilpknonpen->alasan_pindah }}</td>

          </tr>

          @endforeach

          </tbody>

        </table>



        <!------------------------------------PENGALAMAN KERJA BIDANG NON PENDIDIKAN----------------------------------->



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="15" /> <col style="width: 23pt;" /> <col style="width: 19pt;" span="8" /> <col style="width: 22pt;" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 10.5pt;">

          <td style="width: 526pt; text-align: center; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          </tbody>

        </table>



        <!--------------------------------------------PENGALAMAN BERORGANISASI-------------------------------------->

        <!--p style="page-break-before: always"></p-->



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="27" /></colgroup>

          <tbody>

          <tr style="height: 18.0pt;">

          <td style="width: 513pt; color: white; font-size: 14pt; font-weight: bold; font-family: Tahoma, sans-serif; text-align: left; vertical-align: middle; background: #366092; padding: 2px; font-style: normal; border: none; white-space: nowrap;" colspan="27">PENGALAMAN BERORGANISASI</td>

          </tr>

          <tr style="height: 9.0pt;">

          <td style="text-align: center; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="width: 114pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6" rowspan="2">Nama Organisasi</td>

          <td style="width: 76pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4" rowspan="2">Posisi</td>

          <td style="width: 171pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9" rowspan="2">Deskripsi Tugas</td>

          <td style="border-left: none; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">Tahun</td>

          <td style="color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4" rowspan="2">Kota</td>

          </tr>

          <tr style="height: 18.0pt;">

          <td style="border-left: none; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Mulai</td>

          <td style="border-left: none; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">Selesai</td>

          </tr>



          @foreach($porgan as $tampilorgan)

          <tr style="height: 18.0pt;">

          <td style="text-align: center; vertical-align: top; border: 0.5pt solid windowtext; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif;" colspan="6">{{ $tampilorgan->nama_organisasi }}</td>

          <td style="border-left: none; text-align: center; vertical-align: top; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif;" colspan="4">{{ $tampilorgan->posisi_organisasi }}</td>

          <td style="border-left: none; text-align: justify; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 4px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif;" colspan="9">{{ $tampilorgan->deskripsitugasorganisasi }}</td>

          <td style="border-left: none; text-align: center; vertical-align: top; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $tampilorgan->mulaiorganisasi }}</td>

          <td style="border-left: none; text-align: center; vertical-align: top; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="2">{{ $tampilorgan->selesaiorganisasi }}</td>

          <td style="border-left: none; text-align: center; vertical-align: top; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="4">{{ $tampilorgan->kotaorganisasi }}</td>

          </tr>

          @endforeach

          </tbody>

        </table>



        <!--------------------------------------------PENGALAMAN BERORGANISASI-------------------------------------->


        <!--p style="page-break-before: always"></p-->


        <!--------------------------------------------PENCAPAIAN ATAU PENGHARGAAN-------------------------------------->



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="27" /></colgroup>

          <tbody>

          <tr style="height: 18.5pt;">



          <tr style="height: 18.0pt;">

          <td style="width: 513pt; color: white; font-size: 14pt; font-weight: bold; font-family: Tahoma, sans-serif; text-align: left; vertical-align: middle; background: #366092; padding: 2px; font-style: normal; border: none; white-space: nowrap;" colspan="27">PENCAPAIAN (ACHIEVEMENT)</td>

          </tr>

          <tr style="height: 9.0pt;">

          <td style="text-align: center; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>



          <td style="width: 114pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6">Bidang</td>

          <td style="border-left: none; width: 171pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">Bentuk Penghargaan</td>

          <td style="border-left: none; width: 228pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="12">Tahun Penghargaan</td>

          </tr>

          @foreach($pencapaian as $tampilpenc)

          <tr style="height: 21.5pt;">

          <td style="text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif;" colspan="6">{{ $tampilpenc->bidang_penghargaan }}</td>

          <td style="border-left: none; width: 171pt; font-size: 12pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $tampilpenc->bentuk_penghargaan }}</td>

          <td style="border-left: none; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="12">{{ $tampilpenc->tahun_penghargaan }}</td>

          </tr>

          @endforeach

          </tbody>

        </table>



        <!--------------------------------------------PENCAPAIAN ATAU PENGHARGAAN------------------------------------->


        <!----------------------------------------------PEKERJAAN YANG DILAMAR--------------------------------------->



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="27" /></colgroup>

          <tbody>

          <tr style="height: 18.5pt;">



          <tr style="height: 18.0pt;">

          <td style="width: 513pt; color: white; font-size: 14pt; font-weight: bold; font-family: Tahoma, sans-serif; text-align: left; vertical-align: middle; background: #366092; padding: 2px; font-style: normal; border: none; white-space: nowrap;" colspan="27">PEKERJAAN YANG DILAMAR</td>

          </tr>

          <tr style="height: 9.0pt;">

          <td style="text-align: center; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>



          <td style="width: 114pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6">Posisi/Jabatan</td>

          <td style="border-left: none; width: 171pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">Tingkat/Jenjang</td>

          <td style="border-left: none; width: 228pt; color: windowtext; font-weight: bold; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="12">Penghasilan Yang Diminta Saat Ini</td>

          </tr>

          <tr style="height: 36.0pt;">

          <td style="text-align: center; vertical-align: middle; border: 0.5pt solid windowtext; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="6">{{ $peklam->posisi }}</td>

          <td style="border-left: none; width: 171pt; font-size: 10pt; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="9">{{ $peklam->tingkat }}</td>

          <td style="border-left: none; text-align: center; vertical-align: middle; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="12">{{ number_format($peklam->penghasilan) }}</td>

          </tr>

          <tr style="height: 9.0pt;">

          <td style="text-align: center; padding: 0px; color: black; font-size: 11pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          <tr style="height: 21.0pt;">

          <td style="color: windowtext; font-weight: bold; text-align: left; vertical-align: middle; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="27">&nbsp;&nbsp; Alasan Melamar Posisi Tersebut</td>

          </tr>

          <tr style="height: 36.0pt;">

          <td style="text-align: justify; vertical-align: top; border: 0.5pt solid windowtext; padding: 3px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; " colspan="27">{{ $peklam->alasan_melamar }}</td>

          </tr>

          <tr style="height: 9.0pt;">

          <td style="text-align: center; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          <tr style="height: 21.0pt;">

          <td style="color: windowtext; font-weight: bold; text-align: justify; vertical-align: top; border: 0.5pt solid windowtext; background: #95b3d7; padding: 0px; font-size: 12pt; font-style: normal; font-family: Calibri, sans-serif; " colspan="27">&nbsp;&nbsp; Garis Besar Tugas &amp; Tanggung Jawab Pada Posisi Yang Dilamar</td>

          </tr>

          <tr style="height: 31.5pt;">

          <td style="text-align: justify; vertical-align: top; border: 0.5pt solid windowtext; padding: 3px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; " colspan="27">{{ $peklam->tanggung_jawab }}</td>

          </tr>

          </tbody>

        </table>

        <!------------------------------------------------PEKERJAAN YANG DILAMAR-------------------------------------------->



         <!--p style="page-break-before: always"></p-->
         <p style="page-break-before: always"></p>


        <!----------------------------------------KEMAMPUAN BERBAHASA ASING------------------------------------------>



        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="24" /></colgroup>

          <tbody>

          <tr style="height: 16.0pt;">



          <tr style="height: 18.0pt;">

          <td style="width: 513pt; color: white; font-size: 14pt; font-weight: bold; font-family: Tahoma, sans-serif; text-align: left; vertical-align: middle; background: #366092; padding: 2px; font-style: normal; border: none; white-space: nowrap;" colspan="27">KEMAMPUAN BERBAHASA ASING</td>

          </tr>

          <tr style="height: 9.0pt;">

          <td style="text-align: center; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>  



          <td style="border-width: 0.5pt; border-style: solid; border-color: windowtext black windowtext windowtext; width: 152pt; font-size: 12pt; font-weight: bold; text-align: center; background: #95b3d7; padding: 0px; color: black; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="8">Bahasa</td>

          <td style="border-left: none; width: 152pt; font-size: 12pt; font-weight: bold; text-align: center; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; color: black; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" colspan="8">Lisan</td>

          <td style="border-left: none; width: 152pt; font-size: 12pt; font-weight: bold; text-align: center; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; background: #95b3d7; padding: 0px; color: black; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" colspan="8">Tulisan</td>

          </tr>

          @foreach($berba as $tampilberba)

          <tr style="height: 16.0pt;">

          <td style="border-width: 0.5pt; border-style: solid; border-color: windowtext black windowtext windowtext; font-size: 12pt; text-align: center; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; border-image: initial; white-space: nowrap;" colspan="8">{{ $tampilberba->jenis_bahasa }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" colspan="8">{{ $tampilberba->lisan_bahasa }}</td>

          <td style="border-left: none; font-size: 12pt; text-align: center; border-top: 0.5pt solid windowtext; border-right: 0.5pt solid windowtext; border-bottom: 0.5pt solid windowtext; border-image: initial; padding: 0px; color: black; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap;" colspan="8">{{ $tampilberba->tulisan_bahasa }}</td>

          </tr>

          @endforeach

          </tbody>

        </table>



        <!---------------------------------------------KEMAMPUAN BERBAHASA ASING--------------------------------------------->

        

        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 9pt;" /> <col style="width: 19pt;" span="15" /> <col style="width: 23pt;" /> <col style="width: 19pt;" span="8" /> <col style="width: 22pt;" /> <col style="width: 35pt;" /></colgroup>

          <tbody>

          <tr style="height: 10.5pt;">

          <td style="width: 526pt; text-align: center; vertical-align: middle; padding: 0px; color: black; font-size: 12pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          </tbody>

        </table>
        <!--p style="page-break-before: always"></p-->


        <!-------------------------------------------MEMPUNYAIN KEAHLIAN LAINNYA----------------------------------------->

        <table style="border-collapse: collapse; width: 730pt;" border="0" cellspacing="0" cellpadding="0"><colgroup><col style="width: 19pt;" span="27" /></colgroup>

          <tbody>

          <tr style="height: 18.0pt;">

          <td style="width: 513pt; color: white; font-size: 14pt; font-weight: bold; font-family: Tahoma, sans-serif; text-align: left; vertical-align: middle; background: #366092; padding: 2px; font-style: normal; border: none; white-space: nowrap;" colspan="27">MEMPUNYAI KEAHLIAN LAINNYA</td>

          </tr>

          <tr style="height: 9.0pt;">

          <td style="text-align: center; vertical-align: middle; padding: 0px; color: black; font-size: 11pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; border: none; white-space: nowrap;" colspan="27">&nbsp;</td>

          </tr>

          <tr style="height: 43.5pt;">

          <td style="text-align: center; vertical-align: top; border: 0.5pt solid windowtext; padding: 0px; color: black; font-size: 11pt; font-weight: 400; font-style: normal; font-family: Calibri, sans-serif; white-space: nowrap;" colspan="27">



          <?php if ((empty($keahlian->jenis_keahlian)) && (empty($keahlian->keahlian_lainnya))) {

            echo "Tidak Memiliki Keahlian Apapun";

          }else{

            echo $keahlian->jenis_keahlian; echo $keahlian->keahlian_lainnya; 

          }

          ?>



            </td>

          </tr>

          </tbody>

        </table>



        </div>

      </div>

        <!-- /.col -->

  </div>

</div>



</div>

<?php 

function nama_kota($id_kota){



    $findkota = DB::table('kabupaten')

    ->select('id_kab','nama_kab')

    ->where('id_kab', $id_kota)

    ->first();



    return $findkota->nama_kab;

}

function nama_prov($id_provinsi){



    $findprov = DB::table('provinsi')

    ->select('id_prov','nama')

    ->where('id_prov', $id_provinsi)

    ->first();



    return $findprov->nama;

}

?>



@endsection

@section('script')



<script type="text/javascript">

function printDiv(divName) {

     var printContents = document.getElementById(divName).innerHTML;

     var originalContents = document.body.innerHTML;



     document.body.innerHTML = printContents;



     window.print();



     document.body.innerHTML = originalContents;

}

</script>

@endsection