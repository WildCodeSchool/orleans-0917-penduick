<?php
// Connection DB

    // Param
    $db = "mysql:host=localhost;dbname=AuPenDuick;charset=utf8";
    $user = "root";
    $password = "mysql01";     // Pierre
//    $password = "";            // Dorian
//    $password = "";         // Fabien

    include "function/connect.php";
    $bdd = connect($db, $user, $password);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Au Pen Duick - Admin</title>

    <link rel="stylesheet" type="text/css" media="all" href="pierre.css" />
    <link rel="stylesheet" type="text/css" media="all" href="dorian.css" />
    <link rel="stylesheet" type="text/css" media="all" href="fabien.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<section class="container">
    <div class="row">
        <h2>Liste des textes</h2>
        <?php
        $req = $bdd->query("SELECT * FROM text") or die(print_r($bdd->errorInfo()));
        while ($data = $req->fetch()) { ?>
            <div class="col-xs-12">
                <form id="<?= $data['id'] ?>" action="" method="post">
                    <fieldset class="form-group">
                        <label for="text<?= $data['id'] ?>">Texte <?= $data['id'] ?></label>
                        <textarea id="text<?= $data['id'] ?>" class="form-control" name="<?= $data['id'] ?>" rows="4" cols="30"/>
                           <?= $data['text'] ?>
                        </textarea>
                    </fieldset>
                    <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Sauvegarder les changements</button>
                </form>
            </div>
        <?php } ?>
    </div>
</section>

</body>
</html>