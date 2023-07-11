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
		$poids=$this->input->post('poids');
		echo $poids;
		$this->load->model('Tranche_model','tranche',true);
		$result=$this->tranche->getIdTranchePoids($poids);
		var_dump($result);
	}
}


/* End of file Tranche.php */
/* Location: ./application/controllers/Tranche.php */
