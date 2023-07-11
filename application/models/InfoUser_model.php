<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model InfoUser_model
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

class InfoUser_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }
	public function Insert($Objectif,$poids,$taille,$poidsActuel,$date)
	{
		$data= array(
			'idutilisateur'=>$this->session->userdata('usersession'),
			'poidobjectif'=>$poids,
			'idobjectif'=>$Objectif,
			'taille'=>$taille,
			'poidsactuelle'=>$poidsActuel,
			'datededebut'=>$date
		);
		$this->db->insert('infoutilisateur',$data);
		redirect('Regime');
	}

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file InfoUser_model.php */
/* Location: ./application/models/InfoUser_model.php */
