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

class Crud extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

//  ------------------------------------------------------------------------
    /* Partie Aliments */
    public function versAjoutAliment(){
        $data['categories'] = $this->Generalisation->SelectFromTable("categorie");
        $erreur = $this->input->get('erreur');
        $this->load->view('menuBackOffice');
        $this->load->view('ajoutAliment', $data);
        $this->load->view('footer');
    }

    public function versListeAliment(){
        $data['aliments'] = $this->Generalisation->SelectFromTable("aliment");
        $this->load->view('menuBackOffice');
        $this->load->view('listeAliment', $data);
        $this->load->view('footer');
    }

    public function insererAliment(){
        $nomaliment = $this->input->post('nomaliment');
        $idcategorie = $this->input->post('idcategorie');
        $prix = $this->input->post('prix');
        $data['categories'] = $this->Generalisation->SelectFromTable("categorie");
        $data['message'] = "Veuillez bien remplir les Champs";
        if($nomaliment==null || $nomaliment=="" || $idcategorie=="" || $idcategorie==null || $prix=="" || $prix==null){
            $this->load->view('menuBackOffice');
            $this->load->view('AjoutAliment', $data);
            $this->load->view('footer');
        }else{
            $data = array(
                'nomaliment' => $nomaliment
            );
            $this->Generalisation->InsertInTable("aliment", $data);

            $aliment = $this->Generalisation->SelectFromTable("aliment");
            // var_dump($aliment[count($aliment)-1]->idaliment);
            $data = array(
                'idaliment' => $aliment[count($aliment)-1]->idaliment,
                'idcategorie' => $idcategorie,
                'prixkilo' => $prix
            );

            $this->Generalisation->InsertInTable("categoriealiment", $data);
            redirect("Crud/versListeAliment");
        }
    }

    public function supprimerAliment(){
        $id = $this->input->get('idaliment'); 
        
        $this->db->delete('categoriealiment', array('idaliment' => $id));
        $this->db->delete('aliment', array('idaliment' => $id));
       
        redirect("Crud/versListeAliment");
    }


        //  ------------------------------------------------------------------------
    /* Partie Exercice */
    public function versAjoutExercice(){
        $data['types'] = $this->Generalisation->SelectFromTable("typesport");
        $this->load->view('menuBackOffice');
        $this->load->view('ajoutExercice', $data);
        $this->load->view('footer');
    }

    public function versListeExercice(){
        $data['exercices'] = $this->Generalisation->SelectFromTable("excercice");
        $this->load->view('menuBackOffice');
        $this->load->view('listeExercice', $data);
        $this->load->view('footer');
    }

    public function insererExercice(){
        $nomexercice = $this->input->post('nomexercice');
        $partie = $this->input->post('partie');
        $idtype = $this->input->post('idtype');
        $repetition = $this->input->post('repetition');
        $frequence = $this->input->post('frequence');

        $data['types'] = $this->Generalisation->SelectFromTable("typesport");
        $data['message'] = "Veuillez bien remplir les Champs";
        if($nomexercice==null || $nomexercice=="" || $idtype=="" || $idtype==null || $partie=="" || $partie==null || $repetition=="" || $repetition==null || $frequence=="" || $frequence==null){
            $this->load->view('menuBackOffice');
            $this->load->view('ajoutExercice', $data);
            $this->load->view('footer');
        }else{
            $data = array(
                'nomexercice' => $nomexercice,
                'partietravailler' => $partie,
                'idtype'=>$idtype
            );
            $this->Generalisation->InsertInTable("excercice", $data);

            $exo = $this->Generalisation->SelectFromTable("excercice");
            // var_dump($aliment[count($aliment)-1]->idaliment);
            $data = array(
                'idexercice' => $exo[count($exo)-1]->idexercice,
                'repetition' => $repetition,
                'frequence' => $frequence
            );

            $this->Generalisation->InsertInTable("activitesportive", $data);
            redirect("Crud/versListeExercice");
        }
    }

    public function supprimerExercice(){
        $id = $this->input->get('idexercice'); 
        
        $this->db->delete('activitesportive', array('idexercice' => $id));
        $this->db->delete('excercice', array('idexercice' => $id));
       
        redirect("Crud/versListeExercice");
    }

	


 /* Partie Exercice */
