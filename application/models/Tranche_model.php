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

class Tranche_model extends CI_Model {

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

	public function getIdTranchePoids($poids)
	{
		$poids = $this->db->escape($poids);
    $query = $this->db->query('SELECT idTranchePoids FROM TranchePoids WHERE '.$poids.' >= min AND '.$poids.'<= max;');
		$result = $query->row();
		return $result;
	}

	public function getIdTrancheTaille($taille)
	{
		$taille = $this->db->escape($taille);
    $query = $this->db->query('SELECT idTrancheTaille FROM TrancheTaille WHERE '.$taille.' >= min AND '.$taille.'<= max;');
		$result = $query->row();
		return $result;
	}

  // ------------------------------------------------------------------------

}

/* End of file Tranche_model.php */
/* Location: ./application/models/Tranche_model.php */
