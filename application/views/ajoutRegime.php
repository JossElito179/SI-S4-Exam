<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>BackOffice | Regime</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url("assets/vendor/mdi-font/css/material-design-iconic-font.min.css"); ?> rel="stylesheet" media="all">
    <link href="<?php echo base_url("assets/vendor/font-awesome-4.7/css/font-awesome.min.css"); ?>" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url("assets/vendor/select2/select2.min.css"); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url("assets/vendor/datepicker/daterangepicker.css"); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url("assets/css/main.css");?>" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title"> Ajout Regime </h2>
                    <?php if(isset($erreur)){
                        echo "<label class='label' style=color:red;>".$erreur."</label>";
                    }?>
                    <form action="<?php echo site_url("Crud/insererRegime");?>"  method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nom Regime</label>
                                    <input class="input--style-4" type="text" name="nomregime">
                                </div>
                            </div>
                        </div>
                        <?php foreach($categories as $categorie){?>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Pourcentage de <?php echo $categorie->nomcategorie; ?></label>
                                        <div class="input-group-icon">
                                            <input class="input--style-4 js-datepicker" type="number" name="<?php echo $categorie->nomcategorie; ?>">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php } ?>
                        <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label"> Tranche Poids</label>
                                        <div class="input-group-icon">
                                            <input class="input--style-4 js-datepicker" type="number" name="poidsactuelle">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group"> Tranche Taille</label>
                                        <div class="input-group-icon">
                                            <input class="input--style-4 js-datepicker" type="number" name="tailleactuelle">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Poids A Atteindre</label>
                                        <div class="input-group-icon">
                                            <input class="input--style-4 js-datepicker" type="number" name="objectif">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Objectif</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="idobjectif">
                                <option disabled="disabled" selected="selected">Choose option</option>
                                <?php foreach($objectifs as $objectif){?>
                                    <option value="<?php echo $objectif->idobjectif; ?></option>"><?php echo $objectif->option; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>></script>
    <!-- Vendor JS-->
    <script src=<?php echo base_url("assets/vendor/select2/select2.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/vendor/datepicker/moment.min.js"); ?>></script>
    <script src=<?php echo base_url("vendor/datepicker/daterangepicker.js"); ?>></script>

    <!-- Main JS-->
    <!-- <script src="js/global.js"></script> -->

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->