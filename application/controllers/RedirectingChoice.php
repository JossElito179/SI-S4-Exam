<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller RedirectingChoice
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

class RedirectingChoice extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
  }
	public function redirectObjectif(){
		$idObjectif=$this->input->post('idObjectif');
		if ($idObjectif==1) {
			$this->load->view('infoUserReduction',$idObjectif);
		}elseif ($idObjectif==2) {
			$this->load->view('infoUserAugmentation',$idObjectif);
		}
	}

}


/* End of file RedirectingChoice.php */
/* Location: ./application/controllers/RedirectingChoice.php */
