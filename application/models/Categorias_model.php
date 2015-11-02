<?php
class Categorias_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function create()
	{

		$data = array(
			'nombre' => $this->input->post('name'),
			'color' => $this->input->post('color')
			);
		return $this->db->insert('categorias', $data);
	}

	public function search($id)
	{
		$query = $this->db->get_where('categorias', array('id' => $id));

		return $query->row_array();
	}


	public function get_categories($page = 1)
	{
		$this->db->limit( 15,($page-1)*15);

		$query = $this->db->get('categorias');
        return $query->result_array();
	}



	public function delete($id)
	{
		$this->db->delete('categorias', array('id' => $id)); 
	}
}


?>