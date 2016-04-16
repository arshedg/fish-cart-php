<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends unauthorized {

	public function index(){
		$this->load->view('admin/login');
	}
	public function submit(){
		$login = $this->auth_model->login( $this->input->post('username') , $this->input->post('password') );
		if(is_null($login)){
			$this->load->view('admin/login',array('error'=>1));
		} else {
			$token = $this->auth_model->register_token( $login['au_id'] , $this->session->userdata('session_id') );
			unset($token['session']);
			$this->session->set_userdata($token);
			redirect('admin');
		}
	}
}
