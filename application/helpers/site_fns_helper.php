<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function api_post(){
	// http://stackoverflow.com/questions/19004783/reading-json-post-using-php
	$json = file_get_contents('php://input');
	if($json!='') return json_decode($json,true);
	else return NULL;
}

function out_json($content=NULL){
	header('Content-Type: application/json');
	if(!is_null($content)){
		if(is_array( $content))
			echo json_encode($content);
		else  echo $content;	
	}
}

function out_script($content=NULL){
	header('Content-Type: application/javascript');
	if(!is_null($content)) echo $content;
}

function text_clean($value){
	return htmlentities($value, ENT_QUOTES);
}

function text_dirty($value){
	return html_entity_decode( $value , ENT_QUOTES );
}

function text_plain($value){
	$cleaned = strip_tags($value);
	if($value == $cleaned ) return $cleaned;
	return text_plain($cleaned);
}

function header_404(){
	 header('HTTP/1.0 404 Not Found');
}