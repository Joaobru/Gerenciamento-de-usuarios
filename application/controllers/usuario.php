<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $user = strtoupper($this->session->userdata('usuario'));
        // if(empty($user))
        // {
        //     redirect(base_url());
        // }
        $this->load->library("controle_acesso");
        $this->controle_acesso->controlar();
    }

    public function index()
    {
        //Carrega o cabeçalho (Header)
        $this->load->view('includes/header');
        //Carrega o menu
        $this->load->view('includes/menu');
        //Carrega o corpo da tela (Body)
        $this->load->view('v_usuario');
        //Carrega o rodapé da tela (footer)
        $this->load->view('includes/footer');
    }

    public function listar()
    {
        //Instancio a Model - m_usuario
        $this->load->model('m_usuario');
        //Solicito a execução do método consultar
        $retorno = $this->m_usuario->consultar();
        echo json_encode($retorno->result());
    }

    public function cadastrar(){
        //Carregando as variáveis do que foi mandado via POST
        $usuario = $this->input->post('usuario');
        $senha   = $this->input->post('senha');
        $tipo = $this->input->post('cmb-tipo');
        //echo $tipo;
        //Instancio a Model - m_usuario
        $this->load->model('m_usuario');
        //Solicito a execução do método valada login passando os
        //atributos necessários, e atribuindo a $retorno
        $retorno = $this->m_usuario->cadastrar($usuario, $senha, $tipo);
        echo $retorno;
    }

    public function consalterar(){
        $usuario = $this->input->post('usuario');
        $this->load->model('m_usuario');
        $retorno = $this->m_usuario->consalterar($usuario);
        echo json_encode($retorno->result());
    }

    public function alterar(){
        //Carregando a variavel que foi mandada via POST
        $senha = $this->input->post('senha');
        $usuario = $this->input->post('usuario');
        $tipo = $this->input->post('tipo');
        //Instacio a Model - m_usuario
        $this->load->model('m_usuario');
        //Solicitando a execução do método consalterar passando o
        //atrbuindo necessario, e atribuindo a $retorno
        $retorno = $this->m_usuario->alterar($senha, $usuario, $tipo);
        echo $retorno;
    }

    public function desativar(){
        $usuario = $this->input->post('usuario');

        $sessao = $this->session->userdata('usuario');
        if($usuario == $sessao){
            echo 2;
        }else{
            $this->load->model('m_usuario');
            $retorno = $this->m_usuario->desativar($usuario, $sessao);
            echo $retorno;
        }
    }

    public function verusu(){
        //Carrega as variaveis do que foi mandado via POST
        $usuario = $this->input->post('usuario');
        //Instancio a Model
        $this->load->model('m_usuario');
        //Solicitando a execução do método cadstrar passando os
        // atribuitos necessarios, e atribuindo a $retorno
        $retorno = $this->m_usuario->verusu($usuario);
        echo $retorno;
    }

    public function reativar(){
        // Carregando a variável que foi mandada via POST
        $usuario  = $this->input->post('usuario');
        // Instancio a Model - m_usuario
        $this->load->model('m_usuario');
        // Solicito a execução do método consalterar passando  o
        // atributo necessário, e  atribuindo a $retorno
        $retorno = $this->m_usuario->reativar($usuario);
        echo $retorno;
    }
}