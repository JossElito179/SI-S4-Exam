<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <title>Regime Alimentaire</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> 

  <link rel="stylesheet" href="<?= base_url().'/assets/css/ComplementTable.css'?>">

</head>

<body>
<div class="card" id="main-table">
    <div class="card-body">
      <h5 class="card-title">Regime a suivre</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr class="titre">
            <th scope="col">Jour</th>
            <th scope="col">Fruit</th>
            <th scope="col">Sucre</th>
            <th scope="col">Legume</th>
            <th scope="col">Accompagnement</th>
            <th scope="col">Proteine</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            $i=0;
            foreach($regimeAliment as $liste){ ?>
            <tr>
              <th scope="row"><?php echo $liste['jour']; ?></th>
              <td><?php echo $randomListe[$i]['fruit'];  ?></td>
              <td><?php echo $randomListe[$i]['legume']; ?></td>
              <td><?php echo $randomListe[$i]['proteine']; ?></td>
              <td><?php echo $randomListe[$i]['sucre']; ?></td>
              <td><?php echo $randomListe[$i]['accompagnement']; ?></td>
            </tr>
            <?php 
            $i=$i+1;
            } ?>
          </tbody>

      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
</body>
</html>
