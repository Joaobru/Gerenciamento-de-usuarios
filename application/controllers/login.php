<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/*
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');

		//Carrgar o cabeçalho (Header)
		$this->load->view('includes/header');

		//Carrega o corpo da tela (Body)
		$this->load->view('v_login');

		//Carrega o rodapé da tela (Footer)
		$this->load->view('includes/footer');
	}

	public function logar_ajax()
    {
        $usuario = $this->input->post('txtUsuario');
        $senha = $this->input->post('txtSenha');
        $this->load->model('m_acesso');
		$retorno = $this->m_acesso->validalogin($usuario, $senha);
		
		if($retorno == 1){
			$_SESSION['usuario'] = $usuario;
		}else{
			unset($_SESSION['usuario']);
		}
		echo $retorno;

		// $query = $this->db->get("usuario");
		// if($query->num_rows() == 1)
		// {
		// 	$usuario_s = $query->row();
		// 	$this->session->set_userdata("usuario"->usuario);
		// }
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function validaSessao()
	{
		$this->load->model('m_acesso');
		$nome = strtoupper($this->session->userdata('usuario'));
		$retorno = $this->m_acesso->validaSessao($nome);
        echo $retorno;
	}

}	

