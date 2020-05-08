<?php

defined('BASEPATH') OR exit('No direct script access allowed');

  class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // $user = strtoupper($this->session->userdata('usuario'));
        // if(empty($user))
        // {
        //   redirect(base_url());
        //   //redirect(Login);
        // }
        $this->load->library("controle_acesso");
        $this->controle_acesso->controlar();
    }

    public function index() 
    {
      $this->load->view('includes/header');
      $this->load->view('includes/menu');
      $this->load->view('home');
      $this->load->view('includes/footer');
    }
  }

?>
