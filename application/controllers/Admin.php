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


        $this->data['title'] = 'Control panel  <small> News </small>';

        $this->data['news'] = $this->noticias_model->get_news();



        for ($i = 0; $i < count($this->data['news']); $i++) {

            $this->data['news'][$i]['autor'] = $this->usuarios_model->findById($this->data['news'][$i]['autor']);
            $this->data['news'][$i]['cat'] = $this->categorias_model->search($this->data['news'][$i]['cat']);
        }

        $this->load->view('templates/header2',  $this->data);

        $this->load->view('admin/index',$this->data);
        $this->load->view('templates/footer', $this->data);

    }

    function categories()
    {
        $this->data['title'] = 'Control panel <small> Categories </small>';

        $this->data['categories'] = $this->categorias_model->get_categories();

        $this->load->view('templates/header2',  $this->data);

        $this->load->view('admin/categories',$this->data);
        $this->load->view('templates/footer', $this->data);
    }

    function createCat()
    {

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('color', 'Color', 'required');

        $this->data['title'] = 'Control panel <small> Categories </small>';


        if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('templates/header2', $this->data);
            $this->load->view('admin/createCat', $this->data);
            $this->load->view('templates/footer', $this->data);
        }
        else
        {

          $this->categorias_model->create();


          $this->categories();

      }




  }

  function deleteCat()
  {
    $get = $this->uri->uri_to_assoc();

    if(!empty($get['id']))
    {
        $this->categorias_model->delete($get['id']);
    }


    $this->categories();

}

function create()
{

    $this->load->helper(array('form', 'url'));

    $this->load->library('form_validation');

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Body of the post', 'required');


    $this->data['cats'] = $this->categorias_model->get_categories();

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


function edit()
{

 $get = $this->uri->uri_to_assoc();


 if(!empty($get['id']))
 {


    $this->load->helper(array('form', 'url'));

    $this->load->library('form_validation');

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Body of the post', 'required');


    $this->data['cats'] = $this->categorias_model->get_categories();

    $this->data['new'] = $this->noticias_model->search($get['id']);


    $this->data['title'] = 'Edit New';


    if ($this->form_validation->run() == FALSE)
    {

        $this->load->view('templates/header2', $this->data);
        $this->load->view('admin/editNews', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    else
    {

      $this->noticias_model->create($this->data['logeado']);


      $this->index();

  }
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