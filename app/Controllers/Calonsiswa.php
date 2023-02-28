<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CalonSiswaModel;
use Myth\Auth\Entities\User;
use Dompdf\Dompdf;

class Calonsiswa extends Controller
{
	protected $calonSiswa;

	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->calonSiswa = new CalonSiswaModel();
		helper('tgl');
	}

	public function index()
	{
		//model initialize
		$data['title'] = "Pendaftaran Siswa Baru";

		$idUser = user_id();


		//ambil data pengguna
		$builder = $this->db->table('users');
		$builder->select('users.id as idUser, auth_groups.id as idRole, users.username as nama,
			auth_groups.description as jabatan');
		$builder->join('auth_groups_users', 'users.id = auth_groups_users.user_id');
		$builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$builder->where('users.id', user_id());
		$dataPengguna = $builder->get();
		$data['user'] = $dataPengguna->getResult();

		//ambil data pendaftaran
		$builder = $this->db->table('CalonSiswa');
		$builder->select('*');
		$builder->where('idUser', $idUser);
		$dataReg = $builder->get();

		//cek data pendaftar
		if ($dataReg->getResult()) {

			foreach ($data['user'] as $pengguna) :
				$data['nama'] = $pengguna->nama;
				$data['jabatan'] = $pengguna->jabatan;
				$data['idUser'] = $pengguna->idUser;
			endforeach;

			$data['pendaftar'] = $dataReg->getResult();

			foreach ($data['pendaftar'] as $pendaftar) :
				$data['idUser'] = $pendaftar->idUser;
				$data['idCalonSiswa'] = $pendaftar->idCalonSiswa;
				$data['noPendaftaran'] = $pendaftar->noPendaftaran;
				$data['tempatLahir'] = $pendaftar->tempatLahir;
				$data['tanggalLahir'] = $pendaftar->tanggalLahir;
				$data['nisn'] = $pendaftar->nisn;
				$data['namaLengkap'] = $pendaftar->namaLengkap;
				$data['alamatSiswa'] = $pendaftar->alamatSiswa;
				$data['agama'] = $pendaftar->agama;
				$data['noKontak'] = $pendaftar->noKontak;
				$data['jenisKelamin'] = $pendaftar->jenisKelamin;
				$data['sekolahAsal'] = $pendaftar->sekolahAsal;
				$data['namaWali'] = $pendaftar->namaWali;
				$data['alamatWali'] = $pendaftar->alamatWali;
				$data['agamaWali'] = $pendaftar->agamaWali;
				$data['pekerjaanWali'] = $pendaftar->pekerjaanWali;
				$data['pendapatanWali'] = $pendaftar->pendapatanWali;
				$data['kontakOrtu'] = $pendaftar->kontakOrtu;
				$data['created_at'] = $pendaftar->created_at;
			endforeach;

			return view('/siswabaru/statusRegistrasi', $data);
		} else {
			foreach ($data['user'] as $pengguna) :
				$data['nama'] = $pengguna->nama;
				$data['jabatan'] = $pengguna->jabatan;
				$data['idUser'] = $pengguna->idUser;
			endforeach;

			return view('/siswabaru/formulirRegistrasi', $data);
		}
	}

	public function simpan()
	{
		if (!$this->validate([
			'status' => [
				'rules' => 'required',
			],
			'noReg' => [
				'rules' => 'required',
			],
			'namaLengkap' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'nisn' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'tempatLahir' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'tanggalLahir' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'jenisKelamin' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'agama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'domisiliSiswa' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'noKontak' => [
				'rules' => 'required', 'is_unique[calonSiswa.noKontak]',
				'errors' => [
					'required' => '{field} Harus diisi',
					'is_unique' => 'Nomor anda masukan telah terdaftar dalam sistem kami'
				]
			],
			'sekolahAsal' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'namaWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'alamatWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'kontakWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'agamaWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'pekerjaanWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'pendapatanWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],

		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}

		$data = [
			'idUser' => $this->request->getVar('idUser'),
			'status' => $this->request->getVar('status'),
			'noPendaftaran' => $this->request->getVar('noReg'),
			'namaLengkap' => $this->request->getVar('namaLengkap'),
			'nisn' => $this->request->getVar('nisn'),
			'tempatLahir' => $this->request->getVar('tempatLahir'),
			'tanggalLahir' => $this->request->getVar('tanggalLahir'),
			'jenisKelamin' => $this->request->getVar('jenisKelamin'),
			'agama' => $this->request->getVar('agama'),
			'alamatSiswa' => $this->request->getVar('domisiliSiswa'),
			'noKontak' => $this->request->getVar('noKontak'),
			'sekolahAsal' => $this->request->getVar('sekolahAsal'),
			'namaLengkap' => $this->request->getVar('namaLengkap'),
			'namaWali' => $this->request->getVar('namaWali'),
			'alamatWali' => $this->request->getVar('alamatWali'),
			'kontakOrtu' => $this->request->getVar('kontakWali'),
			'agamaWali' => $this->request->getVar('agamaWali'),
			'pekerjaanWali' => $this->request->getVar('pekerjaanWali'),
			'pendapatanWali' => $this->request->getVar('pendapatanWali'),
		];

		$builder = $this->db->table('CalonSiswa');
		$builder->insert($data);

		session()->setFlashdata('message', 'Selamat. Data anda telah disimpan.');
		return redirect()->route('calonsiswa');
	}

	function ubahData($id)
	{
		$dataCasis = $this->calonSiswa->where('noPendaftaran', $id)->where('idUser', user_id())->findall();
		if (empty($dataCasis)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Calon Siswa Tidak ditemukan !');
		}
		$idUser = user_id();

		//ambil data pengguna
		$builder = $this->db->table('users');
		$builder->select('users.id as idUser, auth_groups.id as idRole, users.username as nama,
			auth_groups.description as jabatan');
		$builder->join('auth_groups_users', 'users.id = auth_groups_users.user_id');
		$builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$builder->where('users.id', user_id());
		$dataPengguna = $builder->get();
		$data['user'] = $dataPengguna->getResult();

		foreach ($data['user'] as $pengguna) :
			$data['nama'] = $pengguna->nama;
			$data['jabatan'] = $pengguna->jabatan;
			$data['idUser'] = $pengguna->idUser;
		endforeach;

		$data['casis'] = $dataCasis;

		foreach ($data['casis'] as $casis) :
			$data['idCalonSiswa'] = $casis['idCalonSiswa'];
			$data['noPendaftaran'] = $casis['noPendaftaran'];
			$data['namaLengkap'] = $casis['namaLengkap'];
			$data['nisn'] = $casis['nisn'];
			$data['tempatLahir'] = $casis['tempatLahir'];
			$data['tanggalLahir'] = $casis['tanggalLahir'];
			$data['jenisKelamin'] = $casis['jenisKelamin'];
			$data['agama'] = $casis['agama'];
			$data['alamatSiswa'] = $casis['alamatSiswa'];
			$data['noKontak'] = $casis['noKontak'];
			$data['sekolahAsal'] = $casis['sekolahAsal'];
			$data['namaWali'] = $casis['namaWali'];
			$data['alamatWali'] = $casis['alamatWali'];
			$data['kontakOrtu'] = $casis['kontakOrtu'];
			$data['agamaWali'] = $casis['agamaWali'];
			$data['pekerjaanWali'] = $casis['pekerjaanWali'];
			$data['pendapatanWali'] = $casis['pendapatanWali'];
		endforeach;

		$data['title'] = "Perbaharui Data Pendaftaran";

		return view('/siswabaru/ubahRegistrasi', $data);
	}

	function prosesubah($id)
	{
		if (!$this->validate([
			'namaLengkap' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'nisn' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'tempatLahir' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'tanggalLahir' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'jenisKelamin' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'agama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'alamatSiswa' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'noKontak' => [
				'rules' => 'required', 'is_unique[calonSiswa.noKontak]',
				'errors' => [
					'required' => '{field} Harus diisi',
					'is_unique' => 'Nomor anda masukan telah terdaftar dalam sistem kami'
				]
			],
			'sekolahAsal' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'namaWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'alamatWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'kontakOrtu' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'agamaWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'pekerjaanWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'pendapatanWali' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],

		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}

		$data = [
			'namaLengkap' => $this->request->getVar('namaLengkap'),
			'nisn' => $this->request->getVar('nisn'),
			'tempatLahir' => $this->request->getVar('tempatLahir'),
			'tanggalLahir' => $this->request->getVar('tanggalLahir'),
			'jenisKelamin' => $this->request->getVar('jenisKelamin'),
			'agama' => $this->request->getVar('agama'),
			'alamatSiswa' => $this->request->getVar('alamatSiswa'),
			'noKontak' => $this->request->getVar('noKontak'),
			'sekolahAsal' => $this->request->getVar('sekolahAsal'),
			'namaLengkap' => $this->request->getVar('namaLengkap'),
			'namaWali' => $this->request->getVar('namaWali'),
			'alamatWali' => $this->request->getVar('alamatWali'),
			'kontakOrtu' => $this->request->getVar('kontakOrtu'),
			'agamaWali' => $this->request->getVar('agamaWali'),
			'pekerjaanWali' => $this->request->getVar('pekerjaanWali'),
			'pendapatanWali' => $this->request->getVar('pendapatanWali'),
		];

		$builder = $this->db->table('CalonSiswa');
		$builder->where('noPendaftaran', $this->request->getVar('noPendaftaran'));
		$builder->where('idCalonSiswa', $this->request->getVar('idCalonSiswa'));
		$builder->update($data);


		if ($builder->update($data) === TRUE) {
			session()->setFlashdata('message', 'Selamat. Data anda telah diubah.');
			return redirect()->back()->withInput();
		} else {
			session()->setFlashdata('error', $this->validator->listErrors());
			session()->setFlashdata('gagal', 'Mohon Maaf ! Silahkan Cek Kembali Data Anda.');
			return redirect()->back()->withInput();
		}
	}

	public function cetak($id)
	{
		$dataCasis = $this->calonSiswa->where('noPendaftaran', $id)->findall();
		if (empty($dataCasis)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Calon Siswa Tidak ditemukan !');
		}

		$data['casis'] = $dataCasis;

		foreach ($data['casis'] as $casis) :
			$data['idCalonSiswa'] = $casis['idCalonSiswa'];
			$data['noPendaftaran'] = $casis['noPendaftaran'];
			$data['namaLengkap'] = $casis['namaLengkap'];
			$data['nisn'] = $casis['nisn'];
			$data['tempatLahir'] = $casis['tempatLahir'];
			$data['tanggalLahir'] = $casis['tanggalLahir'];
			$data['jenisKelamin'] = $casis['jenisKelamin'];
			$data['agama'] = $casis['agama'];
			$data['alamatSiswa'] = $casis['alamatSiswa'];
			$data['noKontak'] = $casis['noKontak'];
			$data['sekolahAsal'] = $casis['sekolahAsal'];
			$data['namaWali'] = $casis['namaWali'];
			$data['alamatWali'] = $casis['alamatWali'];
			$data['kontakOrtu'] = $casis['kontakOrtu'];
			$data['agamaWali'] = $casis['agamaWali'];
			$data['pekerjaanWali'] = $casis['pekerjaanWali'];
			$data['pendapatanWali'] = $casis['pendapatanWali'];
		endforeach;


		$filename = $data['namaLengkap'] . '-' . $data['noPendaftaran'];

		// instantiate and use the dompdf class
		$dompdf = new Dompdf();

		// load HTML content
		$dompdf->loadHtml(view('siswabaru/cetakFormulir', $data));

		// (optional) setup the paper size and orientation
		$dompdf->setPaper('A4', 'portait');

		// render html as PDF
		$dompdf->render();

		// output the generated pdf
		$dompdf->stream($filename);
	}
}
