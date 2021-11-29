
<?php
session_start();
include_once '../model/adherentM.php';
include_once '../controllers/adherentC.php';
$message="";
$userC = new AdherentC();
if (isset($_POST["email"]) && isset($_POST["password"])) {
    if (!empty($_POST["email"]) && !empty($_POST["password"]))
    { 
         $message=$userC->connexionUser($_POST["email"],$_POST["password"]);
         $_SESSION['e'] = $_POST["email"];// on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur
        if($message!='pseudo ou le mot de passe est incorrect'){
           header('Location:user.php');
          }else{
            $message='pseudo ou le mot de passe est incorrect';
        }
    }
    else
        $message = "Missing information";
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Title</title>
</head>

<body style="padding:10%">
<a href="./ajouterAdherent.php"  class="btn btn-warning mt-3">retour registre</a> <br><br>
<form action="" method="post">

<div class="form-outline">
    <input name="email" type="email" id="Email" class="form-control" />
    <label class="form-label" for="Email">Email</label>
</div>
<br>
<div class="form-outline">
    <input name="password" type="password" id="password" class="form-control" />
    <label class="form-label" for="password">password</label>
</div>

<br>
<input style="float:right;" type="submit" class="btn btn-black" value="add adherent">

</form>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
</body>

</html>