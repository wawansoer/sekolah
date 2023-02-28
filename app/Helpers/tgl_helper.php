<?php

if (! function_exists('tgl_indo'))
{
	/**
	 * Checks to see if the user is logged in.
	 *
	 * @return bool
	 */
   function tgl_indo($waktu){
     $hari_array = array(
       'Minggu',
       'Senin',
       'Selasa',
       'Rabu',
       'Kamis',
       'Jumat',
       'Sabtu'
     );
     $hr = date('w', strtotime($waktu));
     $hari = $hari_array[$hr];
     $tanggal = date('j', strtotime($waktu));
     $bulan_array = array(
       1 => 'Januari',
       2 => 'Februari',
       3 => 'Maret',
       4 => 'April',
       5 => 'Mei',
       6 => 'Juni',
       7 => 'Juli',
       8 => 'Agustus',
       9 => 'September',
       10 => 'Oktober',
       11 => 'November',
       12 => 'Desember',
     );
     $bl = date('n', strtotime($waktu));
     $bulan = $bulan_array[$bl];
     $tahun = date('Y', strtotime($waktu));
     $jam = date( 'H:i:s', strtotime($waktu));

     //untuk menampilkan hari, tanggal bulan tahun jam
     //return "$hari, $tanggal $bulan $tahun $jam";

     //untuk menampilkan hari, tanggal bulan tahun
     return "$tanggal $bulan $tahun";
   }
}

?>
