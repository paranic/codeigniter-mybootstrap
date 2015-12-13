<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shell extends CI_Controller {

	public function index()
	{
		echo 'Available methods are:' . PHP_EOL;

		$class = new ReflectionClass($this);
		$methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
		foreach ($methods as $method)
		{
			if ($method->getDeclaringClass()->getName() === __CLASS__ AND $method->getName() != __FUNCTION__)
			{
				echo 'php index.php ' . __CLASS__ . ' ' . $method->getName() . PHP_EOL;
			}
		}
	}

	public function pull_project()
	{
		if (!is_cli())
		{
			echo 'This controller must run from command line interface only.' . PHP_EOL;
			return ;
		}

		exec('git pull');
		exec('chown ' . getmyuid() . ':' . getmygid() . ' ' . FCPATH . '.. -R');
		exec('chmod 0777 ' . APPPATH . 'cache');
		exec('chmod 0777 ' . APPPATH . 'logs');
	}

}
/* End of file Shell.php */
/* Location: ./application/controllers/Shell.php */