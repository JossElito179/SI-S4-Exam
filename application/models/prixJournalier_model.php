<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Categorire_model
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

class prixJournalier_model extends CI_Model {

  // ------------------------------------------------------------------------

	public $prixParPoids;

	public $dataPoids;

  public function __construct()
  {
    parent::__construct();
  }

	public function getAllCategorie()
	{
		$result=$this->db->get('categorie');
		return $result;
	}

	public function getPoidsPerMan()
	{
    $query = $this->db->query('select poidsengramme from poidsparpersonne order by idpoidsparpersonne asc limit 1');
		$result = $query->row();
		return $result;
	}
	public function setDataPoids($dataPercentage)
	{
		$poidsparp=$this->getPoidsPerMan();
		for ($i=0; $i <count($dataPercentage); $i++) { 
			$this->dataPoids[$i]=($dataPercentage[$i]*$poidsparp)/100;
		}
	}

	public function setPrice($dataPercentage)
	{
		$this->setDataPoids($dataPercentage);
		$categories=$this->getAllCategorie();
		for ($i=0; $i < count($categories) ; $i++) { 
			$this->prixParPoids=$this->prixParPoids+($this->dataPoids[$i]*$categories[$i]->prixKilo)/100;
		}
	}


  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Categorire_model.php */
/* Location: ./application/models/Categorire_model.php */
