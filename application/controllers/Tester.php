<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/REST_Controller.php');
require_once(APPPATH.'libraries/Cryptgenerator.php');

/**
* 
*/
class Tester extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Cryptgenerator');
		$this->load->library('encryption');
	}

	public function test_enc($int)
	{
		$this->Cryptgenerator = new Cryptgenerator();
		echo $this->Cryptgenerator->alphaEncrypt($int);
	}
}