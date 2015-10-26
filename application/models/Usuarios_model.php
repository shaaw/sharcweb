<?php
class Usuarios_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function create()
	{

		$cost = 10;

		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

// Prefix information about the hash so PHP knows how to verify it later.
// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
		$salt = sprintf("$2a$%02d$", $cost) . $salt;

// Value:
// $2a$10$eImiTXuWVxfM37uY4JANjQ==

// Hash the password with the salt
		$hash = crypt($this->input->post('pass1'), $salt);

		$data = array(
			'login' => $this->input->post('login'),
			'password' => $hash,
			'email' => $this->input->post('email'),
			'permisos' => 1
			);
		return $this->db->insert('usuarios', $data);
	}

	public function search($login)
	{
		$query = $this->db->get_where('usuarios', array('login' => $login));

		return $query->row_array();
	}

		public function findById($id)
	{
		$query = $this->db->get_where('usuarios', array('id' => $id));

		return $query->row_array();
	}
}


?>