<?php

    defined('BASEPATH') OR exit('No direct script access allwed');

    class M_acesso extends CI_Model
    {
        public function validalogin($usuario, $senha){
            $retorno = $this->db->query("SELECT * FROM usuarios
                                        WHERE usuario = '$usuario'
                                        AND senha = '$senha'
                                        AND estatus = ''");
            if($retorno->num_rows() > 0){
                return 1;
            }else{
                return 0;
            }
        }

        public function validaSessao($nome){
            $retorno = $this->db->query("SELECT * FROM usuarios
                                        WHERE usuario = '$nome' and tipo = 'COMUM'");
            if($retorno->num_rows() > 0){
                return 1;
            }else{
                return 0;
            }
        }
    }

?>