<?php
class Main extends CI_Controller {

   function index()
   {

		 $data['title'] = 'Principal';

        $this->load->view('templates/header', $data);
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer', $data);

   }
}
?>