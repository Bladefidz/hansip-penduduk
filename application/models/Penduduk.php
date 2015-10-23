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
		$this->db->select('base.nama, base.tempat_lahir, base.tanggal_lahir, base_updatable.foto');
		$this->db->from('base');
		$this->db->join('base_updatable', 'base.nik = base_updatable.nik', 'left');
		$this->db->where('base.nik', $nik);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_data($rawPenduduk)
	{
		$this->db->where('nik',$rawPenduduk->nik);
    	$this->db->update('base_updatable',$rawPenduduk);
	}
}