<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends authenticated_ajax {

	public function dashboard(){
		$this->load->view('admin/sub-views/sup_admin_dashboard');
	}

	public function password_reset(){
		$this->load->view('admin/sub-views/password_reset');
	}

	public function reset_password(){
		
		$login_user = $this->user['au_id'];
		$old_pwd = md5($this->input->post('old_pwd'));
		$new_pwd = md5($this->input->post('new_pwd'));
		$confirm_pwd = md5($this->input->post('confirm_pwd'));
		
		if($new_pwd==$confirm_pwd){
			$pwd_status = $this->auth_model->update_pwd($login_user,$old_pwd,$confirm_pwd);
			if(!is_null($pwd_status)){
				echo "disp_modal('password','Password reset successful','success');";
				echo "setTimeout(function(){location.reload();},1000);";
			} else {
				echo "disp_modal('password','current password incorrect..!','error');";
			}			
		}
		else {
			echo "disp_modal('password','Password mismatch. Enter a valid password.','error');";
		}
	}

}
?>