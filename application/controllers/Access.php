<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Public Class
*
* Controller to Manage Public Access
*/
class Access extends CI_Controller
{
	/**
	 * Construct Admin
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Penduduk');
		$this->load->model('API');
		$this->load->model('Locations');

		$this->load->helper('url');
		
		$this->load->library('form_validation');
		$this->load->library('Cryptgenerator');
		$this->load->library('encryption');
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$this->register();
	}
	
	/**
	 * [register description]
	 * @return [type] [description]
	 */
	public function register()
	{
		if ($this->input->method() == 'get') {
			$data['prov'] = $this->Locations->get_prov_list();
			$this->load->view('layout/header');
			$this->load->view('register', $data);
			$this->load->view('layout/footer');
		} elseif ($this->input->method() == 'post') {
			$newAppIdentity = array(
				'app_name' => $this->input->post('app_name', TRUE),
				'email' => $this->input->post('email', TRUE),
				'instansi' => $this->input->post('instansi', TRUE),
				'alamat_instansi' => $this->input->post('alamat_instansi', TRUE),
				'region' => strtoupper(str_replace(' ', '_', $this->input->post('region', TRUE))),
				'level' => 0,
				'status' => 0,
				'date_created' => 'CURRENT_DATE()'
			);

			$this->API->register($newAppIdentity);
			redirect('Admin/register');
		}
	}
}