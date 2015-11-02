<?php
class MY_General extends CI_Controller {

   public $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('noticias_model');
        $this->load->model('categorias_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');

         if(!empty($this->session->userdata('login')))
        {
            $this->data['logeado'] = $this->usuarios_model->search($this->session->userdata('login'));
        }

    }
}
?>