<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengumuman';
    protected $primaryKey       = 'id_pengumuman';
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'pengumuman', 'berkas', 'gambar', 'deskripsi', 'keyword', 'created_at',
        'update_at'
    ];
}
