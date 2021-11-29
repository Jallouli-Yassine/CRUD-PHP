
<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e'])){
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
}
?>
<?php 
    require_once "./../controllers/adherentC.php";
    $adherentC = new AdherentC();
    $listeAdherents = $adherentC->afficherAdhérent();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Title</title>
</head>

<body>

    <div class="container pos">
        <br><br>
        <a href="./ajouterAdherent.php" class="btn btn-primary">add adherent</a>
        <br><br>
        <table class="table">
            <tr>
                <th>num adherent</th>
                <th>nom</th>
                <th>prenom</th>
                <th>adresse</th>
                <th>email</th>
                <th>password</th>
                <th>date inscription</th>
                <th>delete</th>
                <th>update</th>
            </tr>
            <?php foreach($listeAdherents as $adherent) { ?>
            <tr>
                <td>
                    <?php echo $adherent['NumAdherent'] ?>
                </td>
                <td>
                    <?php echo $adherent['Nom'] ?>
                </td>
                <td>
                    <?php echo $adherent['Prenom'] ?>
                </td>
                <td>
                    <?php echo $adherent['Adresse'] ?>
                </td>
                <td>
                    <?php echo $adherent['Email'] ?>
                </td>
                <td>
                    <?php echo $adherent['password'] ?>
                </td>
                <td>
                    <?php echo $adherent['DateInscription'] ?>
                </td>
                <td>
                    <form action="./supprimerAdherent.php" method="POST">
                        <input class="btn btn-danger" type="submit" value="delete">
                        <input type="hidden" name="numAdherent" value="<?=$adherent['NumAdherent']?>">
                    </form>
                </td>
                <td>
                    <form action="./modifierAdherent.php" method="POST">
                        <input class="btn btn-warning" type="submit" value="update">
                        <input type="hidden" name="NumAdherent" value="<?=$adherent['NumAdherent']?>">
                    </form>
                </td>
            </tr>
            <?php }?>
        </table>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>