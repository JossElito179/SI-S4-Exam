<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reduction de Poids</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="<?= base_url().'/assets/css/Option.css'?>" rel="stylesheet">

</head>

<body>

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Pour la reduction de poids</h5>

			<?= form_open('Tranche/getAllId') ?>
			<div class="col-12">
          <p><label for="inputNanme4" class="form-label">Poids actuel en Kg</label></p>
          <input type="number" name="poidsActuel" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12">
          <p><label for="inputEmail4" class="form-label">Taille en cm</label></p>
          <input type="number" name="taille" class="form-control" id="inputEmail4">
        </div>
        <div class="col-12">
        <p><label for="inputPassword4" class="form-label">Poids a reduire</label></p>
          <input type="number" name="poids" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
          <p><label for="inputAddress" class="form-label">Date de debut</label></p>
          <input type="date" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
        <p></p>
      <?= form_close() ?>

    </div>
  </div>

  </body>
  </html>
