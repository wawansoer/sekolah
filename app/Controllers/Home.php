<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper('auth');
        helper('tgl');
        $pager = \Config\Services::pager();
    }

    public function index()
    {
        $data['title'] = "SMA Muhammadiyah Kendari";
        $query = $this->db->table('berita');
        $query->select('judul_berita, slug_judul, gambar, ringkasan');
        $query->where('berita.status', 'Publish');
        $query->like('kategori', 'Berita');
        $query->orlike('kategori', 'Umum');
        $query->orlike('kategori', 'Pengumuman');
        $query->orderBy('prioritas', 'DESC');
        $query->limit(3);
        $hasilQuery = $query->get();
        $data['berita'] = $hasilQuery->getResult();

        $query = $this->db->table('kepsek');
        $query->select('*');
        $hasilQuery = $query->get();
        $data['sambutan'] = $hasilQuery->getResult();

        $query = $this->db->table('berita');
        $query->select('*');
        $query->where('berita.status', 'Publish');
        $query->where('berita.status', 'Publish');
        $query->like('kategori', 'Berita');
        $query->orlike('kategori', 'Umum');
        $query->orlike('kategori', 'Pengumuman');
        $query->limit(12);
        $hasilQuery = $query->get();
        $data['berita2nd'] = $hasilQuery->getResult();

        $query = $this->db->table('tendik');
        $query->select('*');
        $query->limit(6);
        $hasilQuery = $query->get();
        $data['tendik'] = $hasilQuery->getResult();

        $query = $this->db->table('sarpras');
        $query->select('*');
        $query->limit(6);
        $hasilQuery = $query->get();
        $data['sarpras'] = $hasilQuery->getResult();

        return view('/home/halaman_utama', $data);
    }

    public function berita($id)
    {
        $data['title'] = "Berita | SMA Muhammadiyah Kendari";
        $query = $this->db->table('berita');
        $query->select('*');
        $query->join('users', 'users.id = berita.idUser');
        $query->where('berita.status', 'Publish');
        $query->where('slug_judul', $id);
        $query->limit(1);
        $hasilQuery = $query->get();
        $data['berita'] = $hasilQuery->getResult();
        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Beri Tidak ditemukan !');
        } else {
            return view('/home/berita', $data);
        }
    }


    public function daftarberita()
    {
        $model = new \App\Models\BeritaModel();
        $cari = $this->request->getVar('cari');
        if (empty($cari)) {
            $data = [
                'berita' => $model->where('status', 'Publish')
                    ->whereIn('kategori', ['Berita', 'Umum'])
                    ->paginate(12, 'berita'),
                'pager' => $model->pager,
                'title' => "Berita | SMA Muhammadiyah Kendari",
            ];
        } else {
            $data = [
                'berita' => $model->where('status', 'Publish')
                    ->whereIn('kategori', ['Berita', 'Umum'])
                    ->like('judul_berita', $cari)->orLike('ringkasan', $cari)
                    ->orLike('isi', $cari)->paginate(12, 'berita'),
                'pager' => $model->pager,
                'title' => "Berita | SMA Muhammadiyah Kendari",
            ];
        }

        return view('/home/daftarberita', $data);
    }

    public function pengumuman($id)
    {
        $data['title'] = "Berita | SMA Muhammadiyah Kendari";
        $query = $this->db->table('pengumuman');
        $query->select('*');
        $query->join('users', 'users.id = pengumuman.id_user');
        $query->where('id_pengumuman', $id);
        $query->limit(1);
        $hasilQuery = $query->get();
        $data['pengumuman'] = $hasilQuery->getResult('array');
        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        } else {
            return view('/home/pengumuman', $data);
        }
    }


    public function daftarpengumuman()
    {
        $model = new \App\Models\PengumumanModel();
        $cari = $this->request->getVar('cari');
        if (empty($cari)) {
            $data = [
                'pengumuman' => $model->paginate(12, 'pengumuman'),
                'pager' => $model->pager,
                'title' => "Pengumuman | SMA Muhammadiyah Kendari",
            ];
        } else {
            $data = [
                'pengumuman' => $model->like('pengumuman', $cari)
                    ->orLike('deskripsi', $cari)
                    ->paginate(12, 'pengumuman'),
                'pager' => $model->pager,
                'title' => "Pengumuman | SMA Muhammadiyah Kendari",
            ];
        }

        return view('/home/daftarpengumuman', $data);
    }
}
