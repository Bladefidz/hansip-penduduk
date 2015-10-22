<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/REST_Controller.php');

/**
* 
*/
class Gateway extends REST_Controller
{

	public function token_get()
	{
		$rawSatuan = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		$encSatuan = array('j', 'r', 's', 't', 'G', 'H', 'c', 'f', 'y', 'Z');		

		$id = $this->get('id');
		$physical = $this->get_physical_info();
		$access = "1-2-3-4";
		$region = "35";

		$encId = str_replace($rawSatuan, $encSatuan, $id);
		$mac = str_replace('-', '', $physical[1]);
		
		echo $encId.'<br>';
		echo $mac.'<br>';
	}

	private function get_physical_info()
	{
		// $ipAddress = $_SERVER['REMOTE_ADDR'];
		$ipAddress = "192.168.1.1";

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