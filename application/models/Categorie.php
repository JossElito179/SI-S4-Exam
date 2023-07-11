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

class Categorie extends CI_Model {

        
    public function __construct()
    {
        parent::__construct();
    }

    public function getAlimentByIdCategorie($idCategorie){
        $sql="SELECT * from v_categorieAliment where idcategorie=1";
        $sql=sprintf($sql,$idCategorie);
        $query=$this->db->query($sql);
        $resultat=array();
        foreach($query->result_array() as $row){
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function randomAliment($idCategorie){
        $listeSakafo=$this->getAlimentByIdCategorie($idCategorie);
        $min=1;
        $max=count($listeSakafo)-1;
        $random=rand($min,$max);
        return $listeSakafo[$random];
    }
}

