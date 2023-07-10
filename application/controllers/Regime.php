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

class Regime extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
  }

  public function testfonctionget(){
	 var_dump($this->Tranches->avoirLaTranche("tranchepoids", 1));
  } 

  public function testInsertionInfo(){
    var_dump($this->InfoUtilisateur->verificationDesChamps("15", "15", "15", "1", "2023-08-11"));
  }

}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
