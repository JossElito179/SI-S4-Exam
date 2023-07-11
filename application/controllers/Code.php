<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Login
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Code extends CI_Controller
{
    
        
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->load->model('CodeModel');
        $listeCode=$this->CodeModel->getAllCode();
        $data['listeCode']=$listeCode;
        $this->load->view('AchatCode',$data);
    }

    public function achatCode(){
        $code=$this->input->post('code');
        $this->load->model('CodeModel');
        $listeCode=$this->CodeModel->getAllCode();
        $data['listeCode']=$listeCode;
        $resp=$this->CodeModel->achatCode($code);
        if($resp!=false){
            $this->load->view('AchatCode');
        }else{
            $data['dejaAcheter']=false;
            $this->load->view('AchatCode',$data);
        }
    }
}
