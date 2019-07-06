<?php 
class Admin_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_user(){
    	return $this->db->select(array('id', 'player_name'))
    		->from('users')
    		->where('username', $this->input->post('username'))
    		->where('password', md5($this->input->post('password')))
            ->get()->result_array();
    }

    function add_user(){
    	return $this->db->insert('users', array(
	    		'username'	=>	$this->input->post('username'),
	    		'password'	=>	$this->input->post('password'),
	    		'player_name'	=>	$this->input->post('player_name'),
	    		));
    }

}