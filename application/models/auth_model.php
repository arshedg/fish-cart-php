<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Arjun Raj M
 * 
 */
class Auth_Model extends App_Model {

	public function login($uname,$password){
		$this->db->select('auth_user.au_id , auth_user.au_name , auth_user.au_type ')
			->from('auth_user')
			->where('auth_user.au_uname',$uname)
			->where('auth_user.au_pwd',md5($password))
			->where('auth_user.status','1');
		$query = $this->db->get();
		if($query->num_rows()==1)
			return $query->row_array();
		else return NULL;
	
	}
	public function register_token($id,$session=NULL){
		$type = 'site';
		if(is_null($session)){
			$type = 'api';
			$auth_sessions = array(
				'ip_address'	=>	$this->input->ip_address() ,
				'user_agent'	=>	'api-call' ,
				'last_activity'	=>	time() ,
				'user_data'	=>	'' ,
				);
			$auth_sessions['session_id'] = base_convert(ip2long($id),10,36)
						.'-'.base_convert(ip2long($auth_sessions['ip_address']),10,36)
						.'-'.base_convert($auth_sessions['last_activity'],10,36)
						.'-'.base_convert(rand(10000,99999),10,36);
			$this->db->insert('auth_sessions', $auth_sessions); 
			$session = $auth_sessions['session_id'];
		} else {
			$this->db->select('*')->from('auth_sessions');
			$this->db->where('auth_sessions.session_id',$session);
			$query = $this->db->get();
			if($query->num_rows()==0){
				$auth_sessions = array(
					'session_id'	=>	$session ,
					'ip_address'	=>	$this->input->ip_address() ,
					'user_agent'	=>	$this->input->user_agent() ,
					'last_activity'	=>	time() ,
					'user_data'	=>	'' ,
					);
				$this->db->insert('auth_sessions', $auth_sessions); 
			}
		}
		$token = base_convert($id.'00',10,36).'-'.base_convert(time(),10,36).'-'.base_convert(rand(1000,9999),10,36);
		$this->db->set('at_token', $token);
		$this->db->set('au_id', $id);
		$this->db->set('at_type', $type);
		$this->db->set('session_id', $session);
		$this->db->insert('auth_token');
		return array( 'session' => $session , 'token' => $token );
	}
	public function get_token_info($token=FALSE,$session=NULL){
		if( $token == FALSE ) return NULL;
		$this->db->select('auth_user.au_id , auth_user.au_name , auth_user.au_type ')
			->from('auth_user')
			->join('auth_token', 'auth_user.au_id = auth_token.au_id')
			->join('auth_sessions', 'auth_sessions.session_id = auth_token.session_id')
			->where('auth_token.at_token',$token)
			->where('auth_token.status','1')
			->where('auth_user.status','1');
		if(!is_null($session)){
			$this->db->where('auth_sessions.session_id',$session);
		}
		$query = $this->db->get();
		if($query->num_rows()==1)
			return $query->row_array();
		return NULL;
	}
	public function logout($token){
		$this->db->where('at_token', $token);
		$this->db->update('auth_token', array( 'status' => '0'));
		return ($this->db->affected_rows()==1);
	}

	public function update_pwd($login_user, $old_pwd, $confirm_pwd){

		if(isset($login_user)){
			$this->db->select('au_pwd')
					 ->from('auth_user')
					 ->where('au_pwd',$old_pwd)
					 ->where('au_id',$login_user)
					 ->where('status',1);
			$query = $this->db->get();

			if($query->num_rows()==1){
				$this->db->where('au_pwd',$old_pwd)
						->where('au_id',$login_user)
						->update('auth_user',array('au_pwd'=>$confirm_pwd));
				return $this->db->affected_rows();
			}
		}
		return NULL;
	}
}
	