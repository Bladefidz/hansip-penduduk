<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/REST_Controller.php');

/**
* Hansip Class
*
* Main controller to controll access flow
* Untuk get, punya rule url:
* 	[get html format: http://localhost/penduduk/hansip/data/nik/676/format/html]
*  	[get json format: http://localhost/penduduk/hansip/data/nik/676/format/json]
*  	[get xml format: http://localhost/penduduk/hansip/data/nik/676/format/xml]
*/
class Hansip extends REST_Controller
{
	/**
	 * [Melakukan pengambilan data melalui API]
	 * @return [array]      [hasil parsing model ke array]
	 */
	public function data_get()
	{
		if(!$this->get('token', TRUE)) {
			$this->response(array('status' => 'not authenticate'), 406);
		}
		
		if(!$this->get('nik')) {
			$this->response(array('status' => 'bad request899'), 400);
		}

		if(!$field = $this->get('field', TRUE)) {

		}

		$this->load->model('Penduduk');

		// GET
		foreach ($_GET as $key => $value) {
			# code...
		}
		$data = $this->Penduduk->get_access_gov($this->get('nik'));
		
		if($data){
			$data['foto'] = base64_encode($data['foto']);
			$this->response($data, 200);
		}
		else
		{
			$this->response(NULL, 404);
		}
	}

	/**
	 * [Melakukan input data melalui API]
	 * @return 
	 */
	protected function data_post()
	{
		$token = $this->get('token', TRUE);

		// $base = array(
		// 	'nama' => $this->post('tempat_lahir'),
		// 	'tanggal_lahir' => $this->post('tempat_lahir'),
		// 	'jenis_kelamin' => $this->post('jenis_kelamin'),
		// 	'golongan_darah' => $this->post('golongan_darah'),
		// 	'tanggal_diterbitkan' => $this->post('tanggal_diterbitkan'),
		// 	'nip_pencatat' => $this->post('nip_pencatat'),
		// 	'kewarganegaraan' => $this->post('kewarganegaraan')
		// );
		// $baseUpdatable = array(
		// 	'nik' => $this->post('nik'),
		// 	'foto' => $this->post('foto'),
		// 	'alamat' => $this->post('alamat'),
		// 	'rt' => $this->post('rt'),
		// 	'rw' => $this->post('rw'),
		// 	'kecamatan' => $this->post('kecamatan'),
		// 	'kelurahan' => $this->post('kelurahan'),
		// 	'kabupaten' => $this->post('kabupaten'),
		// 	'provinsi' => $this->post('provinsi'),
		// 	'status_perkawinan' => $this->post('status_perkawinan'),
		// 	'pekerjaan' => $this->post('pekerjaan'),
		// 	'pend_terakhir' => $this->post('pendidikan_terakhir')
		// );

		$this->load->model('Penduduk');

		if(!$this->get('nik')) {
			$base = array();
			$baseKey = array('nama',
				'tanggal_lahir',
				'jenis_kelamin',
				'golongan_darah',
				'tanggal_diterbitkan',
				'nip_pencatat',
				'kewarganegaraan'
			);

			foreach ($baseKey as $key) {
				if (isset($_POST[$key])) {
					$base[$key] = $this->post($key);
				}
			}

			if ($this->Penduduk->insert($base)) {
				$this->response(array('status' => 'success'));
			} else {
				$this->response(array('status' => 'failed'));
			}
		} else {
			$baseUpdatable = array();
			$baseUpdatableKey = array(
				'nik',
				'foto',
				'alamat',
				'rt',
				'rw',
				'kecamatan',
				'kelurahan',
				'kabupaten',
				'provinsi',
				'status_perkawinan',
				'pekerjaan',
				'pendidikan_terakhir'
			);

			foreach ($baseUpdatableKey as $key) {
				if (isset($_POST[$key])) {
					$baseUpdatableKey[$key] = $this->post($key);
				}
			}

			if ($this->Penduduk->update($baseUpdatable)) {
				$this->response(array('status' => 'success'));
			} else {
				$this->response(array('status' => 'failed'));
			}
		}
	}
}