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

class Regime_model extends CI_Model {

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

        public function getRegimeById($idRegime){
            $sql="SELECT * FROM regime WHERE idregime=%d";
            $sql=sprintf($sql,$idRegime);
            $query=$this->db->query($sql);
            $resultat=array();
            foreach($query->result_array() as $row){
                $resultat[]=$row;
            }
            return $resultat;
        }

        public function getRegimeAlimentByIdRegime($idRegime){
            $sql="SELECT * FROM regimeAliment WHERE idregime=%d";
            $sql=sprintf($sql,$idRegime);
            $query=$this->db->query($sql);
            $resultat=array();
            foreach($query->result_array() as $row){
                $resultat[]=$row;
            }
            return $resultat;
        }
}