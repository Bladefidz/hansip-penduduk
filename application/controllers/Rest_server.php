<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_server extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');

        $this->load->view('rest_server');
    }

    public function test_post()
    {
    	if(!$this->input->get('nik')) {
    		$baseUpdatable = array(
    			'nik' => $this->input->post('nik');
    		);
    	}
    }
}
