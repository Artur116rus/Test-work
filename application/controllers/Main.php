<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		if(isset($_POST) && sizeof($_POST) > 0){
			//print_r($_POST);
			echo json_encode($_POST);
		} else {
			$this->load->view('main_view');
		}
	}
}