public function verification(){
    $data = $this->Generalisation->SelectFromTable("categorie");
    foreach($data as $d){
        $intermediaire = $this->input->post($d->nomcategorie);
        if($intermediaire=="" || $intermediaire==null || intval($intermediaire)<0){
            return false;
        }
    }
    return true;
}

public function sommation(){
    $data = $this->Generalisation->SelectFromTable("categorie");
    $valeur = 0;
    foreach($data as $d){
        $intermediaire = $this->input->post($d->nomcategorie);
        $valeur = $valeur + (intval($intermediaire)*-1);
    }
    if($valeur>100 || $valeur<100){
        return false;
    }
    return true;
}

 public function versAjoutRegime(){
    $data['categories'] = $this->Generalisation->SelectFromTable("categorie");
    $data['objectifs'] = $this->Generalisation->SelectFromTable("objectif");
    $this->load->view('menuBackOffice');
    $this->load->view('ajoutRegime', $data);
    $this->load->view('footer');
}

// public function versListeExercice(){
//     $data['exercices'] = $this->Generalisation->SelectFromTable("excercice");
//     $this->load->view('menuBackOffice');
//     $this->load->view('listeExercice', $data);
//     $this->load->view('footer');
// }

public function insererRegime(){
    $categorie = $this->Generalisation->SelectFromTable("categorie");
    $nomregime = $this->input->post('nomregime');
    $idobjectif = $this->input->post('idobjectif');
    $poidsactuelle = $this->input->post('poidsactuelle');
    $tailleactuelle = $this->input->post('tailleactuelle');
    $poidobjectif = $this->input->post('objectif');
    $verifier = $this->verification();
    $somme = $this->sommation();
    $data['categories'] = $this->Generalisation->SelectFromTable("categorie");
    $data['objectifs'] = $this->Generalisation->SelectFromTable("objectif");
    $data['erreur']="Veuiller bien remplir les champs. et assurez vous d'inserer des valeurs positives. La somme de ces pourcentages doivent etre egale a 100";
    if($nomregime == null || $nomregime == "" || $idobjectif=="" || $idobjectif==null || $poidsactuelle=="" || $poidsactuelle==null || $tailleactuelle=="" || $tailleactuelle==""){
        // $this->load->view('menuBackOffice');
        // $this->load->view('ajoutRegime', $data);
        // $this->load->view('footer');
        echo "ato amin'ny bedebe";
    }else if($verifier==false || $somme==false){
        // $this->load->view('menuBackOffice');
        // $this->load->view('ajoutRegime', $data);
        // $this->load->view('footer');
        echo "ato amin'ny boucle";
    }else{
        $data = array(
            'nomregime' => $nomregime
        );
        $this->Generalisation->InsertInTable("regime", $data);

        $regime = $this->Generalisation->SelectFromTable("regime");

        $data = array(
            'idregime' => $regime[count($regime)-1]->regime,
            'jour'=>1
        );

        foreach($categorie as $d){
            $data["p".$d->nomcategorie] = $this->input->post($d->nomcategorie);
        }

        $this->Generalisation->InsertInTable("regimealiment", $data);

        $idTranchepoid = $this->Tranches->avoirLaTranche("tranchepoids", $poidobjectif);
        $idTranchetaille = $this->Tranches->avoirLaTranche("tranchetaille", $tailleactuelle);;
        $idTranchepoidsactuelle = $this->Tranches->avoirLaTranche("tranchepoidsactuel", $poidsactuelle);

        $data = array(
            'idregime' => $regime[count($regime)-1]->regime,
            'objectif' => $idobjectif,
            'idtranchetaille' => $idTranchetaille,
            'idtranchepoids' => $idTranchepoid,
            'idtranchepoidsactuel' => $idTranchepoidsactuelle,
            'jour'=>1
        );
        
        $this->Generalisation->InsertInTable("objectifregime", $data);
        

         
        // redirect("Crud/versListeExercice");
    }
}

// public function supprimerExercice(){
//     $id = $this->input->get('idexercice'); 
    
//     $this->db->delete('activitesportive', array('idexercice' => $id));
//     $this->db->delete('excercice', array('idexercice' => $id));
   
//     redirect("Crud/versListeExercice");
// }

}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
