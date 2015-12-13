<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layout_lib {

	var $ci;

	private $additional_css = [];
	private $additional_js = [];

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function load($layout_view, $body_view = null, $data = [])
	{
		if (!is_null($body_view))
		{
			$body = $this->ci->load->view($body_view, $data, TRUE);

			if (is_array($data))
			{
				array_push($data, ['body' => $body]);
			}
			else if (is_object($data))
			{
				$data->body = $body;
			}
		}

		$this->ci->load->view($layout_view, $data);
	}

	public function add_additional_css($path)
	{
		array_push($this->additional_css, $path);
	}

	public function print_additional_css()
	{
		echo '<!-- START OF Automated css -->' . PHP_EOL;
		foreach ($this->additional_css as $additional_css_path)
		{
			echo '<link href="' . $additional_css_path . '" rel="stylesheet">' . PHP_EOL;
		}
		echo '<!-- END OF Automated css -->' . PHP_EOL;
	}

	public function add_additional_js($path)
	{
		array_push($this->additional_js, $path);
	}

	public function print_additional_js()
	{
		echo '<!-- START OF Automated js -->' . PHP_EOL;
		foreach ($this->additional_js as $additional_js_path)
		{
			echo '<script src="' . $additional_js_path . '"></script>' . PHP_EOL;
		}
		echo '<!-- END OF Automated js -->' . PHP_EOL;
	}
}

/* End of file Layout_lib.php */
/* Location: ./application/libraries/Layout_lib.php */