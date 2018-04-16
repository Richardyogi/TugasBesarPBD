<?php
    class C_index extends CI_Controller{

        public function index(){
            $text['arlin']="arlin";
            $this->load->view('homeIndex', $text);
        }
       
    }
?>