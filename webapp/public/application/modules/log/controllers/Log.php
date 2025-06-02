<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->config->item('Template');
	}
	public function index(){
		$ListSelect = array("title" => 'dashboard',"setting" => 'dashboard');
		$data = array("ListSelect" => $ListSelect);
		$data['content_view'] = 'dashboard';
		$this->load->view('Template/Template',$data);
	}
	public function history(){
		$ListSelect = array("title" => 'dashboard2',"setting" => 'dashboard2');
		$data = array("ListSelect" => $ListSelect);
		$data['content_view'] = 'dashboard2';
		$this->load->view('Template/Template',$data);
	}
	public function alerts(){
		$ListSelect = array("title" => 'dashboard2',"setting" => 'dashboard2');
		$data = array("ListSelect" => $ListSelect);
		$data['content_view'] = 'dashboard2';
		$this->load->view('Template/Template',$data);
	}
	public function signlog(){
		$ListSelect = array("title" => 'dashboard2',"setting" => 'dashboard2');
		$data = array("ListSelect" => $ListSelect);
		$data['content_view'] = 'dashboard2';
		$this->load->view('Template/Template',$data);
	}
	public function accesslog(){
		$ListSelect = array("title" => 'dashboard2',"setting" => 'dashboard2');
		$data = array("ListSelect" => $ListSelect);
		$data['content_view'] = 'dashboard2';
		$this->load->view('Template/Template',$data);
	}
	public function user(){
		$ListSelect = array("title" => 'dashboard2',"setting" => 'dashboard2');
		$data = array("ListSelect" => $ListSelect);
		$data['content_view'] = 'dashboard2';
		$this->load->view('Template/Template',$data);
	}
	public function historylog(){
		$ListSelect = array("title" => 'dashboard2',"setting" => 'dashboard2');
		$data = array("ListSelect" => $ListSelect);
		$data['content_view'] = 'dashboard2';
		$this->load->view('Template/Template',$data);
	}
}