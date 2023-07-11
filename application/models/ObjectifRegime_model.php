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

class ObjectifRegime_model extends CI_Model {

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

        public function getObjectifRegime($idTranchePoids,$idTrancheTaille,$idTranchePoidsActuel,$idObjectif){
            $sql="SELECT * FROM objectifRegime WHERE idtranchepoids=%d and idtranchetaille=%d and idTranchePoidsActuel=%d and idobjectif=%d";
            $sql=sprintf($sql,$idTranchePoids,$idTrancheTaille,$idTranchePoidsActuel,$idObjectif);
            $query=$this->db->query($sql);
            $resultat=array();
            foreach($query->result_array() as $row){
                $resultat[]=$row;
            }
            return $resultat;
        }


}