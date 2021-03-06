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

		$this->load->model('Penduduk');

		$this->baseCols = array(
			'nama',
			'tempat_lahir',
			'tanggal_lahir',
			'jenis_kelamin',
			'golongan_darah',
			'tanggal_diterbitkan',
			'nip_pencatat',
			'kewarganegaraan'
		);
		$this->baseUpdatableCols = array(
			'nik',
			'agama',
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
	 * [token_decript description]
	 * @param  [type] $toDec [description]
	 * @return [type]        [description]
	 */
	private function tokenDecript($token)
	{
		$this->load->library('Cryptgenerator');
		$this->load->library('encryption');

		return $this->encryption->decrypt(urldecode($token));
	}

	/**
	 * [tokenChecker description]
	 * @return [type] [description]
	 */
	private function tokenChecker($token)
	{
		$metaToken = $this->tokenDecript($token);

		if (!empty($metaToken)) {
			$infoToken = explode('&', $metaToken);

			$meta = array(
				'app_name' => $infoToken[0],
				'id' => $infoToken[1],
				'region' => $infoToken[2]
			);

			$decRes = $this->API->authId($meta['id']);
			
			if (!empty($decRes)) {
				return $decRes;
			}
		}
	}

	/**
	 * [Melakukan pengambilan data melalui API]
	 * @return [array]      [hasil parsing model ke array]
	 */
	public function data_get()
	{
		$this->load->model('API');

		if(!isset($_GET['token'])) {

			if ($this->get('nik')) {
				$data = $this->Penduduk->get_access_public($this->get('nik'));
				$this->response($data, 200);
			} else {
				$this->response(array('status' => 'not authenticate'), 406);
			}
			
		} else {
			$metaToken = $this->tokenDecript($this->get('token'));

			if (!empty($metaToken)) {
				$infoToken = explode('&', $metaToken);

				$meta = array(
					'app_name' => $infoToken[0],
					'id' => $infoToken[1],
					'region' => $infoToken[2]
				);

				$decRes = $this->API->authId($meta['id']);
				
				if (!empty($decRes)) {
					if ($decRes['status'] != '0') {
						if(!$this->get('nik') || !$field = $this->get('field', TRUE)) {
							$this->response(array('status' => 'bad request'), 400);
						} else {
							if(!$field = $this->get('field', TRUE)) {
								$data = $this->Penduduk->get_access_public($nik);
							} else {
								$selectCol = "";
								$cols = explode('-', $field);

								if(in_array('alamat_advanced', $cols)) {
									array_push($cols, 'rt', 'rw', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi');
								}

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
								
								$log = array(
									'id_app' => $meta['id'],
									'date' => date('Y-m-d G:i:s'),
									'field' => $selectCol,
									'method' => 'GET'
								);
								$this->API->logging($log);
							}
							
							if($data){
								if (isset($data['foto'])) {
									$data['foto'] = base64_encode($data['foto']);

									if ($this->get('format') == 'html') {
										$data['foto'] = '<img src="data:image/jpeg;base64,'.$data['foto'].'"/>';
									}
								}
								
								$this->response($data, 200);
							} else {
								$this->response(NULL, 404);
							}
						}
					}
				} else {
					$this->response(array('status' => 'forbidden'), 403);
				}
			} else {
				$this->response(array('status' => 'not authenticate'), 406);
			}
		}
	}

	/**
	 * [Melakukan input data melalui API]
	 * @return 
	 */
	protected function data_post()
	{
		$token = $this->get('token', TRUE);

		if(!$this->get('nik')) {
			$base = array();

			foreach ($this->baseCols as $key) {
				if (isset($_POST[$key])) {
					$base[$key] = $this->post($key);
				}
			}

			if ($this->Penduduk->insert($base)) {
				$log = array(
					'id_app' => $meta['id'],
					'date' => date('Y-m-d G:i:s'),
					'field' => $base,
					'method' => 'POST'
				);
				$this->API->logging($log);

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

	public function update_get()
	{
		$tokenRes = $this->tokenChecker($this->get('token', TRUE));
		if (!empty($tokenRes)) {
			if ($tokenRes['status'] == '1' && $tokenRes['level'] == '3') {
				$baseUpdatable = array();

				if ($this->get('nik')) {
					$baseUpdatable['nik'] = $this->get('nik');

					foreach ($this->baseUpdatableCols as $key) {
						if (isset($_GET[$key])) {
							$baseUpdatable[$key] = $this->get($key);
						}
					}

					if ($this->Penduduk->update($baseUpdatable)) {
						$log = array(
							'id_app' => $meta['id'],
							'date' => date('Y-m-d G:i:s'),
							'field' => $baseUpdatable,
							'method' => 'POST'
						);
						$this->API->logging($log);

						$this->response(array('status' => 'success'), 200);
					} else {
						$this->response(array('status' => 'failed'), 400);
					}
				}
			} else {
				$this->response(array('status' => 'success'), 303);
			}
		} else {
			$this->response(array('status' => 'success'), 404);
		}
	}

	public function insert_post()
	{
		$token = $this->get('token', TRUE);
		$tokenRes = $this->tokenChecker($this->get('token', TRUE));
		if (!empty($tokenRes)) {
			if ($tokenRes['status'] == '1' && $tokenRes['level'] == '3') {
				$base = array();

				foreach ($this->baseCols as $key) {
					if (isset($_POST[$key])) {
						$base[$key] = $this->post($key);
					}
				}

				if ($this->Penduduk->insert($base)) {
					$log = array(
							'id_app' => $meta['id'],
							'date' => date('Y-m-d G:i:s'),
							'field' => $base,
							'method' => 'POST'
						);
					$this->API->logging($log);

					$this->response(array('status' => 'success'), 200);
				} else {
					$this->response(array('status' => 'failed'), 400);
				}
			}
		}
	}
}