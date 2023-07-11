<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Insertion_User
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

class Insertion_User extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
  }

	public function insertUser()
	{
		$nom=$this->input->post('nom');
		$email=$this->input->post('email');
		$idGenre=$this->input->post('genre');
		$mdp=$this->input->post('mdp');
		$dateNaissance=$this->input->post('dateDeNaissance');
		$this->load->model('User_model','user',true);
		$this->user->Insert($nom,$email,$idGenre,$mdp,$dateNaissance);
		$this->load->view('login');
	}
}


/* End of file Insertion_User.php */
/* Location: ./application/controllers/Insertion_User.php */
