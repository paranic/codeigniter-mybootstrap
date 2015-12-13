<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->authenticate->logout();
		redirect('login');
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */