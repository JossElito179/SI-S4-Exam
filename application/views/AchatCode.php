<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat Code</title>
</head>
<body>

    <form action="<?php echo site_url('code/achatCode'); ?>" method="post">
        Code <input type="text" name="code">
        <input type="submit" value="valider">
    </form>

    <?php 

        if(isset($dejaAcheter)){ ?>
                <p>Deja acheter</p>
    <?php   }

        foreach($listeCode as $liste){
            echo $liste['code'];
            echo '<br>';
        }
    ?>

    
</body>
</html>