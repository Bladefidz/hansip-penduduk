<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Cryptgenerator
{
	public function __construct()
	{
		
	}

	public static function encrypt($strToEnc)
	{
		$rawSatuan = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		$encSatuan = array('jV', 'rt', 'sT', 'tD', 'Gp', 'Hq', 'cB', 'fm', 'yA', 'Zs');
		$rawPuluhan = array('10', '20', '30', '40', '50', '60', '70', '80', '90');
		$encPuluhan = array('jX', 'rT', 'sU', 'tP', 'gF', 'Hl', 'cD', 'f', 'y', 'Z');

		if (strlen($strToEnc) == 1) {
			$encRes = str_replace($rawSatuan, $encSatuan, $strToEnc);
		} else {
			$encRes = str_replace($rawPuluhan, $encPuluhan, $strToEnc);
		}

		return $encRes;
	}
}