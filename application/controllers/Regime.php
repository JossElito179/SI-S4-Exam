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

class Regime extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
      $this->load->model('User_model');
      $this->load->model('Tranche');
      $this->load->model('ObjectifRegime_model');
      $this->load->model('Regime_model');
      $this->load->model('Categorie');
			$this->load->model('prixJournalier_model','prixCalc',true);


      $idUtilisateur=$this->session->userdata('usersession');
      $infoUtilisateur=$this->User_model->getInfoUtilisateur($idUtilisateur);
      $tranchePoids=$this->Tranche->getTranchePoids($infoUtilisateur[0]['poidobjectif']);
      $trancheTaille=$this->Tranche->getTranchetaille($infoUtilisateur[0]['taille']);
      $tranchePoidsActuelle=$this->Tranche->getTranchePoidsActuelle($infoUtilisateur[0]['poidsactuelle']);
      $objectifRegime=$this->ObjectifRegime_model->getObjectifRegime($tranchePoids[0]['idtranchepoids'],$trancheTaille[0]['idtranchetaille'],$tranchePoidsActuelle[0]['idtranchepoidsactuel'],$infoUtilisateur[0]['idobjectif']);
      
			$regimeAliment=$this->Regime_model->getRegimeAlimentByIdRegime($objectifRegime[0]['idregime']);
      
			$data['regimeAliment']=$regimeAliment;
      $randomListe=array();
      $i=0;
      foreach($regimeAliment as $liste){
          $randomListe[$i]['fruit']=$this->Categorie->randomAliment(1)['nomaliment'];
          $randomListe[$i]['legume']=$this->Categorie->randomAliment(2)['nomaliment'];
          $randomListe[$i]['proteine']=$this->Categorie->randomAliment(3)['nomaliment'];
          $randomListe[$i]['sucre']=$this->Categorie->randomAliment(4)['nomaliment'];
          $randomListe[$i]['accompagnement']=$this->Categorie->randomAliment(5)['nomaliment'];
          $i=$i+1;
      }

			$dataPourcentage=$this->assignPoids($regimeAliment);

			for ($i=0; $i <count($dataPourcentage) ; $i++) { 
				$prix[$i]=$this->prixCalc->setPrice($dataPourcentage[$i]);
			}

      $data['randomListe']=$randomListe;
      $data['prix']=$prix;
			$this->load->view('regimeAlimentaire',$data); 
  }

	public function assignPoids($regimeAlimentList)
	{
		for ($i=0; $i <count($regimeAlimentList) ; $i++) { 
				$data[$i]['proteine']=$regimeAlimentList[$i]['pproteine'];
				$data[$i]['fruit']=$regimeAlimentList[$i]['pfruit'];
				$data[$i]['sucre']=$regimeAlimentList[$i]['plegume'];
				$data[$i]['accompagnement']=$regimeAlimentList[$i]['paccompagnement'];
				$data[$i]['legume']=$regimeAlimentList[$i]['plegume'];
		}
		return $data;
	}
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
