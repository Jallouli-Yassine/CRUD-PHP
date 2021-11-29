<?php 
    require_once "./../config.php";
    require_once "./../model/adherentM.php";

    class AdherentC{

        function afficherAdhérent() {
            $sql = "SELECT * FROM adherent";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch(Exception $e){
				$e->getMessage();
			}
        }

        function ajouterAdhérent($adherent){
            $sql = "INSERT INTO adherent(NumAdherent,Nom,Prenom,Adresse,Email,DateInscription,password,role)
            VALUES(:NumAdherent,:Nom,:Prenom,:Adresse,:Email,:DateInscription,:password,:role)";

            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'NumAdherent' => $adherent->getNumAdherent(),
                    'Nom' => $adherent->getNom(),
                    'Prenom' => $adherent->getPrénom(),
                    'Adresse' => $adherent->getAdresse(),
                    'Email' => $adherent->getEmail(),
                    'DateInscription' => $adherent->getDateInscription(),
                    'password' => $adherent->getPassword(),
                    'role' => $adherent->getRole(),
                ]);
            } catch(Exception $e){
				$e->getMessage();
			}
        }

        function supprimerAdhérent($NumAdherent){
            $db = config::getConnexion();
            $sql = "DELETE FROM adherent where NumAdherent=:NumAdherent";

            try {
                $query = $db->prepare($sql);
                $query->bindValue(':NumAdherent',$NumAdherent);
                $query->execute();
            }catch(Exception $e){
				$e->getMessage();
			}
        }
        /*
        UPDATE `adherent` SET `NumAdherent` = '2', `Nom` = 'jallouli4', `Prenom` = 'yassine4',
         `Adresse` = 'rue d\'Aumale4', `Email` = 'yassinejall2oulitech@gmail.com',
          `DateInscription` = '2021-11-03' WHERE `adherent`.`NumAdherent` = 1
        */ 
		function modifieradherent($adherent, $numadherent){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
				'UPDATE adherent SET
				Nom= :Nom,
				Prenom= :Prenom,
				Adresse= :Adresse,
				Email= :Email,
				DateInscription= :DateInscription
				WHERE NumAdherent= :NumAdherent');
				$query->execute([
					'Nom' => $adherent->getNom(),
					'Prenom' => $adherent->getPrénom(),
					'Adresse' => $adherent->getAdresse(),
					'Email' => $adherent->getEmail(),
					'DateInscription' => $adherent->getDateinscription(),
					'NumAdherent' => $numadherent
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();

			}
		}

        function getOneAdherent($NumAdherent) {
			$sql="SELECT * from adherent where NumAdherent=$NumAdherent";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $adherent;
			}
			catch (Exception $e){
				echo $e->getMessage();
			}
        }
        function getOneAdherentEmail($email) {
			$sql="SELECT * from adherent where Email='$email'";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $adherent;
			}
			catch (Exception $e){
				echo $e->getMessage();
			}
        }

        
		function connexionUser($email,$password){
            $sql="SELECT * FROM adherent WHERE Email='" . $email . "' and password = '". $password."'";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0) {
                    $message = "pseudo ou le mot de passe est incorrect";
                } else {
                    $x=$query->fetch();
                    $message = $x['role'];
                }
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
            }
          return $message;
        }
    }
?>