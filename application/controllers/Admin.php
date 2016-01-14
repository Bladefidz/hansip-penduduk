<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Admin Class
*
* Administrator Controller
*/
class Admin extends CI_Controller
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
	 * [encryptor description]
	 * @return [type] [description]
	 */
	private function encryptor()
	{
		$enc = "";
		return $enc;
	}

	/**
	 * Create Token
	 * @param  [type] $id      [description]
	 * @param  [type] $appName [description]
	 * @param  [type] $email   [description]
	 * @param  [type] $region  [description]
	 * @return [type]          [description]
	 */
	private function token_create($id, $appName, $email, $region)
	{
		$this->load->library('Cryptgenerator');
		$this->load->library('encryption');

		$raw = $appName.'&'.Cryptgenerator::encrypt($id).'&'.$region;
		$encModeOne = $appName.'&'.Cryptgenerator::encrypt($id).'&'.$region;
		// $encModeTwo = $this->encryption->encrypt($encModeOne);
		
		// return urlencode($encModeTwo);
		return urlencode($encModeOne);
	}

	public function test_token()
	{
		echo $this->token_create('1', 'test', 'test@mail.com', 'jawa timur');
	}
	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$this->verifikasi();
	}

	/**
	 * [verifikasi description]
	 * @return [type] [description]
	 */
	public function verifikasi()
	{
		if ($this->input->method() == 'get') {
			$data['app'] = $this->API->get_app_pending_req();

			$this->load->view('layout/header');
			$this->load->view('verification', $data);
			$this->load->view('layout/footer');
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

	/**
	 * [log description]
	 * @return [type] [description]
	 */
	public function log()
	{
		if ($this->input->method() == 'get') {
			$data['logs'] = $this->API->get_log();

			$this->load->view('layout/header');
			$this->load->view('log_data', $data);
			$this->load->view('layout/footer');
		}
	}
}