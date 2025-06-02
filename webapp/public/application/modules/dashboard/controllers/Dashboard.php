<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->config->item('Template'); 
		$this->load->model('User_model');
		//$this->load->view('user/sweetalert2'); 
	?>
<script type="text/javascript" src="<?php echo base_url('assets/sweetalert2/dist/js/jquery-latest.js');?>"></script>
<script src="<?php echo base_url('assets/sweetalert2/dist/sweetalert-dev.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/sweetalert2/dist/sweetalert.css');?>"><?php  
	}
	
	public function index(){
		$ListSelect = array("title" => 'dashboard',"setting" => 'dashboard');
		$data = array("ListSelect" => $ListSelect);
		$data['content_view'] = 'dashboard';  
		$this->load->view('Template/Template',$data);
	}

	public function dashboard(){
		// $ListSelect = array("title" => 'dashboard2',"setting" => 'dashboard2');
		// $data = array("ListSelect" => $ListSelect); 
		// $data['pagewrapper_seeting'] = 1; 
		// $data['navbar_title'] = 'USER Title';  
		// $btn_list_status=1;
		// $data['btn_list_status'] = $btn_list_status; 
		// $data['navbar_title2'] = 'ADD USER';  
		// if($btn_list_status==1){ 
		// 	$this->load->view('modal_from1',$data);
		// }
		/**************/
		// $data['content_view'] = 'dashboard';
		$data['content_view'] = 'dashboard/dashboard3';
		$this->load->view('Template/Template',$data);
	} 
}