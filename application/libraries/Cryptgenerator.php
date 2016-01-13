<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Cryptgenerator
{
	private alphabet;

	public function __construct()
	{
		$this->alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
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

	public static function encryptDummy($strToEnc)
	{
		if (len(strToEnc)%2 == 0) {
			for($i=0; $i<=len($this->alphabet), $i+=2) {
				$pair = substr($strToEnc, $i, $i+1);
				if ($strToEnc[]) {

				}
			}
		} else {

		}
	}
}