<?php

namespace App\Controllers;

class Kurikulum extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper('tgl');
        helper('auth');
    }

    public function index()
    {
        $data['title'] = "Dashboard | Kurikulum";
        $data['kurikulum'] = 1;

        return view('/kurikulum/dashboard', $data);
    }

    public function kelas()
    {
        $data['title'] = "Kelas | Kurikulum";
        $data['kurikulum'] = 2;

        $query = $this->db->table('kelas');
        $query->select('*');
        $hasilQuery = $query->get();
        $data['kelas'] = $hasilQuery->getResult();

        return view('/kurikulum/kelas/kelas', $data);
    }

    public function tambahkelas()
    {
        $data['title'] = "Kelas| Kurikulum";
        $data['kurikulum'] = 2;

        return view('/kurikulum/kelas/tambahkelas', $data);
    }

    public function prosestambahkelas()
    {
        if (!$this->validate([
            'nama_kelas' => [
                'rules' => 'required|is_unique[kelas.nama_kelas]',
                'errors' => [
                    'required' => 'Nama Kelas Harus diisi',
                    'is_unique' => 'Nama Kelas Tidak Boleh Sama'
                ]
            ],
            'deskripsi_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Kelas Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_kelas'            => $this->request->getVar('nama_kelas'),
            'deskripsi_kelas'       => $this->request->getVar('deskripsi_kelas')
        ];

        $builder = $this->db->table('kelas');
        $builder->insert($data);

        $data['kurikulum'] = 2;

        return redirect()->to(base_url('kurikulum/kelas/kelas'))->with('message', 'Data Berhasil Ditambahkan');
    }

    public function prosesubahkelas($id)
    {
        if (!$this->validate([
            'nama_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kelas Harus diisi',
                ]
            ],
            'deskripsi_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Kelas Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }



        $data = [
            'nama_kelas'              => $this->request->getVar('nama_kelas'),
            'deskripsi_kelas'         => $this->request->getVar('deskripsi_kelas'),
        ];

        $builder = $this->db->table('kelas');
        $builder->where('id_kelas', $id);
        $builder->update($data);

        $data['kurikulum'] = 2;

        return redirect()->to(base_url('kurikulum/kelas/'))->with('message', 'Data Berhasil Diubah');
    }

    public function hapuskelas($id)
    {
        $query = $this->db->table('kelas');
        $query->where('id_kelas', $id);
        $hasilQuery = $query->get();

        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }

        $query = $this->db->table('kelas');
        $query->delete(['id_kelas' => $id]);

        $data['kurikulum'] = 2;
        $data['title'] = "Kelas | Kurikulum";
        return redirect()->to(base_url('kurikulum/kelas/'))->with('message', 'Data Berhasil Dihapus');
    }
    // awal pengumuman

    public function pengumuman()
    {
        $data['title'] = "Berkas & Pengumuman | Kurikulum";
        $data['kurikulum'] = 5;

        $query = $this->db->table('pengumuman');
        $query->select('*');
        $hasilQuery = $query->get();
        $data['pengumuman'] = $hasilQuery->getResult();

        return view('/kurikulum/pengumuman/pengumuman', $data);
    }


    public function tambahpengumuman()
    {
        $data['title'] = "Pengumuman & Berkas| Kurikulum";
        $data['kurikulum'] = 5;

        return view('/kurikulum/pengumuman/tambahpengumuman', $data);
    }

    public function prosestambahpengumuman()
    {
        if (!$this->validate([
            'gambar' => [
                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[gambar,1024]',
            ],
            'berkas' => [
                'mime_in[berkas,application/pdf]',
                'max_size[berkas,1024]',
            ],
            'pengumuman' => [
                'rules' => 'required|is_unique[pengumuman.pengumuman]',
                'errors' => [
                    'required' => 'Nama Pengumuman Harus diisi',
                    'is_unique' => 'Nama Pengumuman Tidak Boleh Sama'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Pengumuman Harus diisi'
                ]
            ],
            'keyword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keyword Pengumuman Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $avatar   = $this->request->getFile('gambar');
        $namabaru = str_replace(' ', '-', $avatar->getName());
        $avatar->move(WRITEPATH . '../public/assets/upload/image/', $namabaru);
        // Create thumb
        $image = \Config\Services::image()
            ->withFile(WRITEPATH . '../public/assets/upload/image/' . $namabaru)
            ->fit(100, 100, 'center')
            ->save(WRITEPATH . '../public/assets/upload/image/thumbs/' . $namabaru);

        $dokumen   = $this->request->getFile('berkas');
        $namaDok = str_replace(' ', '-', $dokumen->getName());
        $dokumen->move(WRITEPATH . '../public/assets/upload/doc/', $namaDok);

        $idUser = user_id();

        $data = [
            'id_user'           => $idUser,
            'pengumuman'        => $this->request->getVar('pengumuman'),
            'deskripsi'         => $this->request->getVar('deskripsi'),
            'gambar'            => $namabaru,
            'berkas'            => $namaDok,
            'keyword'           => $this->request->getVar('keyword'),
            'created_at'        => date('Y-m-d H-i-s'),
        ];

        $builder = $this->db->table('pengumuman');
        $builder->insert($data);

        $data['kurikulum'] = 5;

        return redirect()->to(base_url('kurikulum/pengumuman/'))->with('message', 'Data Berita Berhasil Ditambahkan');
    }

    public function detailpengumuman($id)
    {
        $query = $this->db->table('pengumuman');
        $query->select('*');
        $query->join('users', 'users.id = pengumuman.id_user');
        $query->where('id_pengumuman', $id);
        $hasilQuery = $query->get();
        $dataPengumuman = $hasilQuery->getResult();
        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Berita Tidak ditemukan !');
        }

        foreach ($dataPengumuman as $det) :
            $data['id_pengumuman'] = $det->id_pengumuman;
            $data['username'] = $det->username;
            $data['pengumuman'] = $det->pengumuman;
            $data['berkas'] = $det->berkas;
            $data['gambar'] = $det->gambar;
            $data['deskripsi'] = $det->deskripsi;
            $data['keyword'] = $det->keyword;
            $data['created_at'] = $det->created_at;
        endforeach;

        $data['kurikulum'] = 5;

        $data['title'] = "Detail Pengumuman | Kurikulum";
        return view('/kurikulum/pengumuman/detailpengumuman', $data);
    }

    public function ubahpengumuman($id)
    {
        $query = $this->db->table('pengumuman');
        $query->select('*');
        $query->join('users', 'users.id = pengumuman.id_user');
        $query->where('id_pengumuman', $id);
        $hasilQuery = $query->get();
        $dataPengumuman = $hasilQuery->getResult();
        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Berita Tidak ditemukan !');
        }

        foreach ($dataPengumuman as $det) :
            $data['id_pengumuman'] = $det->id_pengumuman;
            $data['username'] = $det->username;
            $data['pengumuman'] = $det->pengumuman;
            $data['berkas'] = $det->berkas;
            $data['gambar'] = $det->gambar;
            $data['deskripsi'] = $det->deskripsi;
            $data['keyword'] = $det->keyword;
            $data['created_at'] = $det->created_at;
        endforeach;

        $data['kurikulum'] = 5;

        $data['title'] = "Ubah Pengumuman | Kurikulum";
        return view('/kurikulum/pengumuman/ubahpengumuman', $data);
    }



    public function prosesubahpengumuman($id)
    {
        $idUser = user_id();

        if (!$this->validate([
            'gambar' => [
                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[gambar,1024]',
            ],
            'berkas' => [
                'mime_in[berkas,application/pdf]',
                'max_size[berkas,1024]',
            ],
            'pengumuman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pengumuman Harus diisi',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Pengumuman Harus diisi'
                ]
            ],
            'keyword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keyword Pengumuman Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        if (!empty($_FILES['gambar']['name']) && !empty($_FILES['berkas']['name'])) {
            $avatar   = $this->request->getFile('gambar');
            $namabaru = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../public/assets/upload/image/', $namabaru);
            // Create thumb
            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../public/assets/upload/image/' . $namabaru)
                ->fit(100, 100, 'center')
                ->save(WRITEPATH . '../public/assets/upload/image/thumbs/' . $namabaru);

            $dokumen   = $this->request->getFile('berkas');
            $namaDok = str_replace(' ', '-', $dokumen->getName());
            $dokumen->move(WRITEPATH . '../public/assets/upload/doc/', $namaDok);


            $data = [
                'id_user'           => $idUser,
                'pengumuman'        => $this->request->getVar('pengumuman'),
                'deskripsi'         => $this->request->getVar('deskripsi'),
                'gambar'            => $namabaru,
                'berkas'            => $namaDok,
                'keyword'           => $this->request->getVar('keyword'),
                'updated_at'        => date('Y-m-d H-i-s'),
            ];
        } elseif (!empty($_FILES['berkas']['name'])) {
            $dokumen   = $this->request->getFile('berkas');
            $namaDok = str_replace(' ', '-', $dokumen->getName());
            $dokumen->move(WRITEPATH . '../public/assets/upload/doc/', $namaDok);

            $data = [
                'id_user'           => 1,
                'pengumuman'        => $this->request->getVar('pengumuman'),
                'deskripsi'         => $this->request->getVar('deskripsi'),
                'berkas'            => $namaDok,
                'keyword'           => $this->request->getVar('keyword'),
                'updated_at'        => date('Y-m-d H-i-s'),
            ];
        } elseif (!empty($_FILES['gambar']['name'])) {
            $avatar   = $this->request->getFile('gambar');
            $namabaru = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../public/assets/upload/image/', $namabaru);
            // Create thumb
            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../public/assets/upload/image/' . $namabaru)
                ->fit(100, 100, 'center')
                ->save(WRITEPATH . '../public/assets/upload/image/thumbs/' . $namabaru);

            $data = [
                'id_user'           => $idUser,
                'pengumuman'        => $this->request->getVar('pengumuman'),
                'deskripsi'         => $this->request->getVar('deskripsi'),
                'gambar'            => $namabaru,
                'keyword'           => $this->request->getVar('keyword'),
                'updated_at'        => date('Y-m-d H-i-s'),
            ];
        } else {
            $data = [
                'id_user'           => $idUser,
                'pengumuman'        => $this->request->getVar('pengumuman'),
                'deskripsi'         => $this->request->getVar('deskripsi'),
                'keyword'           => $this->request->getVar('keyword'),
                'updated_at'        => date('Y-m-d H-i-s'),
            ];
        }


        $builder = $this->db->table('pengumuman');
        $builder->where('id_pengumuman', $id);
        $builder->update($data);

        $data['kurikulum'] = 5;

        return redirect()->to(base_url('kurikulum/pengumuman/'))->with('message', 'Data Pengumuman Berhasil Diubah');
    }

    public function hapuspengumuman($id)
    {
        $query = $this->db->table('pengumuman');
        $query->where('id_pengumuman', $id);
        $hasilQuery = $query->get();

        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }

        $query = $this->db->table('pengumuman');
        $query->delete(['id_pengumuman' => $id]);

        $data['kurikulum'] = 5;
        $data['title'] = "Pengumuman | Kurikulum";
        return redirect()->to(base_url('kurikulum/pengumuman/'))->with('message', 'Data Berhasil Dihapus');
    }


    public function mapel()
    {
        $data['title'] = "Mata Pelajaran | Kurikulum";
        $data['kurikulum'] = 3;

        $query = $this->db->table('mapel');
        $query->select('*');
        $hasilQuery = $query->get();
        $data['mapel'] = $hasilQuery->getResult();

        return view('/kurikulum/mapel/mapel', $data);
    }


    public function tambahmapel()
    {
        $data['title'] = "Mata Pelajaran | Kurikulum";
        $data['kurikulum'] = 3;

        return view('/kurikulum/mapel/tambahmapel', $data);
    }

    public function prosestambahmapel()
    {
        if (!$this->validate([
            'nama_mapel' => [
                'rules' => 'required|is_unique[mapel.nama_mapel]',
                'errors' => [
                    'required' => 'Nama Mata Pelajaran Harus diisi',
                    'is_unique' => 'Nama Mata Pelajaran Tidak Boleh Sama'
                ]
            ],
            'deskripsi_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Mata Pelajaran Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_mapel'            => $this->request->getVar('nama_mapel'),
            'deskripsi_mapel'       => $this->request->getVar('deskripsi_mapel')
        ];

        $builder = $this->db->table('mapel');
        $builder->insert($data);

        $data['kurikulum'] = 3;

        return redirect()->to(base_url('kurikulum/mapel/mapel'))->with('message', 'Data Berhasil Ditambahkan');
    }

    public function prosesubahmapel($id)
    {
        if (!$this->validate([
            'nama_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Mata Pelajaran Harus diisi',
                ]
            ],
            'deskripsi_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Mata Pelajaran Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_mapel'            => $this->request->getVar('nama_mapel'),
            'deskripsi_mapel'       => $this->request->getVar('deskripsi_mapel')
        ];

        $builder = $this->db->table('mapel');
        $builder->where('id_mapel', $id);
        $builder->update($data);

        $data['kurikulum'] = 3;

        return redirect()->to(base_url('kurikulum/mapel/'))->with('message', 'Data Berhasil Diubah');
    }

    public function hapusmapel($id)
    {
        $query = $this->db->table('mapel');
        $query->where('id_mapel', $id);
        $hasilQuery = $query->get();

        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }

        $query = $this->db->table('mapel');
        $query->delete(['id_mapel' => $id]);

        $data['kurikulum'] = 3;
        $data['title'] = "Mata Pelajaran | Kurikulum";
        return redirect()->to(base_url('kurikulum/mapel/'))->with('message', 'Data Berhasil Dihapus');
    }
}
