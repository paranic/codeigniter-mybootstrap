<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->view_data['page'] = 'dashboard';
	}

	public function index()
	{
		$this->layout_lib->load('main', '_dashboard', $this->view_data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */