<?php

namespace App\Controllers;

class Kesiswaan extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper('tgl');
        helper('auth');
    }

    public function index()
    {
        $data['title'] = "Dashboard | Kesiswaan";
        $data['kesiswaan'] = 1;

        $db = db_connect();
        $query = $db->query('SELECT kelas.nama_kelas, 
                                SUM(IF(jenis_kelamin = 1, 1, 0)) as laki, 
                                SUM(IF(jenis_kelamin = 2, 1, 0)) as Perempuan  
                                from siswa inner join kelas on 
                                kelas.id_kelas  = siswa.id_kelas 
                                GROUP BY siswa.id_kelas 
                                ORDER BY siswa.id_kelas');
        $data['siswa'] = $query->getResult();

        $query = $db->query('SELECT SUM(IF(jenis_kelamin = 1, 1, 0)) as cow, 
                            SUM(IF(jenis_kelamin = 2, 1, 0)) as cew  from siswa');
        $data['jk'] = $query->getResult();

        return view('/kesiswaan/dashboard', $data);
    }

    public function siswa()
    {
        $data['title'] = "Siswa | Kesiswaan";
        $data['kesiswaan'] = 2;

        $query = $this->db->table('siswa');
        $query->select('*');
        $query->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $hasilQuery = $query->get();
        $data['siswa'] = $hasilQuery->getResult();

        return view('/kesiswaan/siswa/siswa', $data);
    }

    public function tambahsiswa()
    {
        $data['title'] = "Tambah Siswa | Kesiswaan";
        $data['kesiswaan'] = 2;

        $query = $this->db->table('kelas');
        $query->select('*');
        $hasilQuery = $query->get();
        $data['kelas'] = $hasilQuery->getResult();

        return view('/kesiswaan/siswa/tambahsiswa', $data);
    }

    public function prosestambahsiswa()
    {
        $data['title'] = "Tambah Siswa | Kesiswaan";
        $data['kesiswaan'] = 2;

        if (!$this->validate([
            'foto' => [
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[foto,512]',
            ],
            'nama' => [
                'rules' => 'required|is_unique[siswa.nama]|alpha_space',
                'errors' => [
                    'required' => 'Nama Siswa Harus diisi',
                    'is_unique' => 'Nama Siswa Tidak Boleh Sama',
                    'alpha_space' => 'Format Nama Siswa Tidak Valid',
                ]
            ],
            'nisn' => [
                'rules' => 'required|is_unique[siswa.nisn]|numeric',
                'errors' => [
                    'required' => 'NISN Harus diisi',
                    'is_unique' => 'NISN Tidak Boleh Sama',
                    'numeric' => 'Format NISN Tidak Dikenali',
                ]
            ],
            'nis' => [
                'rules' => 'required|is_unique[siswa.nis]|numeric',
                'errors' => [
                    'required' => 'NIS Harus diisi',
                    'is_unique' => 'NIS Tidak Boleh Sama',
                    'numeric' => 'Format NIS Tidak Dikenali',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Tempat Lahir Harus diisi',
                    'alpha_space' => 'Format Tempat Lahir Tidak Dikenali',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Siswa Harus diisi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jenis Kelamin Siswa Harus diisi',
                    'numeric' => 'Format Jenis Kelamin Siswa Tidak Dikenali',
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Agama Siswa Harus diisi',
                ]
            ],
            'angkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Angkatan Siswa Harus diisi',
                ]
            ],
            'alamat_domisili' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Alamat Domisili Siswa Harus diisi',
                ]
            ],
            'pos_domisili' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kode Pos Domisili Siswa Harus diisi',
                    'numeric' => 'Format Kode Pos Domisili Tidak Sesuai Format'
                ]
            ],
            'kontak_siswa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor Kontak Siswa Harus diisi',
                    'numeric' => 'Format Nomor Kontak Tidak Sesuai Format'
                ]
            ],
            'nama_bapak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ayah Siswa Harus diisi',
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu Siswa Harus diisi',
                ]
            ],
            'alamat_ortu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Alamat orang tua Siswa Harus diisi',
                ]
            ],
            'pos_orang_tua' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kode Pos orang tua Siswa Harus diisi',
                    'numeric' => 'Format Kode Pos orang tua Tidak Sesuai Format'
                ]
            ],
            'kontak_orangtua' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor Kontak Orang Tua Harus diisi',
                    'numeric' => 'Format Nomor Kontak Orang Tua Tidak Sesuai Format'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $avatar   = $this->request->getFile('foto');
        $namabaru = str_replace(' ', '-', $avatar->getName());
        $avatar->move(WRITEPATH . '../public/assets/upload/siswa/', $namabaru);
        // Create thumb
        $image = \Config\Services::image()
            ->withFile(WRITEPATH . '../public/assets/upload/siswa/' . $namabaru)
            ->fit(100, 100, 'center')
            ->save(WRITEPATH . '../public/assets/upload/siswa/thumbs/' . $namabaru);

        $data = [
            'nama'              => $this->request->getVar('nama'),
            'nisn'              => $this->request->getVar('nisn'),
            'nis'               => $this->request->getVar('nis'),
            'id_kelas'          => $this->request->getVar('id_kelas'),
            'alamat_domisili'   => $this->request->getVar('alamat_domisili'),
            'pos_domisili'      => $this->request->getVar('pos_domisili'),
            'tempat_lahir'      => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir'     => $this->request->getVar('tanggal_lahir'),
            'kontak_siswa'      => $this->request->getVar('kontak_siswa'),
            'foto'              => $namabaru,
            'agama'             => $this->request->getVar('agama'),
            'jenis_kelamin'     => $this->request->getVar('jenis_kelamin'),
            'nama_bapak'        => $this->request->getVar('nama_bapak'),
            'nama_ibu'          => $this->request->getVar('nama_ibu'),
            'alamat_ortu'       => $this->request->getVar('alamat_ortu'),
            'pos_orang_tua'     => $this->request->getVar('pos_orang_tua'),
            'kontak_orangtua'   => $this->request->getVar('kontak_orangtua'),
            'pendapatan_ortu'   => $this->request->getVar('pendapatan_ortu'),
            'angkatan'          => $this->request->getVar('angkatan'),
            'createdAt'         => date('Y-m-d h:i:s'),
            'status'            => 'Aktif'

        ];

        $this->db->transBegin();
        $builder = $this->db->table('siswa');
        $builder->insert($data);

        // ambil data siswa yang baru di input 
        $builder = $this->db->table('siswa')
            ->select('idSiswa')
            ->where('nama',  $this->request->getVar('nama'))
            ->where('nis',  $this->request->getVar('nis'))
            ->where('nisn',  $this->request->getVar('nisn'))
            ->get();
        $dataSiswa = $builder->getResult();

        // ambil bulan dan tahun saat ini 
        $tahun = date('Y');
        $bulan = date('m');

        //tarik periode saat ini 
        $tarikPeriode = $this->db->query("SELECT idPeriode, jumlah  from periode_spp
                                                        WHERE YEAR(awalPeriode) = $tahun 
                                                        AND MONTH(awalPeriode) = $bulan
                                                        AND YEAR (akhirPeriode) = $tahun
                                                        AND MONTH (akhirPeriode) = $bulan")
            ->getResult();

        foreach ($tarikPeriode as $periode) :
            $usePeriode = $periode->idPeriode;
            $useTagihan = $periode->jumlah;
        endforeach;

        // input tagihan pertama siswa baru
        foreach ($dataSiswa as $siswa) :
            $waktuTransaksi = date('Y-m-d h:i:s');
            $idTime = date('Ymd');
            $idPembayaran = md5($siswa->idSiswa . "0" . $usePeriode . "1" . $idTime);
            $this->db->query("INSERT INTO  pembSPP 
							(idPembayaran, idSiswa, idSpp, jumlah, waktu, keterangan) VALUES
							('$idPembayaran', $siswa->idSiswa, $usePeriode, -$useTagihan, '$waktuTransaksi', 'Inisiasi Tagihan')");
        endforeach;


        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return redirect()->to(base_url('kesiswaan/siswa/siswa'))->with('error', 'Tidak dapat menambahkan siswa. ');
        } else {
            $this->db->transCommit();
            return redirect()->to(base_url('kesiswaan/siswa/siswa'))->with('message', 'Data Berhasil Ditambahkan');
        }
    }

    public function detailsiswa($id)
    {
        $query = $this->db->table('siswa');
        $query->select('*');
        $query->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $query->where('idSiswa', $id);
        $hasilQuery = $query->get();
        $dataSiswa = $hasilQuery->getResult();

        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Siswa Tidak ditemukan !');
        }

        foreach ($dataSiswa as $siswa) :
            $data['idSiswa'] = $siswa->idSiswa;
            $data['nis'] = $siswa->nis;
            $data['nisn'] = $siswa->nisn;
            $data['nama'] = $siswa->nama;
            $data['nama_kelas'] = $siswa->nama_kelas;
            $data['alamat_domisili'] = $siswa->alamat_domisili;
            $data['pos_domisili'] = $siswa->pos_domisili;
            $data['tempat_lahir'] = $siswa->tempat_lahir;
            $data['tanggal_lahir'] = $siswa->tanggal_lahir;
            $data['kontak_siswa'] = $siswa->kontak_siswa;
            $data['agama'] = $siswa->agama;
            $data['jenis_kelamin'] = $siswa->jenis_kelamin;
            $data['foto'] = $siswa->foto;
            $data['nama_bapak'] = $siswa->nama_bapak;
            $data['nama_ibu'] = $siswa->nama_ibu;
            $data['alamat_ortu'] = $siswa->alamat_ortu;
            $data['pos_orang_tua'] = $siswa->pos_orang_tua;
            $data['kontak_orangtua'] = $siswa->kontak_orangtua;
            $data['pendapatan_ortu'] = $siswa->pendapatan_ortu;
            $data['angkatan'] = $siswa->angkatan;
            $data['status'] = $siswa->status;
        endforeach;

        $data['title'] = "Detail Siswa | Kesiswaan";
        $data['kesiswaan'] = 2;

        return view('/kesiswaan/siswa/detailsiswa', $data);
    }

    public function ubahsiswa($id)
    {
        $query = $this->db->table('siswa');
        $query->select('*');
        $query->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $query->where('idSiswa', $id);
        $hasilQuery = $query->get();
        $dataSiswa = $hasilQuery->getResult();

        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Siswa Tidak ditemukan !');
        } else {
            foreach ($dataSiswa as $siswa) :
                $data['idSiswa'] = $siswa->idSiswa;
                $data['id_kelas'] = $siswa->id_kelas;
                $data['nis'] = $siswa->nis;
                $data['nisn'] = $siswa->nisn;
                $data['nama'] = $siswa->nama;
                $data['nama_kelas'] = $siswa->nama_kelas;
                $data['alamat_domisili'] = $siswa->alamat_domisili;
                $data['pos_domisili'] = $siswa->pos_domisili;
                $data['tempat_lahir'] = $siswa->tempat_lahir;
                $data['tanggal_lahir'] = $siswa->tanggal_lahir;
                $data['kontak_siswa'] = $siswa->kontak_siswa;
                $data['agama'] = $siswa->agama;
                $data['jenis_kelamin'] = $siswa->jenis_kelamin;
                $data['foto'] = $siswa->foto;
                $data['nama_bapak'] = $siswa->nama_bapak;
                $data['nama_ibu'] = $siswa->nama_ibu;
                $data['alamat_ortu'] = $siswa->alamat_ortu;
                $data['pos_orang_tua'] = $siswa->pos_orang_tua;
                $data['kontak_orangtua'] = $siswa->kontak_orangtua;
                $data['pendapatan_ortu'] = $siswa->pendapatan_ortu;
                $data['angkatanDB'] = $siswa->angkatan;
                $data['status'] = $siswa->status;
            endforeach;

            $query = $this->db->table('kelas');
            $query->select('*');
            $hasilQuery = $query->get();
            $data['kelas'] = $hasilQuery->getResult();

            $data['title'] = "Ubah Data Siswa | Kesiswaan";
            $data['kesiswaan'] = 2;

            return view('/kesiswaan/siswa/ubahsiswa', $data);
        }
    }

    public function prosesubahsiswa($id)
    {
        if (!$this->validate([
            'foto' => [
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[foto,512]',
            ],
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Siswa Harus diisi',
                    'alpha_space' => 'Format Nama Siswa Tidak Valid',
                ]
            ],
            'nisn' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NISN Harus diisi',
                    'numeric' => 'Format NISN Tidak Dikenali',
                ]
            ],
            'nis' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NIS Harus diisi',
                    'numeric' => 'Format NIS Tidak Dikenali',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Tempat Lahir Harus diisi',
                    'alpha_space' => 'Format Tempat Lahir Tidak Dikenali',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Siswa Harus diisi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Siswa Harus diisi',
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Agama Siswa Harus diisi',
                ]
            ],
            'alamat_domisili' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Alamat Domisili Siswa Harus diisi',
                ]
            ],
            'pos_domisili' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kode Pos Domisili Siswa Harus diisi',
                    'numeric' => 'Format Kode Pos Domisili Tidak Sesuai Format'
                ]
            ],
            'kontak_siswa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor Kontak Siswa Harus diisi',
                    'numeric' => 'Format Nomor Kontak Tidak Sesuai Format'
                ]
            ],
            'nama_bapak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ayah Siswa Harus diisi',
                ]
            ],
            'angkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Angkatan Siswa Harus diisi',
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu Siswa Harus diisi',
                ]
            ],
            'alamat_ortu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Alamat orang tua Siswa Harus diisi',
                ]
            ],
            'pos_orang_tua' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kode Pos orang tua Siswa Harus diisi',
                    'numeric' => 'Format Kode Pos orang tua Tidak Sesuai Format'
                ]
            ],
            'kontak_orangtua' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor Kontak Orang Tua Harus diisi',
                    'numeric' => 'Format Nomor Kontak Orang Tua Tidak Sesuai Format'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }


        if (!empty($_FILES['foto']['name'])) {
            $avatar   = $this->request->getFile('foto');
            $namabaru = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../public/assets/upload/siswa/', $namabaru);
            // Create thumb
            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../public/assets/upload/siswa/' . $namabaru)
                ->fit(100, 100, 'center')
                ->save(WRITEPATH . '../public/assets/upload/siswa/thumbs/' . $namabaru);

            $data = [
                'nama'              => $this->request->getVar('nama'),
                'status'              => $this->request->getVar('status'),
                'nisn'              => $this->request->getVar('nisn'),
                'nis'               => $this->request->getVar('nis'),
                'id_kelas'          => $this->request->getVar('id_kelas'),
                'alamat_domisili'   => $this->request->getVar('alamat_domisili'),
                'pos_domisili'      => $this->request->getVar('pos_domisili'),
                'tempat_lahir'      => $this->request->getVar('tempat_lahir'),
                'tanggal_lahir'     => $this->request->getVar('tanggal_lahir'),
                'kontak_siswa'      => $this->request->getVar('kontak_siswa'),
                'foto'              => $namabaru,
                'agama'             => $this->request->getVar('agama'),
                'angkatan'             => $this->request->getVar('angkatan'),
                'jenis_kelamin'     => $this->request->getVar('jenis_kelamin'),
                'nama_bapak'        => $this->request->getVar('nama_bapak'),
                'nama_ibu'          => $this->request->getVar('nama_ibu'),
                'alamat_ortu'       => $this->request->getVar('alamat_ortu'),
                'pos_orang_tua'     => $this->request->getVar('pos_orang_tua'),
                'kontak_orangtua'   => $this->request->getVar('kontak_orangtua'),
                'pendapatan_ortu'   => $this->request->getVar('pendapatan_ortu'),
            ];
        } else {
            $data = [
                'nama'              => $this->request->getVar('nama'),
                'status'              => $this->request->getVar('status'),
                'nisn'              => $this->request->getVar('nisn'),
                'nis'               => $this->request->getVar('nis'),
                'id_kelas'          => $this->request->getVar('id_kelas'),
                'alamat_domisili'   => $this->request->getVar('alamat_domisili'),
                'pos_domisili'      => $this->request->getVar('pos_domisili'),
                'tempat_lahir'      => $this->request->getVar('tempat_lahir'),
                'tanggal_lahir'     => $this->request->getVar('tanggal_lahir'),
                'kontak_siswa'      => $this->request->getVar('kontak_siswa'),
                'agama'             => $this->request->getVar('agama'),
                'angkatan'             => $this->request->getVar('angkatan'),
                'jenis_kelamin'     => $this->request->getVar('jenis_kelamin'),
                'nama_bapak'        => $this->request->getVar('nama_bapak'),
                'nama_ibu'          => $this->request->getVar('nama_ibu'),
                'alamat_ortu'       => $this->request->getVar('alamat_ortu'),
                'pos_orang_tua'     => $this->request->getVar('pos_orang_tua'),
                'kontak_orangtua'   => $this->request->getVar('kontak_orangtua'),
                'pendapatan_ortu'   => $this->request->getVar('pendapatan_ortu'),
            ];
        }


        $builder = $this->db->table('siswa');
        $builder->where('idSiswa', $id);
        $builder->update($data);

        if ($builder) {
            return redirect()->to(base_url('kesiswaan/siswa/'))->with('message', 'Data Berita Berhasil Diubah');
        } else {
            return redirect()->to(base_url('kesiswaan/siswa/'))->with('error', 'Data Berita Berhasil Diubah');
        }
    }

    public function hapussiswa($id)
    {
        $query = $this->db->table('siswa');
        $query->where('idSiswa', $id);
        $hasilQuery = $query->get();

        if (empty($hasilQuery)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Siswa Tidak ditemukan !');
        } else {
            $query = $this->db->table('siswa');
            $query->delete(['idSiswa' => $id]);
            if ($query) {
                return redirect()->to(base_url('kesiswaan/siswa/'))->with('message', 'Data Berhasil Dihapus');
            } else {
                return redirect()->to(base_url('kesiswaan/siswa/'))->with('error', 'Data Tidak dapat Dihapus');
            }
        }
    }

    public function pengumuman()
    {
        $data['title'] = "Berkas & Pengumuman | kesiswaan";
        $data['kesiswaan'] = 3;

        $query = $this->db->table('pengumuman');
        $query->select('*');
        $hasilQuery = $query->get();
        $data['pengumuman'] = $hasilQuery->getResult();

        return view('/kesiswaan/pengumuman/pengumuman', $data);
    }


    public function tambahpengumuman()
    {
        $data['title'] = "Pengumuman & Berkas| Kesiswaan";
        $data['kesiswaan'] = 3;

        return view('/kesiswaan/pengumuman/tambahpengumuman', $data);
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

        $data['kesiswaan'] = 3;

        return redirect()->to(base_url('kesiswaan/pengumuman/'))->with('message', 'Data Berita Berhasil Ditambahkan');
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

        $data['kesiswaan'] = 3;

        $data['title'] = "Detail Pengumuman | kesiswaan";
        return view('/kesiswaan/pengumuman/detailpengumuman', $data);
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

        $data['kesiswaan'] = 3;

        $data['title'] = "Ubah Pengumuman | Kesiswaan";
        return view('/kesiswaan/pengumuman/ubahpengumuman', $data);
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
                'id_user'           => $idUser,
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

        $data['kesiswaan'] = 3;

        return redirect()->to(base_url('kesiswaan/pengumuman/'))->with('message', 'Data Pengumuman Berhasil Diubah');
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

        $data['kesiswaan'] = 3;
        $data['title'] = "Pengumuman | kesiswaan";
        return redirect()->to(base_url('kesiswaan/pengumuman/'))->with('message', 'Data Berhasil Dihapus');
    }
}
