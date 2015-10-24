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

	private function token_get()
	{
		$id = $this->get('id');
		$physical = $this->get_physical_info();
		$appName = "dummy";
		$mac = str_replace('-', '', $physical[1]);

		$raw = $appName.'&'.$id.'&'.$mac;
		$encModeOne = $appName.'&'.Cryptgenerator::encrypt($id).'&'.$mac;
		$encModeTwo = $this->encryption->encrypt($encModeOne);
		
		return $encModeTwo;
		
		// echo "Raw: ".$raw.'<br>';
		// echo "Encryption Mode 1: ".$encModeOne.'<br>';
		// echo "Encryption Mode 2: ".$encModeTwo.'<br>';
		// echo "Decryption Mode 2: ".$this->encryption->decrypt($encModeTwo).'<br>';
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
				'app_name' => $this->input->post('nama_aplikasi', TRUE),
				'email' => $this->input->post('email'),
				'level' => $this->input->post('level'),
				'status' => 0
			);

			$this->API->register($newAppIdentity);
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
			$status = $this->input->post('agree');

			if ($status === '1') {
				$to = "somebody@example.com, somebodyelse@example.com";
				$subject = "HTML email";
				$message = "
				<html>
				<head>
				<title>HTML email</title>
				</head>
				<body>
				<p>This email contains HTML Tags!</p>
				<table>
				<tr>
				<th>Nama Aplikasi</th>
				<th>API Key</th>
				</tr>
				<tr>
				<td>".$appName."</td>
				<td>".$apiKey."</td>
				</tr>
				</table>
				</body>
				</html>
				";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: <webmaster@example.com>' . "\r\n";
				$headers .= 'Cc: myboss@example.com' . "\r\n";

				mail($to,$subject,$message,$headers);
			} elseif($status == '2') {

			} else {

			}
		}
	}
}