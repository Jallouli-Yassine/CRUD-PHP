
<?php 
    require_once"./../controllers/adherentC.php";
    require_once"./../model/adherentM.php";

        if( isset($_POST['NumAdherent']) 
            && isset($_POST['Nom']) 
            && isset($_POST['Prenom']) 
            && isset($_POST['Adresse']) 
            && isset($_POST['Email']) 
            && isset($_POST['DateInscription'])
            && isset($_POST['password']))
            {

        if( !empty($_POST['NumAdherent'])&&
            !empty($_POST['Nom'])&&
            !empty($_POST['Prenom'])&&
            !empty($_POST['Adresse'])&&
            !empty($_POST['Email'])&&
            !empty($_POST['DateInscription'])&&
            !empty($_POST['password']))
            {
                $adherentC = new AdherentC();
                $adherent = new Adherent($_POST['NumAdherent'],
                $_POST['Nom'],
                $_POST['Prenom'],
                $_POST['Adresse'],
                $_POST['Email'],
                $_POST['DateInscription'],
                $_POST['password']
            );

                $adherentC->ajouterAdhérent($adherent);

                header("Location:./affichierListesAdh.php");
            }else
            echo "ERROR";
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./../styleCSS/index.css">
    <title>Title</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">ADD ADHERENT</h1>
        <form action="" method="post">

            <div class="form-outline">
                <input name="NumAdherent" type="text" id="NumAdherent" class="form-control" />
                <label class="form-label" for="NumAdherent">NumAdherent</label>
            </div>
            <div class="form-outline">
                <input name="Nom" type="text" id="Nom" class="form-control" />
                <label class="form-label" for="Nom">Nom</label>
            </div>
            <div class="form-outline">
                <input name="Prenom" type="text" id="Prenom" class="form-control" />
                <label class="form-label" for="Prenom">Prenom</label>
            </div>
            <div class="form-outline">
                <input name="Adresse" type="text" id="Adresse" class="form-control" />
                <label class="form-label" for="Adresse">Adresse</label>
            </div>
            <div class="form-outline">
                <input name="Email" type="email" id="Email" class="form-control" />
                <label class="form-label" for="Email">Email</label>
            </div>
            <div class="form-outline">
                <input name="password" type="password" id="password" class="form-control" />
                <label class="form-label" for="password">password</label>
            </div>
            <div class="form-outline">

                <input name="DateInscription" type="date" id="DateInscription" class="form-control" />
            </div>

            <input style="float:right;" type="submit" class="btn btn-black" value="add adherent">

        </form>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
</body>

</html>