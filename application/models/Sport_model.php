<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Tranche_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Sport_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

	public function getActiviteByIds($taille,$poids,$poidsActuelle,$objectif)
	{
		$data=array(
			'idTranchePoids'=>$poids,
			'idTrancheTaille'=>$taille,
			'idTranchePoidsActuel'=>$poidsActuelle,
			'idObjectif'=>$objectif
		);
		$this->db->where($data);
		$result=$this->db->get('objectifSpostive');
		return $result;
	}

	public function getActivitePerDay($taille,$poids,$poidsActuelle,$objectif)
	{
		$data=$this->getActiviteByIds($taille,$poids,$poidsActuelle,$objectif);
		$querry1=sprintf('select distinct( v_sport.idactivitesportive),nomactivite,nomexercice,partietravailler,repetition ,frequence from v_sport where idActiviteSportive=%s',$data[0]->idActiviteSportive);
		$this->db->select($querry1);
		$result=$this->db->row();
		return $result;
	}

	
  // ------------------------------------------------------------------------

}

/* End of file Tranche_model.php */
/* Location: ./application/models/Tranche_model.php */
