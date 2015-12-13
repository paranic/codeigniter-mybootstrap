<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $view_data = [];

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged_in'))
		{
			$this->authenticate->logout();

			$this->load->helper('url');
			redirect('login');
			return ;
		}

		$this->logged_in_user = unserialize($this->session->userdata('logged_in_user'));
		$this->view_data['logged_in_user'] = $this->logged_in_user;

		$this->generate_menu();
	}

	private function generate_menu()
	{
		$this->view_data['menu'] = [];

		array_push($this->view_data['menu'], [
			'name' => 'dashboard',
			'link' => '/dashboard'
		]);

		array_push($this->view_data['menu'], [
			'name' => 'example',
			'link' => '#',
			'submenu' => [
				[
					'name' => 'submenu one',
					'link' => '#'
				],
				[
					'name' => 'submenu two',
					'link' => '#'
				]
			]
		]);

		array_push($this->view_data['menu'], [
			'name' => 'logout',
			'link' => '/logout'
		]);
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */