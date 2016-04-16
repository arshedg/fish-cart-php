<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends authorized {

	public function index(){
		$this->load->view('admin/dashboard');
	}

	public function signout(){
		$this->logout();
	}
}
