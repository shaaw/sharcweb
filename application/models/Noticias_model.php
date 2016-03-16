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
			'autor' => $user['id'],
			'imagen' => $this->input->post('imagen'),
			'cat' => $this->input->post('cat')
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


	public function getNoticiasCarrousel()
	{
		$query = $this->db->order_by('fecha','desc')->get_where('noticias',array('carrousel' => '1'));
		return $query->result_array();
	}


	public function update()
	{

		$data = array(
			'titulo' => $this->input->post('title'),
			'texto' => $this->input->post('text'),
			'imagen' => $this->input->post('imagen'),
			'cat' => $this->input->post('cat')
			);

		$this->db->where('id', $this->input->post('id'));

		return $this->db->update('noticias', $data);

	}

	public function setCarrousel($id)
	{
		$query = $this->db->get_where('noticias', array('id' => $id));


		$resultado = $query->row_array();

		$resultado['carrousel'] = '1';

		if($resultado['imagen'] != "")
		{
			$this->db->where('id', $resultado['id']);
			unset($resultado['id']);
			$this->db->update('noticias',$resultado);
		}
	}

	public function removeCarrousel($id)
	{
		$query = $this->db->get_where('noticias', array('id' => $id));

		$resultado = $query->row_array();
		
		$resultado['carrousel'] = '0';

		if($resultado['imagen'] != "")
		{
			$this->db->where('id', $resultado['id']);
			unset($resultado['id']);
			$this->db->update('noticias',$resultado);
		}
	}
}


?>