<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Hansip Class
*
* Main controller to controll access flow
* Untuk get, punya rule url:
* 	[get html format: http://localhost/penduduk/hansip/data/nik/676/format/html]
*  	[get json format: http://localhost/penduduk/hansip/data/nik/676/format/json]
*  	[get xml format: http://localhost/penduduk/hansip/data/nik/676/format/xml]
*/
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Penduduk');
		$this->load->model('API');

		$this->load->helper('url');
		
		$this->load->library('form_validation');
		$this->load->library('Cryptgenerator');
		$this->load->library('encryption');
	}

	private function token_create($id, $appName, $email, $region)
	{
		$this->load->library('Cryptgenerator');
		$this->load->library('encryption');

		$raw = $appName.'&'.Cryptgenerator::encrypt($id).'&'.$region;
		$encModeOne = $appName.'&'.Cryptgenerator::encrypt($id).'&'.$region;
		$encModeTwo = $this->encryption->encrypt($encModeOne);
		
		return urlencode($encModeTwo);
	}
	
	public function index()
	{
		$this->load->view("register");
	}
	
	public function register()
	{
		if ($this->input->method() == 'get') {
			$this->load->view('register');
		} elseif ($this->input->method() == 'post') {
			$newAppIdentity = array(
				'app_name' => $this->input->post('app_name', TRUE),
				'email' => $this->input->post('email', TRUE),
				'instansi' => $this->input->post('instansi', TRUE),
				'alamat_instansi' => $this->input->post('alamat_instansi', TRUE),
				'region' => strtoupper(str_replace(' ', '_', $this->input->post('region', TRUE))),
				'level' => 0,
				'status' => 0,
				'date_created' => 'NOW()'
			);

			$this->API->register($newAppIdentity);
			redirect('Admin/register');
		}
	}

	public function verifikasi()
	{
		if ($this->input->method() == 'get') {
			$data['app'] = $this->API->get_app_pending_req();

			$this->load->view('header');
			$this->load->view('verification', $data);
			$this->load->view('footer');
		} elseif ($this->input->method() == 'post') {
			$appName = $this->input->post('app_name');
			$email = $this->input->post('email');
			$region = $this->input->post('region');
			$id = $this->input->post('id');
			$level = $this->input->post('level');
			
			$apiKey = $this->token_create($id, $appName, $region);

			$this->load->library('email');
			$this->email->from('no-reply@dukcapil.kemendagri.go.id', 'Dinas Kependudukan Republik Indonesia');
			$this->email->to($email);
			$this->email->subject('Accept Token Request');
			$message = "
			<html><head><title>Token Request</title></head><body>
			<table>
			<tr><th>Nama Aplikasi</th><th>API Key</th></tr>
			<tr><td>".$appName."</td><td>".$apiKey."</td></tr>
			</table>
			</body></html>";
			$this->email->message($message);
			
			if($this->email->send()) {
				// Update status
				$this->API->accept_app_req($id, $level);
				redirect('/admin/verifikasi');
			} else {
				echo "<script>alert('Gagal melakukan validasi!')</script>";
			}
		}
	}
}