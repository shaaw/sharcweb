<?php
class Main extends MY_General {


    public function __construct()
    {
        parent::__construct();


    }

    function index()
    {

        $this->data['title'] = 'Principal';

        $this->load->view('templates/header',  $this->data);
        $this->load->view('main/index',$this->data);
        $this->load->view('templates/footer', $this->data);

    }


    function login()
    {

        $user = $this->input->post('login');
        $pass = $this->input->post('password');

        $resultado = $this->usuarios_model->search($user);

        if(!empty($resultado))
        {   


            if(hash_equals($resultado['password'], crypt($pass, $resultado['password'])))
            {
                $this->session->set_userdata('login', $user);
                $this->session->set_userdata('id_login', $resultado['id']);
            }else
            {
                $data['loginError'] = "User or password incorrect";
            }
        }else
        {
           $data['loginError'] = "User or password incorrect";
       }

        $this->data['title'] = 'Login';

       $this->load->view('templates/header', $this->data);
       $this->load->view('main/login',$this->data);
       $this->load->view('templates/footer', $this->data);
   }   

   function singin()
   {

    $this->load->helper(array('form', 'url'));

    $this->load->library('form_validation');
     $this->data['title'] = 'Sing in';

    $this->form_validation->set_rules('login', 'Username', 'required|is_unique[usuarios.login]');
    $this->form_validation->set_rules('pass1', 'Password', 'required');
    $this->form_validation->set_rules('pass2', 'Repeat Password', 'required|matches[pass1]');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[usuarios.email]');

    if ($this->form_validation->run() == FALSE)
    {
        $this->load->view('templates/header', $this->data);
        $this->load->view('main/singin', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    else
    {

        $this->usuarios_model->create();

        $this->load->view('templates/header', $this->data);
        $this->load->view('main/successSingin',$this->data);
        $this->load->view('templates/footer', $this->data);
    }



}

}
?>