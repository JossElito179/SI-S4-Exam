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
			// var_dump($this->session->userdata('usersession'));
			$this->load->view('header');
			$this->load->view('acceuil');
			$this->load->view('footer');
			// redirect('welcome_message');
		}else {
			$this->load->view('login',$error);
		}
	}

	
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
