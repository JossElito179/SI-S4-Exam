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

class Inscription extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index(){
    $data['genres'] =  $this->Generalisation->SelectFromTable('genre');
    $this->load->view('inscription', $data);
  }
}