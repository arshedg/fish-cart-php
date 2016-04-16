<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends site {

	public function index()
	{
		$this->load->view('test/upload');
	}
	public function upload(){
		$data = $this->do_upload('userfile',"gallery-", 500 , 100 );
		var_dump($data);
	}
}
