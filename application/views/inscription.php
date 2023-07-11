<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/inscriptionCss.css'); ?>">
    <title>Log in</title>
</head>
<body>
    <div class="center">
        <form action="<?php echo site_url('Insertion_User/insertUser'); ?>" method="post">
            <div class="txt_field">
                <input type="text" name="nom" required>
                <span></span>
                <label>Nom :</label>
            </div>
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label>Email :</label>
            </div>
            <div class="txt_field">
                <select name="genre" id="">

                    <?php
                    foreach($genres as $genre){ ?>
                    <option value="<?php echo $genre->idgenre; ?>"><?php echo $genre->genre; ?></option>
                    <?php } ?> 
                </select>
                <span></span>
                <label style="margin-top: 5px;">genre :</label>
            </div>
            <div class="txt_field">
                <input type="date" name="dateDeNaissance" required>
                <span></span>
                <label>date de naissance :</label>
            </div>
            <div class="txt_field">
                <input type="password" name="mdp" required>
                <span></span>
                <label>Mot de passe :</label>
            </div>
            <input type="submit" value="Sign up">
        </form>
    </div>
</body>
</html>