<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{
		$this->load->view('login');
	}

	public function check()
	{
		if ($this->input->is_ajax_request() AND $this->input->method() == 'post')
		{
			$post = $this->input->post();

			$response = array();

			if (strlen($post['username']) > 0 AND strlen($post['password']) > 0)
			{
				$this->load->library('authenticate');
				if ($this->authenticate->login($post['username'], $post['password']))
				{
					$response['login_result'] = TRUE;
					$response['redirect'] = '/dashboard';
					echo json_encode($response);
					return ;
				}
				else
				{
					$response['login_result'] = FALSE;
					$response['message'] = 'invalid login';
					echo json_encode($response);
					return ;
				}
			}
			else
			{
				$response['login_result'] = FALSE;
				$response['message'] = 'missing username password';
				echo json_encode($response);
				return ;
			}
		}
	}
	
}

/* End of file login.php */
/* Location: ./application/controllers/Login.php */