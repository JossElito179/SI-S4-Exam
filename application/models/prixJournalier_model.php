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
	$r=$query->result();
	return $r;
	}
	public function setDataPoids($dataPercentage)
	{
		$poidsparp=$this->getPoidsPerMan();
		$this->dataPoids[0]= ($dataPercentage['fruit'] * $poidsparp[0]->poidsengramme )/100;
		$this->dataPoids[1]= ($dataPercentage['sucre'] * $poidsparp[0]->poidsengramme )/100;
		$this->dataPoids[2]= ($dataPercentage['legume'] * $poidsparp[0]->poidsengramme )/100;
		$this->dataPoids[3]= ($dataPercentage['accompagnement'] * $poidsparp[0]->poidsengramme )/100;
		$this->dataPoids[4]= ($dataPercentage['proteine'] * $poidsparp[0]->poidsengramme )/100;
	}

	public function setPrice($dataPercentage)
	{
		$this->setDataPoids($dataPercentage);
		$categories=$this->Generalisation->SelectFromTable('categorie');
		for ($j=0; $j < count($this->dataPoids) ; $j++) {
				$this->prixParPoids=$this->prixParPoids+($this->dataPoids[$j]* $categories[$j]->prixkilo )/100;
		}
		
		return $this->prixParPoids;
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
