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

class Tranche extends CI_Model {

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

        public function getTranchePoids($poids){
            $sql = "SELECT * FROM tranchePoids WHERE %f BETWEEN min AND max";
            $sql=sprintf($sql,$poids);
            $query=$this->db->query($sql);
            $resultat=array();
            foreach($query->result_array() as $row){
                $resultat[]=$row;
            }
            return $resultat;
        }       

        public function getTranchetaille($taille){
            $sql = "SELECT * FROM trancheTaille WHERE %f BETWEEN min AND max";
            $sql=sprintf($sql,$taille);
            $query=$this->db->query($sql);
            $resultat=array();
            foreach($query->result_array() as $row){
                $resultat[]=$row;
            }
            return $resultat;
        }

        public function getTranchePoidsActuelle($poidsActuelle){
            $sql = "SELECT * FROM tranchePoidsActuel WHERE %f BETWEEN min AND max";
            $sql=sprintf($sql,$poidsActuelle);
            $query=$this->db->query($sql);
            $resultat=array();
            foreach($query->result_array() as $row){
                $resultat[]=$row;
            }
            return $resultat;
        }
}