<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Tranche
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

class Tranche extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {

    $this->load->model('Categorie');
        $data['liste']=$this->Categorie->randomAliment(4);
        $this->load->view('Teste',$data); 

  }

	public function getAllId()
	{
		$poidsActuel=$this->input->post('poidsActuel');
		$taille=$this->input->post('taille');
		$poids=$this->input->post('poidsobjectif');
		$date=$this->input->post('datedebut');

		$Objectif=$this->input->post('objectif');
		
		echo $this->session->userdata('usersession');
		$this->load->model('InfoUser_model','info',true);
		
		$this->info->Insert($Objectif,$poids,$taille,$poidsActuel,$date);
		redirect('Regime');
	}
}


/* End of file Tranche.php */
/* Location: ./application/controllers/Tranche.php */
