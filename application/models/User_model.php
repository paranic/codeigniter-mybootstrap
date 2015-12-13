<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	protected $table_name = 'users';

	public $email;
	public $password;
	public $firstname;
	public $lastname;

	public function __construct($properties = [])
	{
		parent::__construct($properties);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */