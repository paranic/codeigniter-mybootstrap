<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('url');

		if ($this->session->userdata('logged_in') === TRUE)
		{
			redirect('dashboard');
		}
		else
		{
			redirect('login');
		}
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */