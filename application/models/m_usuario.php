<?php

defined('BASEPATH') OR exit('no directory script access allowed');

class M_usuario extends CI_Model {

    public function cadastrar($usuario, $senha, $tipo) {
        //echo($tipo);
        //Instrução que executa a Query no Banco de Dados
        $this->db->query("INSERT INTO USUARIOS (USUARIO, SENHA, TIPO) VALUES ('$usuario','$senha','$tipo')");
        //Verificar inserção
        if($this->db->affected_rows() > 0){
            //Inserindo com sucesso
            return 1;
        } else {
            //Problema ao inserir
            return 0;
        }
    }

    public function consultar(){
        //Instrução que executa a Query no Banco de Dados
        //$retorno = $this->db->query("SELECT usuario, senha, tipo, estatus FROM usuarios");
        $retorno = $this->db->query("SELECT usuario, senha, tipo, 
                                    case estatus
                                    when 'D' then
                                        'DESATIVADO'
                                    else    
                                        'ATIVO'
                                    end estatus
                                    FROM usuarios");
        //Retorno o resultado da SELECT
        if($retorno->num_rows() > 0){
            return $retorno;
        }
    }

    public function consalterar($usuario){
        $retorno = $this->db->query("SELECT usuario, senha FROM usuarios
                                    WHERE usuario = '$usuario'");
        if($retorno->num_rows() > 0){
            return $retorno;
        }
    }

    public function alterar($senha, $usuario, $tipo){
        //Instrução que executa a Query no banco
        $retorno = $this->db->query("UPDATE usuarios SET senha = '$senha', tipo = '$tipo'
                                    WHERE usuario = '$usuario'");
        
        if ($this->db->affected_rows() > 0) {
            //Atualizar com sucesso
            return 1;
        } else {
            //Problema ao alterar
            return 0;
        }
    }

    public function desativar($usuario, $sessao){
        //Instrução que executa Query no banco
        $retorno = $this->db->query("UPDATE usuarios set estatus = 'D'
                                    WHERE usuario = '$usuario'");
        if($this->db->affected_rows() > 0){
            //Atualizando com sucesso
            return 1;
        }else{
            //Problema ao alterar
            return 0;
        }
    }

    public function verusu($usuario){
        //Instrução que executa a Query no banco
		$retorno = $this->db->query("SELECT * FROM usuarios 
                                    WHERE usuario = '$usuario'");
		if ($this->db->affected_rows() > 0) {
			//Usuário existente
			return 1;
		}else{
			//Usuário inexistente
			return 0;
		}
    }
    
    public function reativar($usuario){
        // Instrução que executa a Query no banco
        $retorno = $this->db->query("UPDATE usuarios SET estatus = ''
                                    WHERE usuario = '$usuario'");
        if($this->db->affected_rows() > 0){
            // Atualizado com sucesso
            return 1;
        } else {
            // Problema ao alterar
            return 0;
        }
    }
}
