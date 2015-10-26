<?php
class Noticias_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function create($user)
	{

		$data = array(
			'titulo' => $this->input->post('title'),
			'texto' => $this->input->post('text'),
			'autor' => $user['id']
			);
		return $this->db->insert('noticias', $data);
	}

	public function search($id)
	{
		$query = $this->db->get_where('noticias', array('id' => $id));

		return $query->row_array();
	}


	public function get_news($page = 1)
	{
		$this->db->limit( 15,($page-1)*15);

		$query = $this->db->order_by('fecha','desc')->get('noticias');
        return $query->result_array();
	}



	public function delete($id)
	{
		$this->db->delete('noticias', array('id' => $id)); 
	}
}


?>