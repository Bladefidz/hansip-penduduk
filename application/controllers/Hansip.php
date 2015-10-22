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
	public function __construct()
	{
		parent::__construct();

		// $this->load->library('form_validation');
		$this->load->model('Penduduk');
	}

	/**
	 * [Melakukan pengambilan data melalui API]
	 * @return [array]      [hasil parsing model ke array]
	 */
	public function data_get()
	{
		if(!$this->get('nik'))
		{
			$this->response(NULL, 400);
		}

		$data = $this->Penduduk->get_access_0($this->get('nik'));
		$data['foto'] = base64_encode($data['foto']);
		
		if($data){
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
	public function data_post()
	{
		$jenis_kelamin;
	}
}