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

class Acceuil extends CI_Controller
{
        
    public function __construct()
    {
        parent::__construct();
    }

    public function authenticate()
	{

	}

    public function choisirObjectif(){
        $this->load->view("header");
        $this->load->view("choixObjectif");
        $this->load->view("footer");
    }

	
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
