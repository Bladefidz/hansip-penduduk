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
		$this->db->insert('api_gateway', $identify);
	}

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
		$this->db->select('app_name, email, level, date_created');
		$this->db->from('api_gateway');
		$this->db->where('status', 0);
		$query = $this->db->get();
		return $query->row_array();
	}
}