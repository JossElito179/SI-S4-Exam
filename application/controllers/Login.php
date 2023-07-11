<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Login
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

class Login extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
  }

  public function versLoginAdmin(){
	 $this->load->view('loginAdmin');
  } 

	public function authenticate()
	{
		$error['message']='Something went wrong with your email or password';
		$this->load->model('User_model','user',true);
		$mail=$this->input->post('email');
		$mdp=$this->input->post('password');
		$userBool=$this->user->getForAuth($mail,$mdp);
		if ($userBool==true) {
			// var_dump($this->session->userdata('usersession'));
			$this->load->view('header');
			$this->load->view('acceuil');
			$this->load->view('footer');
		}else {
			$this->load->view('login',$error);
		}
	}

	public function authenticateAdmin()
	{
		$error['message']='Verifiez que Vous etes vraiment un admin.';
		$this->load->model('User_model','user',true);
		$mail=$this->input->post('email');
		$mdp=$this->input->post('password');
		$isAdmin=$this->user->getForAuthAdmin($mail,$mdp);
		if ($isAdmin==true) {
			$this->load->view('menuBackOffice');
			$this->load->view('acceuilAdmin');
			$this->load->view('footer');
		}else {
			$this->load->view('loginAdmin',$error);
		}
	}

	
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
