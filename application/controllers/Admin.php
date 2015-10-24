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

		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Penduduk');
	}
	
	function index() {
		$this->load->view("index.php");
	}
	
	function register() {
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
		<th>Firstname</th>
		<th>Lastname</th>
		</tr>
		<tr>
		<td>John</td>
		<td>Doe</td>
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
	}

	function verify() {
		$this->load->view('header');
		$this->load->view('footer');
	}	
}