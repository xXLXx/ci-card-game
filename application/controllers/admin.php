<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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

		$this->load->model('admin_model');
    }

	public function index()
	{
		$this->load->view('include/template', array(
			'content' => 'login'
			));
	}

	public function validate_login(){
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|callback_user_check');
		$this->form_validation->set_rules('password', 'Password', 'required|md5');

		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->set_waiting();
			redirect('admin/dashboard', 'refresh');
		}
	}

	public function user_check(){
		$userdata = $this->admin_model->get_user();
		if(sizeof($userdata) > 0){
			$this->session->set_userdata(array(
				'id'	=>	$userdata[0]['id'],
				'player_name'	=>	$userdata[0]['player_name']
				));
			return TRUE;
		}
		else{
			$this->form_validation->set_message('user_check', 'Incorrect Username or Password.');
			return FALSE;
		}
	}

	public function dashboard(){
		if($this->session->userdata('id')){
			$this->load->view('include/template', array(
				'content'	=>	'dashboard'
			));
		}
		else{
			redirect('admin/index', 'refresh');
		}
	}

	public function signup(){
		$this->load->view('include/template', array(
			'content' => 'signup'
			));
	}

	public function validate_signup(){
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|xss_clean|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('player_name', 'Player Name', 'required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			$this->signup();
		}
		else
		{
			$this->admin_model->add_user();
			$this->index();
		}
	}

	public function signout(){

		$this->unset_waiting();
		$this->session->unset_userdata('id');
		redirect('admin/index', 'refresh');
	}

	public function set_waiting(){
		// var_dump($this->config->item('dir_game').$id.$this->config->item('postfix')['waiting'].$this->config->item('ext_json')); exit();
    	write_file($this->config->item('dir_game').$this->session->userdata('id').$this->config->item('postfix')['waiting'].$this->config->item('ext_json'),
    		json_encode(array(
	    		'id'	=>	$this->session->userdata('id'),
	    		'player_name'	=>	$this->session->userdata('player_name')
    		)));
    }

    public function unset_waiting(){
    	unlink($this->config->item('dir_game').$this->session->userdata('id').$this->config->item('postfix')['waiting'].$this->config->item('ext_json'));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */