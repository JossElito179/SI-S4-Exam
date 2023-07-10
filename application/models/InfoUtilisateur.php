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

class InfoUtilisateur extends CI_Model {

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

  // Insertion des donnes infoUtilisateur
  public function insertionInfoUtilisateur($data){
    $this->Generalisation->InsertInTable("infoutilisateur", $data);
  }


  //Verification des Champs
  public function verificationDesChamps($taille, $poidsactuelle, $poidobjectif, $monobjectif, $date){
    if($taille=="" || $taille==null || $poidsactuelle=="" || $poidsactuelle==null || $poidobjectif=="" || $poidobjectif==null || $monobjectif=="" || $monobjectif==null || $date == "" || $date==null){
      return false;
    }

    $data =  array(
      'idutilisateur' => $this->session->userdata('usersession'),
      'taille' => $taille,
      'idobjectif' => $monobjectif,
      'poidsactuelle' => $poidsactuelle,
      'poidobjectif' => $poidobjectif,
      'datededebut' => $date
    );

    $this->InfoUtilisateur->insertionInfoUtilisateur($data);
  }

  

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
