<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class API extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * [request description]
	 * @param  [array] $indentity [description]
	 * @return [type]            [description]
	 */
	public function register($indentity)
	{
		$this->db->insert('api_gateway', $indentity);
	}

    /**
     * [authId description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function authId($id)
    {
        $this->db->select('status');
        $this->db->from('api_gateway');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

	/**
	 * [get_app_req description]
	 * @return [type] [description]
	 */
	public function get_app_pending_req()
	{
		$this->db->select('id, app_name, email, instansi, alamat_instansi, region, level, date_created');
		$this->db->from('api_gateway');
		$this->db->where('status', '0');
		$query = $this->db->get();
		return $query->result_array();
	}

    /**
     * [allow_app description]
     * @return [type] [description]
     */
    public function accept_app_req($id, $level)
    {
        $this->db->set('status', 1);
        $this->db->set('level', $level);
        $this->db->where('id', $id);
        $this->db->update('api_gateway');
    }
}