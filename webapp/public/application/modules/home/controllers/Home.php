<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->config->item('Template');
	}
	public function index(){
		$ListSelect = array("title" => 'Home',"setting" => 'Home');
		$data = array("ListSelect" => $ListSelect);
		$data['content_view'] = 'dashboard2';
		$this->load->view('Template/Template',$data);
	} 
}