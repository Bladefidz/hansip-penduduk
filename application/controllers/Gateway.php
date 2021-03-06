<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/REST_Controller.php');

/**
* 
*/
class Gateway extends REST_Controller
{
	protected function token_get()
	{
		$this->load->library('Cryptgenerator');
		$this->load->library('encryption');

		$id = 128;
		$physical = $this->get_physical_info();
		$appName = "Statistik_Pajak_Negara";
        $email = "hafidzjazuli@gmail.com";
        $region = "JAKARTA";
		$mac = str_replace('-', '', $physical[1]);

		$raw = $appName.'&'.$id.'&'.$region;
		$encModeOne = $appName.'&'.Cryptgenerator::encrypt($id).'&'.$region;
		$encModeTwo = $this->encryption->encrypt($encModeOne);
		
		// $key = bin2hex($this->encryption->create_key(7));
		// echo $key;
		echo urlencode($encModeTwo);
		
		// echo "Raw: ".$raw.'<br>';
		// echo "Encryption Mode 1: ".$encModeOne.'<br>';
		// echo "Encryption Mode 2: ".$encModeTwo.'<br>';
		echo '<br>'."Decryption Mode 2: ".$this->token_decript(($encModeTwo)).'<br>';
        $infoToken = explode('&', $this->encryption->decrypt($encModeTwo));
        var_dump($infoToken);
	}

	private function token_decript($toDec)
	{
		$this->load->library('Cryptgenerator');
		$this->load->library('encryption');

		return $this->encryption->decrypt(urldecode($toDec));
	}

	private function auth_process()
	{
		$this->load->library('auth');
		$this->auth->test('yo');
	}

	private function get_physical_info()
	{
		// $ipAddress = $_SERVER['REMOTE_ADDR'];
		$ipAddress = "10.212.0.1";

		#run the external command, break output into lines
		$arp = `arp -a $ipAddress`;
		$lines = explode("\n", $arp);

		#look for the output line describing our IP address
		foreach($lines as $line)
		{
		   $cols = preg_split('/\s+/', trim($line));
		   if ($cols[0]==$ipAddress)
		   {
		       return $cols;
		       break;
		   }
		}
	}
}