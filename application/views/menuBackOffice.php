<style>
#conteneur{
    /* border: solid; */
    background-color: gray;
    padding: 30px;
    justify-content: center;
    /* margin: 100px; */
    /* width: 215px; */
    /* position: left; */
}

#conteneur div{
    width: 100px;
    padding: 20px;
    display: inline; 
    text-align: left;      
}

#conteneur div a{
    text-decoration: none;
    color: White;
    font-weight: bold;
}

#conteneur div a:hover{ 
    color: lightseagreen;    
}

</style>
<center>
<div id="conteneur">
<div><a href="<?php echo site_url('Crud/versAjoutAliment'); ?>">Ajout Aliment</a></div>
<div><a href="<?php echo site_url('Crud/versListeAliment'); ?>">Mes Aliments</a></div>
<div><a href="<?php echo site_url('Crud/versAjoutExercice'); ?>">Ajout Exercice</a></div>
<div><a href="<?php echo site_url('Crud/versListeExercice'); ?>">Mes Exercices</a></div>
<div><a href="<?php echo site_url('Crud/versAjoutRegime'); ?>">Ajout Regime</a></div>
</div>
</center>