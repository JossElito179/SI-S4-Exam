<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

    public function index(){
        $this->load->model('User_model');
        $data['liste']=$this->User_model->getInfoUtilisateur(2);
        $this->load->view('Teste',$data);
    }

}