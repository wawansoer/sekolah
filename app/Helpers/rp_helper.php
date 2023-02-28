<?php

if (!function_exists('rp')) {

  function rp($angka)
  {

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
  }
}
