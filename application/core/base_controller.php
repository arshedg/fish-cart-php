<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class base_controller extends CI_Controller {
	public $user;
	public function __construct() {
		parent::__construct();
		$this->load->helper('site_const');
		$this->load->helper('site_fns');
		$this->load->helper('url');
		// $this->load->helper('file');
		$this->load->model('auth_model'); 
		$this->load->library('upload');
		$this->load->library('image_lib'); 
		$this->user = NULL;
	}
	protected function quit(){
		$this->db->close();
		exit('');
	}
	
	protected function do_upload($field='userfile',$prefix="",$limit_original_width=NULL , $thumb_width=NULL , $path = './uploads/images'){ 
		$return = array();
		$config = array();
		$img_config = array();
		$config['upload_path'] = $path;
		$t_path = explode("/",$path);
		$t_path[]='thumb';
		$full_path='';
		foreach($t_path as $folder){
			$full_path.= $folder."/";
			if (!file_exists($full_path)) mkdir( $full_path , 0777);
			else chmod($full_path, 0777);
		}
		$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE; 
		$config['remove_spaces'] = TRUE;
		$is_single = false;
		if(!is_array($_FILES[$field]['name'])){
			$is_single = true;
			$_FILES[$field]['name'] = array($_FILES[$field]['name']);
			$_FILES[$field]['type'] = array($_FILES[$field]['type']);
			$_FILES[$field]['tmp_name'] = array($_FILES[$field]['tmp_name']);
			$_FILES[$field]['error'] = array($_FILES[$field]['error']);
			$_FILES[$field]['size'] = array($_FILES[$field]['size']); 
		}
		
		$files = $_FILES;
		$cpt = count($_FILES[$field]['name']);
		for($i=0; $i<$cpt; $i++){
			$config['file_name'] = $this->valid_file_name($prefix.$files[$field]['name'][$i]);
			$_FILES[$field]['name']= $files[$field]['name'][$i];
			$_FILES[$field]['type']= $files[$field]['type'][$i];
			$_FILES[$field]['tmp_name']= $files[$field]['tmp_name'][$i];
			$_FILES[$field]['error']= $files[$field]['error'][$i];
			$_FILES[$field]['size']= $files[$field]['size'][$i]; 
			$this->upload->initialize($config);
			if($this->upload->do_upload($field)==FALSE){
				$return[]=array( 'status' => FALSE , 'error' => $this->upload->display_errors('','') );
			} else {
				$data = $this->upload->data();
				$data['status'] = true;
				$return[]= $data;
			}
		}
		if(!is_null($limit_original_width)){
			$img_config['width']	= $limit_original_width;					
			$img_config['height']	= $limit_original_width*3;
			foreach($return as $single){
				if($single['status']){
					$img_config['source_image']	= $config['upload_path']."/".$single['file_name'];
					$this->image_lib->initialize($img_config);
					$this->image_lib->resize();		
				}
			}
		}
		if(!is_null($thumb_width)){
			$img_config['width']	= $thumb_width;					
			$img_config['height']	= $thumb_width*3;
			foreach($return as $single){
				if($single['status']){			
					$img_config['source_image']	= $config['upload_path']."/".$single['file_name'];
					$img_config['new_image']	= $config['upload_path']."/thumb/".$single['file_name'];
					$this->image_lib->initialize($img_config); 
					$this->image_lib->resize();	
				}
			}
		}
		if($is_single)
			return array_pop($return);
		return $return;
	}
	
	protected function do_upload_other($field='userfile',$extensions=NULL,$prefix='',$path='./uploads/files'){
		if(is_null($extensions)) return NULL;
		$return = array();
		$config = array();
		$config['upload_path'] = $path;
		$t_path = explode("/",$path);
		$full_path='';
		foreach($t_path as $folder){
			$full_path.= $folder."/";
			if (!file_exists($full_path)) mkdir( $full_path , 0777);
			else chmod($full_path, 0777);
		}
		$config['allowed_types'] = $extensions;
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE;
		$config['remove_spaces'] = TRUE;
		$is_single = false;
		if(!is_array($_FILES[$field]['name'])){
			$is_single = true;
			$_FILES[$field]['name'] = array($_FILES[$field]['name']);
			$_FILES[$field]['type'] = array($_FILES[$field]['type']);
			$_FILES[$field]['tmp_name'] = array($_FILES[$field]['tmp_name']);
			$_FILES[$field]['error'] = array($_FILES[$field]['error']);
			$_FILES[$field]['size'] = array($_FILES[$field]['size']); 
		}
		$files = $_FILES;
		$cpt = count($_FILES[$field]['name']);
		for($i=0; $i<$cpt; $i++){
			$config['file_name'] = $this->valid_file_name($prefix.$files[$field]['name'][$i]);
			$_FILES[$field]['name']= strtolower($files[$field]['name'][$i]);
			$_FILES[$field]['type']= $files[$field]['type'][$i];
			$_FILES[$field]['tmp_name']= $files[$field]['tmp_name'][$i];
			$_FILES[$field]['error']= $files[$field]['error'][$i];
			$_FILES[$field]['size']= $files[$field]['size'][$i]; 
			$this->upload->initialize($config);
			if($this->upload->do_upload($field)==FALSE){
				$return[]=array( 'status' => FALSE , 'error' => $this->upload->display_errors('', '') );
			} else {
				$data = $this->upload->data();
				$data['status'] = true;
				$return[]= $data;
			}
		}
		if($is_single)
			return array_pop($return);
		return $return;
	}
	
	protected function valid_file_name($name){
		$tmp = explode('.',$name);
		$ext = array_pop($tmp);
		$tmp = implode('-',$tmp);
		$tmp = url_title( $tmp,'-',true);
		if(strlen($tmp)>60) $tmp = substr($tmp,0,59);
		$tmp = strtolower( $tmp.'.'.$ext);
		$tmp = str_replace('_','-',$tmp );
		return $tmp;
	}
	
}