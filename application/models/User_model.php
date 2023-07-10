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
  // ------------------------------------------------------------------------

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
