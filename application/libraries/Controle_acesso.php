<?php
    class Controle_acesso{
        public function controlar()
        {
            $CI =& get_instance();
            $user = strtoupper($CI->session->userdata('usuario'));
            if(empty($user))
            {
                redirect(base_url());
                //redirect(Login);
            }
        }
    }
?>