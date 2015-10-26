<?php
class Admin extends MY_General {


    public function __construct()
    {
        parent::__construct();

        if(!empty($this->data['logeado']) && $this->data['logeado']['permisos'] == 2)
        {
            ;
        } 
        else
        {
            $this->load->view('templates/header2',  $this->data);

            $this->load->view('templates/privileges',$this->data);
            $this->load->view('templates/footer', $this->data);
            die();
        }

    }

    function index()
    {


        $this->data['title'] = 'Control panel';

        $this->data['news'] = $this->noticias_model->get_news();

        for ($i = 0; $i < count($this->data['news']); $i++) {
            
            $this->data['news'][$i]['autor'] = $this->usuarios_model->findById($this->data['news'][$i]['autor']);
        }

        $this->load->view('templates/header2',  $this->data);

        $this->load->view('admin/index',$this->data);
        $this->load->view('templates/footer', $this->data);

    }


    function create()
    {

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Body of the post', 'required');
        
        $this->data['title'] = 'Crete News';


        if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('templates/header2', $this->data);
            $this->load->view('admin/createNews', $this->data);
            $this->load->view('templates/footer', $this->data);
        }
        else
        {

          $this->noticias_model->create($this->data['logeado']);


            $this->index();

         }


    }


    function deleteNews()
    {
        $get = $this->uri->uri_to_assoc();

        if(!empty($get['id']))
        {
            $this->noticias_model->delete($get['id']);
        }


        $this->index();

    }


}