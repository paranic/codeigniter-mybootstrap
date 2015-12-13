<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Default_Users extends CI_Migration {

	public function up()
	{
		/* users */
		$fields = array(
			'record_id' => array(
				'type' => 'INT',
				'auto_increment' => TRUE
			),
			'insert_at' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'update_at' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'deleted_at' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'email' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			'password' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'lastname' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'firstname' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('record_id', TRUE);
		$this->dbforge->create_table('users', TRUE);

		// add default user so we can initialy have a usable application
		$this->db->insert('users', array('email' => 'default@user.com', 'password' => 'default'));
	}

	public function down()
	{
		
	}

}
