<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'berita';
    protected $primaryKey       = 'idBerita';
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'judul_berita', 'slug_judul', 'kategori', 'status', 'ringkasan', 'isi',
        'gambar', 'keyword', 'tanggal_post', 'waktu_post', 'idUser'
    ];
}
