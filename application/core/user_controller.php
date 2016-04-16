<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class user extends site {

	public function __construct()
	{
		parent::__construct();
		$this->user = $this->auth_model->get_token_info( $this->session->userdata('token') , $this->session->userdata('session_id') );
	}
	public function ajax_only($CTRL = 'dashboard#'){
		if($this->input->is_ajax_request()){
			//$this->quit();
		} else redirect(str_replace(base_url(),$CTRL ,current_url()));
	}
	public function logout($redirect=true,$path = 'admin/login' ){
		//$this->session->sess_destroy();
		$update['token'] = NULL;
		$this->session->set_userdata($update);
		if(is_array($this->user)){
			
		}
		if ($redirect) {
			redirect($path);
		}
	}
}
class unauthorized extends user {

	public function __construct()
	{
		parent::__construct();
		if(is_array($this->user)){
			redirect('admin');
		}
	}
}

class authorized extends user {
	
	public function __construct()
	{
		parent::__construct();
		if(!is_array($this->user)){
			redirect('admin/login');
		}

	}

}
class authenticated_ajax extends user {
	
	public function __construct()
	{
		parent::__construct();
		$this->ajax_only();
		if(!is_array($this->user)){
			header_404();
			out_json(array('ERROR'=>'unauthorized access'));
			$this->quit();
		}
	}

}