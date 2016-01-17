<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Cryptgenerator class
*
* Class to do encryption.
*/
class Cryptgenerator
{
	private $alphabet;
	private $minEncLen;

	public function __construct()
	{
		$this->alphabet = ['f', 'h', 'z', 'y', 'n', 'g', 't', 'w', 'p', 'u', 'v', 'o', 'l', 'c', 'i', 's', 'k', 'e', 'x', 'b', 'm', 'j', 'd', 'a', 'q', 'r'];
		$this->minEncLen = 16;
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

	public function alphaEncrypt($intToEnc)
	{
		$res = '';

		$strToEnc = (string)$intToEnc;
		$len = strlen($strToEnc);

		if (($len%2) == 0) {
			$key = 1;

			for($i=0; $i<=$len; $i+=2) {
				$pair = $strToEnc[$i].$strToEnc[$i+1];
				$res .= $this->pairEnc($pair, $key);
			}
		} else {
			$key = 3;
			$strToEnc = (string)$intToEnc;

			$single = $strToEnc[$len-1];
			$res .= $this->pairEnc($single, $key);

			if ($len > 1) {
				$strToEnc = substr($strToEnc, 0, -1);
				for($i=0; $i<($len-1); $i+=2) {
					$pair = $strToEnc[$i].$strToEnc[$i+1];
					$res .= $this->pairEnc($pair, $key);
				}
			}
		}

		if (strlen($res) <= $this->minEncLen) {
			$left = $this->minEncLen-strlen($res);
			$fill = array_slice($this->alphabet, $strToEnc[0], $left);
			foreach ($fill as $f) {
				$res .= $f;
			}
		}

		return $res;
	}

	private function pairEnc($pairInt, $key)
	{
		if ($pairInt <= 26) {
			return $this->alphabet[$pairInt] . $key*1;
		} elseif ($pairInt > 26 && $pairInt <= 53) {
			return $this->alphabet[$pairInt] . $key*2;
		} elseif ($pairInt > 53 && $pairInt <= 99) {
			return $this->alphabet[$pairInt] . $key*3;
		}
	}
}