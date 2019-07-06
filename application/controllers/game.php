<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
    }

  // 	public function set_battle($id1, $id2){
		// unset_waiting($id1);
		// unset_waiting($id2);
		// //start battle
  //   }

    public function get_all_requests(){
    	$files = get_filenames($this->config->item('dir_game'));
    	$filtered_files = array(
    		'waiting'	=>	array(),
    		'challenges'	=> array()
    		);
    	foreach ($files as $file) {
    		if(strpos($file, $this->config->item('postfix')['waiting'].$this->config->item('ext_json'))){
    			$file_contents = json_decode(read_file($this->config->item('dir_game').$file));
    			if($file_contents->{'id'} != $this->session->userdata('id')){
    				array_push($filtered_files['waiting'], $file_contents);
    			}
    		}
    		else if(strpos($file, $this->session->userdata('id').$this->config->item('postfix')['challenge'].$this->config->item('ext_json'))){
    			array_push($filtered_files['challenges'], json_decode(read_file($this->config->item('dir_game').$file)));
    		}
    	}
    	echo json_encode($filtered_files);
    }

    public function set_challenge($id){
    	$file_contents = json_encode(array(
	    		'id'	=>	$this->session->userdata('id'),
	    		'player_name'	=>	$this->session->userdata('player_name')
    		));
    	write_file($this->config->item('dir_game').$id.$this->config->item('postfix')['challenge'].$this->config->item('ext_json'), $file_contents);
    	echo json_encode($file_contents);
    }
	
}

/* End of file game.php */
/* Location: ./application/controllers/game.php */