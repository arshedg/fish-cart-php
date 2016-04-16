<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class site extends base_controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
}