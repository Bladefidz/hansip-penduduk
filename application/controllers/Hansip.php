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
	private $baseCols = array();
	private $baseUpdatableCols = array();

	public function __construct()
	{
		parent::__construct();

		$this->baseCols = array('nama',
			'tanggal_lahir',
			'jenis_kelamin',
			'golongan_darah',
			'tanggal_diterbitkan',
			'nip_pencatat',
			'kewarganegaraan'
		);
		$this->baseUpdatableCols = array(
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
	}

	/**
	 * [Melakukan pengambilan data melalui API]
	 * @return [array]      [hasil parsing model ke array]
	 */
	public function data_get()
	{
		$this->load->model('Penduduk');

		if(!$this->get('token', TRUE)) {
			$this->response(array('status' => 'not authenticate'), 406);
		}
		
		if(!$this->get('nik') || !$field = $this->get('field', TRUE)) {
			$this->response(array('status' => 'bad request'), 400);
		}

		$data = $this->Penduduk->get_access_gov($this->get('nik'));
		if(!$field = $this->get('field', TRUE)) {
			$data = $this->Penduduk->get_access_public($nik);
		} else {
			$selectCol = "";
			$cols = explode('-', $field);

			foreach ($cols as $col) {
				if (in_array($col, $this->baseCols)) {
					$selectCol .= "base.".$col.","; 
				} elseif (in_array($col, $this->baseUpdatableCols)) {
					$selectCol .= "base_updatable.".$col.",";
				} else {
					continue;
				}
			}

			$data = $this->Penduduk->get_costum(substr_replace($selectCol, '', -1), $this->get('nik'));
		}
		
		if($data){
			if (isset($data['foto'])) {
				$data['foto'] = base64_encode($data['foto']);
			}
			
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

		$this->load->model('Penduduk');

		if(!$this->get('nik')) {
			$base = array();

			foreach ($this->baseCols as $key) {
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

			foreach ($this->baseUpdatableCols as $key) {
				if (isset($_POST[$key])) {
					$baseUpdatable[$key] = $this->post($key);
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