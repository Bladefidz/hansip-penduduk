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
	 * Cek data penduduk untuk publik
	 * @param [string] $[nik] [nomor induk kependudukan]
	 * @return [array] [] 
	 */
	public function get_access_public($nik)
	{
		$this->db->select('base.nama',
			'base.tempat_lahir',
			'base.tanggal_lahir',
			'base.jenis_kelamin',
			'base_updatable.alamat',
			'base_updatable.rt',
			'base_updatable.rw',
			'base_updatable.kelurahan',
			'base_updatable.kecamatan',
			'base_updatable.kabupaten',
			'base_updatable.provinsi'
		);
		$this->db->from('base');
		$this->db->join('base_updatable', 'base.nik = base_updatable.nik', 'left');
		$this->db->where('nik', $nik);
		$query = $this->db->get();
		return $query->row_array();
	}

	/**
	 * Mengakses data kependudukan data dengan hak akses level 0
	 * @param [string] $[nik] [nomor induk kependudukan]
	 * @return [array] [] 
	 */
	public function get_access_gov($nik)
	{
		$this->db->from('base');
		$this->db->join('base_updatable', 'base.nik = base_updatable.nik', 'left');
		$this->db->where('base.nik', $nik);
		$query = $this->db->get();
		return $query->row_array();
	}

	/**
	 * Memasukan data penduduk baru
	 * @param [string] $[base] [column dan record]
	 * @return [array] [] 
	 */
	public function insert($base)
	{
		$this->db->where('nik', $base->nik);
    	$this->db->insert('base_updatable', $base);
	}

	/**
	 * Memperbarui data penduduk
	 * @param [string] $[baseUpdatable] [column dan record]
	 * @return [array] [] 
	 */
	public function update($baseUpdatable)
	{
		$this->db->where('nik', $baseUpdatable->nik);
    	$this->db->update('base_updatable', $baseUpdatable);
	}
}