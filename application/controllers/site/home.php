<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends site {

	public function index()
	{
		$menu['type']= "home";
		$this->load->view('site/template/header',$menu);
		$this->load->view('site/landing');
		$this->load->view('site/template/footer');
	}
	public function items($type)
	{
		$appender=time();		
		$str = file_get_contents('http://butler.ind-cloud.everdata.com/cart/api/product/list?number=9090909090&'.$appender);
		$data['items']= json_decode($str, true);

		$menu['type']= $type;
		$this->load->view('site/template/header',$menu);
		if($type=='fish'){ 
			$this->load->view('site/fish', $data);
		}
		else{ 
			$this->load->view('site/meat', $data);
		}
		$this->load->view('site/template/footer');
	}
	public function about()
	{
		$menu['type']= "about";
		$this->load->view('site/template/header',$menu);
		$this->load->view('site/about');
		$this->load->view('site/template/footer');
	}
	public function contact()
	{
		$menu['type']= "contact";
		$this->load->view('site/template/header',$menu);
		$this->load->view('site/contact');
		$this->load->view('site/template/footer');
	}
	public function enquiry(){

		$data['name']   = filter_var($_POST['u_name'], FILTER_SANITIZE_STRING);
    	$data['email']  = filter_var($_POST['u_mail'], FILTER_SANITIZE_EMAIL);
    	$data['phone']	= filter_var($_POST['u_phone'], FILTER_SANITIZE_NUMBER_INT);
    	$data['msg']    =  filter_var($_POST['u_msg'], FILTER_SANITIZE_STRING);

		
		$is_valid = (($data['name']!=false) 
					&&($data['email']!=false)
					&&($data['msg']!=false)
				);

		$content="<h4>Enquiry From : <b>".$data['name']."</b></h4>";
		$content.="<p>Email : ".$data['email']."</p>";
		$content.="<p>Phone : ".$data['phone']."</p>";
		$content.="<h4>Message :</h4>".$data['msg'];

		if($is_valid){

			$config = Array(
		     'protocol' => 'smtp', 
		     'mailtype' => 'html',
		     'charset' => 'iso-8859-1',
		     'wordwrap' => TRUE,
		     'smtp_timeout'=>600
			); 		 

			$config['smtp_host'] = "ssl://md-in-15.webhostbox.net";
	        $config['smtp_port'] = "465";
	        $config['smtp_user'] = "test@softecinfo.in";
	        $config['smtp_pass'] = "test1";
	 		
	 		$from = $config['smtp_user'];

	        $config['protocol'] = 'smtp';
	        $config['smtp_port'] = '465';
	        $config['smtp_from_name'] = 'FROM NAME';
	        $config['wordwrap'] = TRUE;
	        $config['newline'] = "\r\n";
	        $config['mailtype'] = 'html';
	 		
	 		$from_name= 'test';;
	 		$toAddr = 'midhun@qzion.com';
	 		$subject= 'Enquiry From : '.$data['name'];

			$this->load->library('email', $config);
			$this->email->from($from,$from_name);
			$this->email->to($toAddr ); 
			$this->email->subject($subject);			 
				 
			$this->email->message($content);
				   
			$send = $this->email->send();

			if($send!=false)  {
				$output = json_encode(array('type'=>'success', 'text' => 'Hi <b>'.$data["name"].' </b>Thank You For Choosing <b>Fishcart</b>.'));
        		echo $output;
        		return;
			} else {
				$output = json_encode(array('type'=>'error', 'text' => 'Sending failed. Try again..'));
        		echo $output;
        		return;
			}

		} else {
			$output = json_encode(array('type'=>'error', 'text' => 'All the fields required!..'));
        	echo $output;
        	return;
		}
			
	}
	public function filter_products($type,$filter=NULL) {
		$appender=time();		
		$str = file_get_contents('http://butler.ind-cloud.everdata.com/cart/api/product/list?number=9090909090&'.$appender);
		$data= json_decode($str, true);

		switch ($filter) {
			case 'regular':
				foreach ($data as $key => $val) {
					if($val['marketPrice']>299 || $val['type']=='MEAT'){
						unset($data[$key]);
					}
				}
				break;
			case 'premium':
				foreach ($data as $key => $val) {
					if($val['marketPrice']<299 || $val['type']=='MEAT'){
						unset($data[$key]);
					}
				}
				break;			
			default:
				foreach ($data as $key => $val) {
					if($val['type']=='MEAT'){
						unset($data[$key]);
					}
				}
				break;
		}
		echo json_encode($data);
	}
}
