<?php

namespace App\Controllers;

class AdminWeb extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper('auth');
        helper('tgl');
    }

    public function index()
    {
        $data['title'] = "Dashboard | Admin WEB";
        $data['nama'] = "Admin WEB";
        $data['jabatan'] = "Admin WEB";
        $data['adminWeb'] = 1;

        return view('/adminWeb/dashboard', $data);
    }
    public function berita()
    {
        $data['title'] = "Berita | Admin WEB";
        $data['nama'] = "Admin WEB";
        $data['jabatan'] = "Admin WEB";

        $query = $this->db->table('berita');
        $query->select('judul_berita, slug_judul, kategori, berita.status as stat, username, gambar,
            tanggal_post, isi, prioritas');
        $query->join('users', 'users.id = berita.idUser');
        $hasilQuery = $query->get();
        $data['berita'] = $hasilQuery->getResult();

        $data['adminWeb'] = 2;

        return view('/adminWeb/berita/berita', $data);
    }

    public function tambahBerita()
    {
        $data['title'] = "Tambah Berita | Admin WEB";
        $data['nama'] = "Admin WEB";
        $data['jabatan'] = "Admin WEB";
        $data['adminWeb'] = 2;

        return view('/adminWeb/berita/tambahBerita', $data);
    }

    public function prosestambahberita()
    {
        if (!$this->validate([
            'gambar' => [
                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[gambar,1024]',
            ],
            'judul_berita' => [
                'rules' => 'required|is_unique[berita.judul_berita]',
                'errors' => [
                    'required' => 'Judul Berita Harus diisi',
                    'is_unique' => 'Judul Berita Tidak Boleh Sama'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Berita Harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Berita Harus diisi'
                ]
            ],
            'prioritas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prioritas Berita Harus diisi'
                ]
            ],
            'ringkasan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ringkasan Berita Harus diisi'
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten Berita Harus diisi'
                ]
            ],
            'tanggal_publish' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Publish Berita Harus diisi'
                ]
            ],
            'jam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Publish Berita Harus diisi'
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

        $idUser = user_id();

        $data = [
            'idUser'            => $idUser,
            'judul_berita'      => $this->request->getVar('judul_berita'),
            'slug_judul'        => strtolower(url_title($this->request->getVar('judul_berita'))),
            'kategori'          => $this->request->getVar('kategori'),
            'status'            => $this->request->getVar('status'),
            'prioritas'         => $this->request->getVar('prioritas'),
            'ringkasan'         => $this->request->getVar('ringkasan'),
            'isi'               => $this->request->getVar('isi'),
            'gambar'            => $namabaru,
            'keyword'           => $this->request->getVar('keyword'),
            'tanggal_post'      => $this->request->getVar('tanggal_publish'),
            'waktu_post'        => $this->request->getVar('jam'),
            'tanggal'           => date('Y-m-d H-i-s'),
        ];

        $builder = $this->db->table('berita');
        $builder->insert($data);

        $data['adminWeb'] = 2;

        session()->setFlashdata('message', 'Selamat. Data anda telah disimpan.');
        return redirect()->to(base_url('adminWeb/berita/tambahBerita'))->with('message', 'Data Berita Berhasil Ditambahkan');
    }

    public function detailberita($id)
    {
        $query = $this->db->table('berita');
        $query->select('judul_berita, slug_judul, kategori, berita.status as stat, username, gambar,
            tanggal_post, isi, prioritas');
        $query->join('users', 'users.id = berita.idUser');
        $query->where('slug_judul', $id);
        $hasilQuery = $query->get();
        $databerita = $hasilQuery->getResult();
        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Berita Tidak ditemukan !');
        }

        foreach ($databerita as $berita) :
            $data['judul_berita'] = $berita->judul_berita;
            $data['isi'] = $berita->isi;
            $data['gambar'] = $berita->gambar;
            $data['username'] = $berita->username;
            $data['tanggal_post'] = $berita->tanggal_post;
            $data['slug_judul'] = $berita->slug_judul;
            $data['kategori'] = $berita->kategori;
            $data['stat'] = $berita->stat;
            $data['prioritas'] = $berita->prioritas;
        endforeach;

        $data['adminWeb'] = 2;

        $data['title'] = "Detail Berita | Admin WEB";
        return view('/adminWeb/berita/detailberita', $data);
    }

    public function hapusberita($id)
    {
        $query = $this->db->table('berita');
        $query->where('slug_judul', $id);
        $hasilQuery = $query->get();

        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Berita Tidak ditemukan !');
        }

        $query = $this->db->table('berita');
        $query->delete(['slug_judul' => $id]);

        $data['adminWeb'] = 2;
        $data['title'] = "Detail Berita | Admin WEB";
        return redirect()->to(base_url('adminWeb/berita/'))->with('message', 'Data Berita Berhasil Dihapus');
    }

    public function ubahberita($id)
    {
        $query = $this->db->table('berita');
        $query->select('*');
        $query->where('slug_judul', $id);
        $hasilQuery = $query->get();
        $databerita = $hasilQuery->getResult();
        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Berita Tidak ditemukan !');
        }

        foreach ($databerita as $berita) :
            $data['judul_berita'] = $berita->judul_berita;
            $data['isi'] = $berita->isi;
            $data['idBerita'] = $berita->idBerita;
            $data['gambar'] = $berita->gambar;
            $data['tanggal_post'] = $berita->tanggal_post;
            $data['slug_judul'] = $berita->slug_judul;
            $data['kategori'] = $berita->kategori;
            $data['status'] = $berita->status;
            $data['prioritas'] = $berita->prioritas;
            $data['tanggal_post'] = $berita->tanggal_post;
            $data['waktu_post'] = $berita->waktu_post;
            $data['keyword'] = $berita->keyword;
            $data['ringkasan'] = $berita->ringkasan;
        endforeach;

        $data['adminWeb'] = 2;

        $data['title'] = "Ubah Berita | Admin WEB";
        return view('/adminWeb/berita/ubahberita', $data);
    }

    public function prosesubahberita($id)
    {
        if (!$this->validate([
            'gambar' => [
                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[gambar,1024]',
            ],
            'judul_berita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Berita Harus diisi',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Berita Harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Berita Harus diisi'
                ]
            ],
            'prioritas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prioritas Berita Harus diisi'
                ]
            ],
            'ringkasan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ringkasan Berita Harus diisi'
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten Berita Harus diisi'
                ]
            ],
            'tanggal_publish' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Publish Berita Harus diisi'
                ]
            ],
            'jam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Publish Berita Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }


        if (!empty($_FILES['gambar']['name'])) {
            $avatar   = $this->request->getFile('gambar');
            $namabaru = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../public/assets/upload/image/', $namabaru);
            // Create thumb
            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../public/assets/upload/image/' . $namabaru)
                ->fit(100, 100, 'center')
                ->save(WRITEPATH . '../public/assets/upload/image/thumbs/' . $namabaru);

            $data = [
                'judul_berita'      => $this->request->getVar('judul_berita'),
                'slug_judul'        => strtolower(url_title($this->request->getVar('judul_berita'))),
                'kategori'          => $this->request->getVar('kategori'),
                'status'            => $this->request->getVar('status'),
                'prioritas'         => $this->request->getVar('prioritas'),
                'ringkasan'         => $this->request->getVar('ringkasan'),
                'isi'               => $this->request->getVar('isi'),
                'gambar'            => $namabaru,
                'keyword'           => $this->request->getVar('keyword'),
                'tanggal_post'      => $this->request->getVar('tanggal_publish'),
                'waktu_post'        => $this->request->getVar('jam'),
                'tanggal'           => date('Y-m-d H-i-s'),
            ];
        } else {
            $data = [
                'judul_berita'      => $this->request->getVar('judul_berita'),
                'slug_judul'        => strtolower(url_title($this->request->getVar('judul_berita'))),
                'kategori'          => $this->request->getVar('kategori'),
                'status'            => $this->request->getVar('status'),
                'prioritas'         => $this->request->getVar('prioritas'),
                'ringkasan'         => $this->request->getVar('ringkasan'),
                'isi'               => $this->request->getVar('isi'),
                'keyword'           => $this->request->getVar('keyword'),
                'tanggal_post'      => $this->request->getVar('tanggal_publish'),
                'waktu_post'        => $this->request->getVar('jam'),
                'tanggal'           => date('Y-m-d H-i-s'),
            ];
        }
        $builder = $this->db->table('berita');
        $builder->where('idBerita', $id);
        $builder->update($data);

        $data['adminWeb'] = 2;

        return redirect()->to(base_url('adminWeb/berita/'))->with('message', 'Data Berita Berhasil Diubah');
    }

    public function profilsekolah()
    {
        $data['title'] = "Profil Sekolah | Admin WEB";
        $data['nama'] = "Admin WEB";
        $data['jabatan'] = "Admin WEB";

        $query = $this->db->table('berita');
        $query->select('judul_berita, slug_judul, kategori, berita.status as stat, username, gambar,
            tanggal_post, isi, prioritas');
        $query->join('users', 'users.id = berita.idUser');
        $hasilQuery = $query->get();
        $data['berita'] = $hasilQuery->getResult();

        $data['adminWeb'] = 3;

        return view('/adminWeb/profilsekolah/home', $data);
    }

    public function sambutankepsek()
    {
        $data['adminWeb'] = 3;
        $data['title'] = "Sambutan Kepala Sekolah | Admin WEB";

        $query = $this->db->table('kepsek');
        $query->select('*');
        $hasilQuery = $query->get();
        $databerita = $hasilQuery->getResult();
        if (empty($hasilQuery)) {

            return view('/adminWeb/profilsekolah/formsambutan', $data);
        } else {

            foreach ($databerita as $berita) :
                $data['namakepsek'] = $berita->namakepsek;
                $data['idkepsek'] = $berita->idkepsek;
                $data['isi'] = $berita->isi;
                $data['foto'] = $berita->foto;
                $data['ringkasan'] = $berita->ringkasan;
            endforeach;

            return view('/adminWeb/profilsekolah/sambutankepsek', $data);
        }
    }

    public function prosesinputsambutan()
    {
        if (!$this->validate([
            'foto' => [
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[foto,1024]',
            ],
            'namakepsek' => [
                'rules' => 'required|is_unique[kepsek.namakepsek]',
                'errors' => [
                    'required' => 'Nama Kepala Sekolah Harus diisi',
                    'is_unique' => 'Nama Kepala Sekolah Tidak Boleh Sama'
                ]
            ],
            'ringkasan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ringkasan Sambutan Kepala Sekolah Harus diisi'
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sambutan Kepala Sekolah Harus diisi'
                ]
            ],
            'keyword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keyword Kepala Sekolah Berita Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $avatar   = $this->request->getFile('foto');
        $namabaru = str_replace(' ', '-', $avatar->getName());
        $avatar->move(WRITEPATH . '../public/assets/upload/image/', $namabaru);
        // Create thumb
        $image = \Config\Services::image()
            ->withFile(WRITEPATH . '../public/assets/upload/image/' . $namabaru)
            ->fit(100, 100, 'center')
            ->save(WRITEPATH . '../public/assets/upload/image/thumbs/' . $namabaru);

        $data = [
            'namakepsek'        => $this->request->getVar('namakepsek'),
            'isi'               => $this->request->getVar('isi'),
            'ringkasan'         => $this->request->getVar('ringkasan'),
            'foto'              => $namabaru,
            'keyword'           => $this->request->getVar('keyword'),
        ];

        $builder = $this->db->table('kepsek');
        $builder->insert($data);

        $data['adminWeb'] = 3;

        session()->setFlashdata('message', 'Selamat. Data anda telah disimpan.');
        return redirect()->to(base_url('adminWeb/sambutankepsek'))->with('message', 'Data Sambutan Kepala Sekolah Berhasil Disimpan');
    }

    public function ubahsambutan($id)
    {
        $query = $this->db->table('kepsek');
        $query->select('*');
        $query->where('idkepsek', $id);
        $hasilQuery = $query->get();
        $datasambutan = $hasilQuery->getResult();
        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Berita Tidak ditemukan !');
        }

        foreach ($datasambutan as $sambutan) :
            $data['idkepsek'] = $sambutan->idkepsek;
            $data['namakepsek'] = $sambutan->namakepsek;
            $data['isi'] = $sambutan->isi;
            $data['ringkasan'] = $sambutan->ringkasan;
            $data['foto'] = $sambutan->foto;
            $data['keyword'] = $sambutan->keyword;
        endforeach;

        $data['adminWeb'] = 3;

        $data['title'] = "Ubah Sambutan Kepala Sekolah | Admin WEB";
        return view('/adminWeb/profilsekolah/ubahsambutan', $data);
    }

    public function prosesubahsambutan($id)
    {
        if (!$this->validate([
            'foto' => [
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[foto,1024]',
            ],
            'namakepsek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kepala Sekolah Harus diisi',
                ]
            ],
            'ringkasan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ringkasan Sambutan Kepala Sekolah Harus diisi'
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sambutan Kepala Sekolah Harus diisi'
                ]
            ],
            'keyword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keyword Kepala Sekolah Berita Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }


        if (!empty($_FILES['foto']['name'])) {
            $avatar   = $this->request->getFile('foto');
            $namabaru = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../public/assets/upload/image/', $namabaru);
            // Create thumb
            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../public/assets/upload/image/' . $namabaru)
                ->fit(100, 100, 'center')
                ->save(WRITEPATH . '../public/assets/upload/image/thumbs/' . $namabaru);

            $data = [
                'namakepsek'        => $this->request->getVar('namakepsek'),
                'isi'               => $this->request->getVar('isi'),
                'ringkasan'         => $this->request->getVar('ringkasan'),
                'foto'              => $namabaru,
                'keyword'           => $this->request->getVar('keyword'),
            ];
        } else {
            $data = [
                'namakepsek'        => $this->request->getVar('namakepsek'),
                'isi'               => $this->request->getVar('isi'),
                'ringkasan'         => $this->request->getVar('ringkasan'),
                'keyword'           => $this->request->getVar('keyword'),
            ];
        }
        $builder = $this->db->table('kepsek');
        $builder->where('idkepsek', $id);
        $builder->update($data);

        $data['adminWeb'] = 3;

        return redirect()->to(base_url('adminWeb/sambutankepsek/'))->with('message', 'Data Sambutan Kepala Sekolah Berhasil Diubah');
    }

    public function tendik()
    {
        $data['title'] = "Tenaga Pendidik | Admin WEB";

        $query = $this->db->table('tendik');
        $query->select('*');
        $hasilQuery = $query->get();
        $data['tendik'] = $hasilQuery->getResult();

        $data['adminWeb'] = 4;

        return view('/adminWeb/tendik/tendik', $data);
    }

    public function tambahtendik()
    {
        $data['title'] = "Tambah Tenaga Pendidik| Admin WEB";
        $data['adminWeb'] = 4;

        return view('/adminWeb/tendik/tambahtendik', $data);
    }

    public function prosestambahtendik()
    {
        if (!$this->validate([
            'foto' => [
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[foto,1024]',
            ],
            'nama' => [
                'rules' => 'required|is_unique[tendik.nama]',
                'errors' => [
                    'required' => 'Nama tenaga pendidik Harus diisi',
                    'is_unique' => 'Nama tenaga pendidik Tidak Boleh Sama'
                ]
            ],
            'prioritas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prioritas Tenaga Pendidik Harus diisi'
                ]
            ],
            'facebook' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Facebook Harus diisi'
                ]
            ],
            'instagram' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Instgaram Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $avatar   = $this->request->getFile('foto');
        $namabaru = str_replace(' ', '-', $avatar->getName());
        $avatar->move(WRITEPATH . '../public/assets/upload/image/', $namabaru);
        // Create thumb
        $image = \Config\Services::image()
            ->withFile(WRITEPATH . '../public/assets/upload/image/' . $namabaru)
            ->fit(100, 100, 'center')
            ->save(WRITEPATH . '../public/assets/upload/image/thumbs/' . $namabaru);

        $idUser = user_id();

        $data = [
            'nama'              => $this->request->getVar('nama'),
            'prioritas'         => $this->request->getVar('prioritas'),
            'foto'            => $namabaru,
            'facebook'          => $this->request->getVar('facebook'),
            'instagram'         => $this->request->getVar('instagram'),
        ];

        $builder = $this->db->table('tendik');
        $builder->insert($data);

        $data['adminWeb'] = 4;

        return redirect()->to(base_url('adminWeb/tendik/'))->with('message', 'Data Berita Berhasil Ditambahkan');
    }

    public function detailtendik($id)
    {
        $query = $this->db->table('tendik');
        $query->select('*');
        $query->where('idTendik', $id);
        $hasilQuery = $query->get();
        $dataTendik = $hasilQuery->getResult();
        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tenaga Pendidik Tidak ditemukan !');
        }

        foreach ($dataTendik as $tendik) :
            $data['idTendik'] = $tendik->idTendik;
            $data['nama'] = $tendik->nama;
            $data['foto'] = $tendik->foto;
            $data['facebook'] = $tendik->facebook;
            $data['instagram'] = $tendik->instagram;
            $data['prioritas'] = $tendik->prioritas;
        endforeach;

        $data['adminWeb'] = 4;

        $data['title'] = "Detail Tenaga Pendidik | Admin WEB";
        return view('/adminWeb/tendik/detailtendik', $data);
    }

    public function ubahtendik($id)
    {
        $query = $this->db->table('tendik');
        $query->select('*');
        $query->where('idTendik', $id);
        $hasilQuery = $query->get();
        $dataTendik = $hasilQuery->getResult();
        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tenaga Pendidik Tidak ditemukan !');
        }

        foreach ($dataTendik as $tendik) :
            $data['idTendik'] = $tendik->idTendik;
            $data['nama'] = $tendik->nama;
            $data['foto'] = $tendik->foto;
            $data['facebook'] = $tendik->facebook;
            $data['instagram'] = $tendik->instagram;
            $data['prioritas'] = $tendik->prioritas;
        endforeach;

        $data['adminWeb'] = 4;

        $data['title'] = "Detail Tenaga Pendidik | Admin WEB";
        return view('/adminWeb/tendik/ubahtendik', $data);
    }

    public function prosesubahtendik($id)
    {
        if (!$this->validate([
            'foto' => [
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[foto,1024]',
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tenaga pendidik Harus diisi',
                ]
            ],
            'prioritas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prioritas Tenaga Pendidik Harus diisi'
                ]
            ],
            'facebook' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Facebook Harus diisi'
                ]
            ],
            'instagram' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Instgaram Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }


        if (!empty($_FILES['foto']['name'])) {
            $avatar   = $this->request->getFile('foto');
            $namabaru = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../public/assets/upload/image/', $namabaru);
            // Create thumb
            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../public/assets/upload/image/' . $namabaru)
                ->fit(100, 100, 'center')
                ->save(WRITEPATH . '../public/assets/upload/image/thumbs/' . $namabaru);

            $data = [
                'nama'              => $this->request->getVar('nama'),
                'prioritas'         => $this->request->getVar('prioritas'),
                'foto'            => $namabaru,
                'facebook'          => $this->request->getVar('facebook'),
                'instagram'         => $this->request->getVar('instagram'),
            ];
        } else {
            $data = [
                'nama'              => $this->request->getVar('nama'),
                'prioritas'         => $this->request->getVar('prioritas'),
                'facebook'          => $this->request->getVar('facebook'),
                'instagram'         => $this->request->getVar('instagram'),
            ];
        }
        $builder = $this->db->table('tendik');
        $builder->where('idTendik', $id);
        $builder->update($data);

        $data['adminWeb'] = 4;

        return redirect()->to(base_url('adminWeb/tendik/'))->with('message', 'Data Tenaga Pendidik Berhasil Diubah');
    }

    public function hapustendik($id)
    {
        $query = $this->db->table('tendik');
        $query->where('idTendik', $id);
        $hasilQuery = $query->get();

        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tenaga Pendidik Tidak ditemukan !');
        }

        $query = $this->db->table('tendik');
        $query->delete(['idTendik' => $id]);

        $data['adminWeb'] = 4;
        $data['title'] = "Detail Tendik | Admin WEB";
        return redirect()->to(base_url('adminWeb/tendik/'))->with('message', 'Data Berita Berhasil Dihapus');
    }

    public function sarpras()
    {
        $data['title'] = "Sarana & Prasarana | Admin WEB";

        $query = $this->db->table('sarpras');
        $query->select('*');
        $hasilQuery = $query->get();
        $data['sarpras'] = $hasilQuery->getResult();

        $data['adminWeb'] = 5;

        return view('/adminWeb/sarpras/sarpras', $data);
    }

    public function tambahsarpras()
    {
        $data['title'] = "Tambah Sarana & Prasarana | Admin WEB";
        $data['adminWeb'] = 5;

        return view('/adminWeb/sarpras/tambahsarpras', $data);
    }

    public function prosestambahsarpras()
    {
        if (!$this->validate([
            'foto' => [
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[foto,1024]',
            ],
            'nama' => [
                'rules' => 'required|is_unique[tendik.nama]',
                'errors' => [
                    'required' => 'Nama tenaga pendidik Harus diisi',
                    'is_unique' => 'Nama tenaga pendidik Tidak Boleh Sama'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $avatar   = $this->request->getFile('foto');
        $namabaru = str_replace(' ', '-', $avatar->getName());
        $avatar->move(WRITEPATH . '../public/assets/upload/image/', $namabaru);
        // Create thumb
        $image = \Config\Services::image()
            ->withFile(WRITEPATH . '../public/assets/upload/image/' . $namabaru)
            ->fit(100, 100, 'center')
            ->save(WRITEPATH . '../public/assets/upload/image/thumbs/' . $namabaru);

        $data = [
            'nama'              => $this->request->getVar('nama'),
            'foto'            => $namabaru,
        ];

        $builder = $this->db->table('sarpras');
        $builder->insert($data);

        $data['adminWeb'] = 5;

        return redirect()->to(base_url('adminWeb/sarpras/'))->with('message', 'Data Berita Berhasil Ditambahkan');
    }

    public function ubahsarpras($id)
    {
        $query = $this->db->table('sarpras');
        $query->select('*');
        $query->where('idSarpras', $id);
        $hasilQuery = $query->get();
        $dataSarpras = $hasilQuery->getResult();
        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Sarana & Prasarana Tidak ditemukan !');
        }

        foreach ($dataSarpras as $sarpras) :
            $data['idSarpras'] = $sarpras->idSarpras;
            $data['nama'] = $sarpras->nama;
            $data['foto'] = $sarpras->foto;
        endforeach;

        $data['adminWeb'] = 5;

        $data['title'] = "Ubah Data Sarana & Prasarana | Admin WEB";
        return view('/adminWeb/sarpras/ubahsarpras', $data);
    }

    public function prosesubahsarpras($id)
    {
        if (!$this->validate([
            'foto' => [
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[foto,1024]',
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Sarana & Prasarana Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }


        if (!empty($_FILES['foto']['name'])) {
            $avatar   = $this->request->getFile('foto');
            $namabaru = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../public/assets/upload/image/', $namabaru);
            // Create thumb
            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../public/assets/upload/image/' . $namabaru)
                ->fit(100, 100, 'center')
                ->save(WRITEPATH . '../public/assets/upload/image/thumbs/' . $namabaru);

            $data = [
                'nama'        => $this->request->getVar('nama'),
                'foto'              => $namabaru,
            ];
        } else {
            $data = [
                'nama'        => $this->request->getVar('nama'),
            ];
        }
        $builder = $this->db->table('sarpras');
        $builder->where('idSarpras', $id);
        $builder->update($data);

        $data['adminWeb'] = 5;

        return redirect()->to(base_url('adminWeb/sarpras/'))->with('message', 'Data Sarana & Prasarana Sekolah Berhasil Diubah');
    }

    public function hapussarpras($id)
    {
        $query = $this->db->table('sarpras');
        $query->where('idSarpras', $id);
        $hasilQuery = $query->get();

        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Sarana & Prasarana Tidak ditemukan !');
        }

        $query = $this->db->table('sarpras');
        $query->delete(['idSarpras' => $id]);

        $data['adminWeb'] = 5;
        $data['title'] = "Sarana & Prasarana | Admin WEB";
        return redirect()->to(base_url('adminWeb/sarpras/'))->with('message', 'Data Sarana & Prasarana Berhasil Dihapus');
    }
}
