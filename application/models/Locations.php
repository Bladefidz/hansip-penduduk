<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Penduduk Model
*
* Model buat pengolahan data kependudukan
*/
class Locations extends CI_Model
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
	 * [get_prov_list description]
	 * @return [type] [description]
	 */
	public function get_prov_list()
	{
		$this->db->select('id, name');
		$this->db->from('provinces');
		$query = $this->db->get();
		return $query->result_array();
	}
}