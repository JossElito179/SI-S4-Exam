<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model User_model
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

class Tranches extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  // Avoir Tranches Taille et Poids 
  public function avoirLaTranche($labelle, $poids){
    $condition = $poids." between min and max";

    $resultat = $this->Generalisation->SelectSpecifiedFromTableSansEgale($labelle, "*", $condition);

    if(count($resultat)>0){
        return $resultat;
    }
    return false;
  }


  // ------------------------------------------------------------------------


}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
