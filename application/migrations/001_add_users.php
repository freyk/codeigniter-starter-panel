<?php if (! defined('BASEPATH')) exit('No direct script access');

class Migration_add_users extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '60'
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'active' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 1
			),
			'last_login' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
			'last_login_ip' => array(
				'type' => 'VARCHAR',
				'constraint' => 45,
				'null' => TRUE,
				'default' => NULL
			),
			'created_at' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
			'updated_at' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
		));
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
		
		// Insert demo user
		$this->db->insert('users', array('username' => 'admin', 'password' => sha1('password'), 'created_at' => date('Y-m-d H:i:s')));
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}