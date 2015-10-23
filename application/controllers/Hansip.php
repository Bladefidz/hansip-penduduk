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
		$token = $this->get('token', TRUE);
		$field = $this->get('field', TRUE);
		
		if(!$this->get('nik'))
		{
			$this->response(NULL, 400);
		}

		$this->load->model('Penduduk');

		$data = $this->Penduduk->get_access_0($this->get('nik'));
		
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

		$penduduk = array(
			'nik' => $this->post('nik'),
			'foto' => $this->post('foto'),
			'alamat' => $this->post('alamat'),
			'rt' => $this->post('rt'),
			'rw' => $this->post('rw'),
			'kecamatan' => $this->post('kecamatan'),
			'kelurahan' => $this->post('kelurahan'),
			'status_perkawinan' => $this->post('status_perkawinan'),
			'pekerjaan' => $this->post('pekerjaan'),
			'pend_terakhir' => $this->post('pendidikan_terakhir')
		);

		$this->load->model('Penduduk');

		if ($this->Penduduk->update($penduduk)) {
			$this->response(array('status' => 'success'));
		} else {
			$this->response(array('status' => 'failed'));
		}
	}
}