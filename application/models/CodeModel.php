<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Categorire_model
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

class CodeModel extends CI_Model {

    public function getAllCode(){
        $sql="SELECT * FROM code";
        $query=$this->db->query($sql);
        $resultat=array();
        foreach($query->result_array() as $row){ 
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function getIdCode($code){
        $sql="SELECT * FROM code WHERE code='%s'";
        $sql=sprintf($sql,$code);
        $query=$this->db->query($sql);
        $resultat=array();
        foreach($query->result_array() as $row){
            $resultat[]=$row;
        }
        if(count($resultat)!=0){
            return $resultat[0];
        }
        return null;
    }

    public function achatCode($code){
        $code=$this->getIdCode($code);
        if($code['etat']==0){
            $idUtilisateur=$this->session->userdata('usersession');
            $sql="INSERT INTO stockCode VALUES(%d,%d,0)";
            $sql=sprintf($sql,$code['idcode'],$idUtilisateur); 
            $this->db->query($sql);
            $sql="UPDATE code SET etat = 1 WHERE idCode = %d";
            $sql=sprintf($sql,$code['idcode']);
            $this->db->query($sql);      
        }else{
            return false;
        } 
    }

    public function getCodeById($idCode){
        $sql="SELECT * FROM code WHERE idCode=%d";
        $sql=sprintf($sql,$idCode);
        $query=$this->db->query($sql);
        $resultat=array();
        foreach($query->result_array() as $row){
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function getStockCodeById($idStockCode){
        $sql="SELECT * FROM stockCode WHERE idstockcode=%d";
        $sql=sprintf($sql,$idStockCode);
        $query=$this->db->query($sql);
        $resultat=array();
        foreach($query->result_array() as $row){
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function getDernierMontant($idUtilisateur){
        $sql="SELECT * FROM compteComptantUtilisateur WHERE id=%d";
        $sql=sprintf($sql,$idUtilisateur);
        $query=$this->db->query($sql);
        $resultat=array();
        foreach($query->result_array() as $row){
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function confirmationCode($idStockCode){
        $sql="UPDATE stockCode SET confirmation = 1 WHERE idStockCode = %d";
        $sql=sprintf($sql,$idStockCode);
        $this->db->query($sql);
        $stockCode=$this->getStockCodeById($idStockCode);
        $code=$this->getCodeById($stockCode[0]['vola']);
        $compte=$this->getDernierMontant($this->session->userdata('usersession'));
        $vola=$compte+$code[''];
        $sql="INSERT INTO compteComptantUtilisateur(montant) VALUES (%d)";
    }
}