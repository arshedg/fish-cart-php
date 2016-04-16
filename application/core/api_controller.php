<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class api extends base_controller {
	public $post;
	public function __construct() {
		parent::__construct();
		$this->post = api_post();
		if(is_array($this->post)&&isset($this->post['token']))
			$this->user = $this->auth_model->get_token_info( $this->post['token'] );		
	}
	
}

class authorized_api extends api {
	
	public function __construct()
	{
		parent::__construct();
		if(!is_array($this->user)){
			header_404();
			out_json(array('ERROR'=>'unauthorized access'));
			$this->quit();
		}

	}

}