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

class User_model extends CI_Model {

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

	public function getForAuth($email,$password)
	{
    $tableau = array();
    $tableau['email']=$email;
    $tableau['mdp']=$password;

		$this->db->where($tableau);
    
		$user=$this->db->get('utilisateur');
		$data = $user->result();

    if(count($data) == 1){
      // echo $data[0]->id;
      $this->session->set_userdata('usersession',$data[0]->id);
      return true;
    }
    return false;
	}

	public function getForAuthAdmin($email,$password)
	{
    $tableau = array();
    $tableau['email']=$email;
    $tableau['mdp']=$password;

		$this->db->where($tableau);
    
		$user=$this->db->get('utilisateur');
		$data = $user->result();

    if(count($data) == 1){
      $this->session->set_userdata('usersession',$data[0]->id);
      return $data[0]->isAdmin;
    }
    return false;
	}
  // ------------------------------------------------------------------------

	public function Insert($nom,$email,$idGenre,$mdp,$dateNaissance)
	{
    $tableau = array();
    $tableau['nom'] = $nom;
    $tableau['email']=$email;
    $tableau['idgenre']=$idGenre;
    $tableau['mdp'] = $mdp;
    $tableau['dateDeNaissance']=$dateNaissance;
    $tableau['isAdmin']=false;
		$this->db->insert('utilisateur', $tableau);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
