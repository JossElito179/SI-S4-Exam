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
	public function authenticate()
	{
		$error['message']='Something went wrong with your email or password';
		$this->load->model('User_model','user',true);
		$mail=$this->input->post('email');
		$mdp=$this->input->post('password');
		$userBool=$this->user->getForAuth($mail,$mdp);
		if ($userBool==true) {
			redirect('welcome_message');
		}else {
			$this->load->view('login',$error);
		}
	}

	public function authenticateAdmin()
	{
		$error['message']='Something went wrong with your email or password';
		$this->load->model('User_model','user',true);
		$mail=$this->input->post('email');
		$mdp=$this->input->post('password');
		$isAdmin=$this->user->getForAuthAdmin($mail,$mdp);
		if ($isAdmin==true) {
			redirect('welcome_message');
		}else {
			$this->load->view('loginAdmin',$error);
		}
	}

	
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
