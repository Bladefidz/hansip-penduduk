<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Penduduk Model
*
* Model buat pengolahan data kependudukan
*/
class Penduduk extends CI_Model
{
	/**
	 * Penduduk Construct
	 * 
	 * Library database sudah autoload jadi gak perlu di call
	 */
	public function __construct()
	{
		# oalala
	}

	/**
	 * Mengakses data kependudukan data dengan hak akses level 0
	 * @param [string] $[nik] [nomor induk kependudukan]
	 * @return [array] [nama, tgl lahir, tempat lahir] 
	 */
	public function get_access_0($nik)
	{
		$this->db->select("nama, tempat_lahir, tanggal_lahir, foto");
		$query = $this->db->get_where('base', array('nik' => $nik));
		return $query->row_array();
	}
}