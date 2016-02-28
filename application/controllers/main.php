<?php
class Main extends MY_General {


    public function __construct()
    {
        parent::__construct();


    }

    function index()
    {

        $get = $this->uri->uri_to_assoc();

        if(empty($get['page']))
        {
            $page = 1;
        }else
        {
            $page = $get['page'];
        }

        $this->data['news'] = $this->noticias_model->get_news($page);



        for ($i = 0; $i < count($this->data['news']); $i++) {

            $this->data['news'][$i]['autor'] = $this->usuarios_model->findById($this->data['news'][$i]['autor']);
            $this->data['news'][$i]['cat'] = $this->categorias_model->search($this->data['news'][$i]['cat']);
            $this->data['news'][$i]['texto'] = substr(parse_bbcode($this->data['news'][$i]['texto']),0,450);
        }
        $this->load->library('pagination');


        $config['base_url'] = base_url().'main/index/page/';
        $config['uri_segment'] = 4;
        $config['total_rows'] = 200;
        $config['per_page'] = 15;
        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';        


        $this->pagination->initialize($config);

        $this->data['pagination'] = $this->pagination->create_links();


        $this->data['carrousel'] = $this->noticias_model->getNoticiasCarrousel();

        $this->data['title'] = 'News';

        $this->load->view('templates/header',  $this->data);
        $this->load->view('main/index',$this->data);
        $this->load->view('templates/footer', $this->data);

    }


    function news()
    {
        $get = $this->uri->uri_to_assoc();

        if(empty($get['id']))
        {
            index();
        }else
        {
            $this->data['news'] = $this->noticias_model->search($get['id']);

            $this->data['title'] = $this->data['news']['titulo'];



            $this->data['news']['autor'] = $this->usuarios_model->findById($this->data['news']['autor']);
            $this->data['news']['cat'] = $this->categorias_model->search($this->data['news']['cat']);
            $this->data['news']['texto'] =  parse_bbcode($this->data['news']['texto']);

            $this->load->view('templates/header2',  $this->data);
            $this->load->view('main/news',$this->data);
            $this->load->view('templates/footer', $this->data);

        }
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
                $this->data['logeado'] = $resultado;
                $this->index();
            }else
            {
                $this->data['loginError'] = "User or password incorrect";
                $this->data['title'] = 'Login';

                $this->load->view('templates/header2', $this->data);
                $this->load->view('main/login',$this->data);
                $this->load->view('templates/footer', $this->data);
            }
        }else
        {
         $this->data['loginError'] = "User or password incorrect";

         $this->data['title'] = 'Login';

         $this->load->view('templates/header2', $this->data);
         $this->load->view('main/login',$this->data);
         $this->load->view('templates/footer', $this->data);
     }


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
        $this->load->view('templates/header2', $this->data);
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

function logout()
{
   $this->session->unset_userdata('login');
   unset( $this->data['logeado']);
   $this->index();
}
}
?>