<?php
session_start();
// phpinfo();
$cnx = connect_bd('BDD_Sinetyc'); //ou domateam1.mysql.db  BDD_Sinetyc


class C_Utilisateur
{
  public $idUtilisateur;
  public $nom;
  public $prenom;
  public $ville;
  public $codePostal;
  public $email;
  public $password;
  //public $role;

  public function __construct($nom, $prenom, $ville, $codePostal, $password, $email)
  {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->ville = $ville;
    $this->codePostal = $codePostal;
    $this->password = $password;
    //$this->role = $role;
  }

  // Getters
  public function getIdUtilisateur()
  {
    return $this->idUtilisateur;
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function getPrenom()
  {
    return $this->prenom;
  }

  public function getVille()
  {
    return $this->ville;
  }

  public function getCodePostal()
  {
    return $this->codePostal;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getPassword()
  {
    return $this->password;
  }

  // public function getRole() {
  //     return $this->role;
  // }

  // Setters
  public function setIdUtilisateur($idUtilisateur)
  {
    $this->idUtilisateur = $idUtilisateur;
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
  }

  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
  }

  public function setVille($ville)
  {
    $this->ville = $ville;
  }

  public function setCodePostal($codePostal)
  {
    $this->codePostal = $codePostal;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  // public function setRole($role) {
  //     $this->role = $role;
  // }
}

class C_Parrain
{
  public $idParrain;
  public $dateSaisie;
  public $idUtilisateur;

  public function __construct($dateSaisie, $idUtilisateur)
  {
    $this->dateSaisie = $dateSaisie;
    $this->idUtilisateur = $idUtilisateur;
  }

  // Getters
  public function getIdParrain()
  {
    return $this->idParrain;
  }

  public function getDateSaisie()
  {
    return $this->dateSaisie;
  }

  public function getIdUtilisateur()
  {
    return $this->idUtilisateur;
  }


  // Setters
  public function setIdParrain($idParrain)
  {
    $this->idParrain = $idParrain;
  }

  public function setDateSaisie($dateSaisie)
  {
    $this->dateSaisie = $dateSaisie;
  }

  public function setIdUtilisateur($idUtilisateur)
  {
    $this->idUtilisateur = $idUtilisateur;
  }
}

class C_Filleul
{
  public $idFilleul;
  public $dateSaisie;
  public $vente;
  public $montant;
  public $idParrain;
  public $idUtilisateur;

  public function __construct($dateSaisie, $vente, $montant, $idParrain, $idUtilisateur)
  {
    $this->dateSaisie = $dateSaisie;
    $this->vente = $vente;
    $this->montant = $montant;
    $this->idParrain = $idParrain;
    $this->idUtilisateur = $idUtilisateur;
  }

  // Getters
  public function getIdFilleul()
  {
    return $this->idFilleul;
  }

  public function getDateSaisie()
  {
    return $this->dateSaisie;
  }

  public function getVente()
  {
    return $this->vente;
  }

  public function getMontant()
  {
    return $this->montant;
  }

  public function getIdParrain()
  {
    return $this->idParrain;
  }

  public function getIdUtilisateur()
  {
    return $this->idUtilisateur;
  }

  // Setters
  public function setIdFilleul($idFilleul)
  {
    $this->idFilleul = $idFilleul;
  }

  public function setDateSaisie($dateSaisie)
  {
    $this->dateSaisie = $dateSaisie;
  }

  public function setVente($vente)
  {
    $this->vente = $vente;
  }

  public function setMontant($montant)
  {
    $this->montant = $montant;
  }

  public function setIdParrain($idParrain)
  {
    $this->idParrain = $idParrain;
  }

  public function setIdUtilisateur($idUtilisateur)
  {
    $this->idUtilisateur = $idUtilisateur;
  }
}

class C_Admin
{
  public $idAdmin;
  public $idUtilisateur;

  public function __construct($idUtilisateur)
  {
    $this->idUtilisateur = $idUtilisateur;
  }

  // Getters
  public function getIdAdmin()
  {
    return $this->idAdmin;
  }

  public function getIdUtilisateur()
  {
    return $this->idUtilisateur;
  }

  // Setters
  public function setIdAdmin($idAdmin)
  {
    $this->idAdmin = $idAdmin;
  }

  public function setIdUtilisateur($idUtilisateur)
  {
    $this->idUtilisateur = $idUtilisateur;
  }
}

class C_Vendeur
{
  public $idVendeur;
  public $idUtilisateur;

  public function __construct($idUtilisateur)
  {
    $this->idUtilisateur = $idUtilisateur;
  }

  // Getters
  public function getIdVendeur()
  {
    return $this->idVendeur;
  }

  public function getIdUtilisateur()
  {
    return $this->idUtilisateur;
  }

  // Setters
  public function setIdVendeur($idVendeur)
  {
    $this->idVendeur = $idVendeur;
  }

  public function setIdUtilisateur($idUtilisateur)
  {
    $this->idUtilisateur = $idUtilisateur;
  }
}


//============================================================= ajout utilisateur 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $result = $cnx->prepare('INSERT INTO utilisateurs (nom, prenom, email, ville, codePostal, password) VALUES (:nom, :prenom, :email, :ville, :codePostal, :password)');

  $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $ville = filter_input(INPUT_POST, "ville", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $codePostal = filter_input(INPUT_POST, "codePostal", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  //$roleUtilisateur = filter_input(INPUT_POST, "roleUtilisateur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $cpassword = filter_input(INPUT_POST, "cpassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  //echo $roleUtilisateur;

  $result->bindParam(':nom', $nom, PDO::PARAM_STR);
  $result->bindParam(':prenom', $prenom, PDO::PARAM_STR);
  $result->bindParam(':email', $email, PDO::PARAM_STR);
  $result->bindParam(':ville', $ville, PDO::PARAM_STR);
  $result->bindParam(':codePostal', $codePostal, PDO::PARAM_STR);
  //$result->bindParam(':roleUtilisateur', $roleUtilisateur, PDO::PARAM_STR);

  $Verif = $cnx->prepare('SELECT email FROM utilisateurs WHERE email=:email');
  $Verif->bindParam(':email', $email, PDO::PARAM_STR);
  $Verif->execute();

  if ($verification = $Verif->fetch()) {
    echo "Erreur : cet email existe déjà !";
    deconnect_bd('BDD_Sinetyc');
  } else {
    if ($password != $cpassword) {
      echo "Erreur : le deuxième mot de passe est incorrect !";
      deconnect_bd('BDD_Sinetyc');
    } else {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $result->bindParam(':password', $hash, PDO::PARAM_STR);
      $result->execute();

      header("Location: index.php");
      exit;
    }
  }
}


//Fonction de connexion à la BD PDO  ######################################

function connect_bd($nomBd)
{
  

  $nomServeur='localhost'; 		//nom du seveur
  $login='root'; 			//login de l'utilisateur 
  $password=''; 			// mot de passe


  try {
    $cnx = new PDO("mysql:host=$nomServeur; dbname=$nomBd", $login  );
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnx->exec("SET CHARACTER SET utf8");

    return $cnx;
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    //echo $nomBd;
    die();
  }
}
function deconnect_bd($cnx)
{
  $cnx = null;
}


function fetch_column_from_result($result, $columnIndex)
{
    $data = array();

    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $data[] = $row[$columnIndex];
    }

    return $data;
}







?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOM SITE</title>


  <style>
    .container {
      margin: 20px;
    }

    .parrain-block {
      border: 1px solid #ddd;
      padding: 20px;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    table,
    th,
    td {
      border: 1px solid #ddd;
    }

    th,
    td {
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    form {
      display: inline-block;
    }

    .hidden {
      display: none;
    }





  </style>

</head>

<body>
  <div class="container">
    <form id="contact" class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <h3>Ajout utilisateur</h3>
      <h4></h4>

      <fieldset>
        <label for="prenom"></label>
        <input type="text" name="prenom" placeholder="Prénom" tabindex="1" required />
      </fieldset>

      <fieldset>
        <label for="nom"></label>
        <input type="text" name="nom" placeholder="Nom" tabindex="2" required />
      </fieldset>

      <fieldset>
        <label for="mail"></label>
        <input type="email" name="email" placeholder="Mail" tabindex="3" required />
      </fieldset>

      <fieldset>
        <label for="ville"></label>
        <input type="text" name="ville" placeholder="Ville" tabindex="4" required />
      </fieldset>

      <fieldset>
        <label for="codePostal"></label>
        <input type="text" name="codePostal" placeholder="Code Postal" tabindex="5" required />
      </fieldset>

      <!-- <fieldset>
        <label for="roleUtilisateur">
          <p>Vous êtes :</p>
          <p>vendeur<input type="radio" name="roleUtilisateur" id="roleUtilisateur_vendeur" value="vendeur" tabindex="6"
              required></p>
          <p>parrain<input type="radio" name="roleUtilisateur" id="roleUtilisateur_parrain" value="parrain" tabindex="7"
              required></p>
          <p>filleul<input type="radio" name="roleUtilisateur" id="roleUtilisateur_filleul" value="filleul" tabindex="8"
              required></p>
        </label>
      </fieldset> -->

      <fieldset>
        <label for="password"></label>
        <input type="password" name="password" placeholder="Mot De Passe" tabindex="9" required />
      </fieldset>

      <fieldset>
        <label for="cpassword"></label>
        <input type="password" name="cpassword" placeholder="Confirmez Mot De Passe" tabindex="10" required />
      </fieldset>

      <fieldset>
        <button name="submit" type="submit" value="envoyer" id="contact-submit"
          data-submit="...Sending">Ajouter</button>
      </fieldset>
    </form>
    <div class="row">
      <?php

      if ($cnx) {

        //Affiche tout les utilisateurs ======================================
      
        $result = $cnx->query('SELECT * FROM Utilisateurs');

        $listeDesUtilisateurs = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $utilisateur = new C_Utilisateur(
            $row['nom'],
            $row['prenom'],
            $row['ville'],
            $row['codePostal'],
            $row['password'],
            //$row['roleUtilisateur'],
            $row['email']
          );
          $utilisateur->setIdUtilisateur($row['idUtilisateur']);
          array_push($listeDesUtilisateurs, $utilisateur);
        }

        if ($listeDesUtilisateurs) {
          echo "<table border=1>";
          echo "<tr>";
          echo "<th>N° Utilisateur</th>";
          echo "<th>E-mail</th>";
          echo "<th>Nom</th>";
          echo "<th>Prenom</th>";
          echo "<th>Action</th>";
          echo "</tr>";

          foreach ($listeDesUtilisateurs as $utilisateur) {
            echo "<tr>";
            echo "<form action='" . $_SERVER['SCRIPT_NAME'] . "' method='post'>";
            echo "<td><input type='text' name='id' size='20' value='" . $utilisateur->getIdUtilisateur() . "' readonly></td>";
            echo "<td><input type='text' name='email' size='20' value='" . $utilisateur->getEmail() . "'></td>";
            echo "<td><input type='text' name='nom' size='20' value='" . $utilisateur->getNom() . "'></td>";
            echo "<td><input type='text' name='prenom' size='20' value='" . $utilisateur->getPrenom() . "'></td>";
            echo "<td><input type='submit' name='update' value='Modifier'> <input type='submit' name='delete' value='Supprimer'></td>";
            echo "</form>";
            echo "</tr>";
          }

          echo "</table>";

        } else {
          echo "Aucun enregistrement trouvé.";
        }

        $result->closeCursor();
      }
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";

      //Affichage requis  ==========================================================================================================================================
      
      $resultParrains = $cnx->query('SELECT * FROM Parrains');

      $listeDesParrains = array();

      while ($row = $resultParrains->fetch(PDO::FETCH_ASSOC)) {
        $parrain = new C_Parrain(
          $row['dateSaisie'],
          $row['idUtilisateur']
        );
        $parrain->setIdParrain($row['idParrain']);
        array_push($listeDesParrains, $parrain);
      }

      $resultFilleuls = $cnx->query('SELECT * FROM filleuls');

      $listeDesFilleuls = array();

      while ($row = $resultFilleuls->fetch(PDO::FETCH_ASSOC)) {
        $filleul = new C_Filleul(
          $row['dateSaisie'],
          $row['vente'],
          $row['montant'],
          $row['idParrain'],
          $row['idUtilisateur']
        );
        $filleul->setIdFilleul($row['idFilleul']);
        array_push($listeDesFilleuls, $filleul);
      }

      //affichage ajout parrain ==============================================
      
      echo "<table border=1>";
      echo "<tr>";
      echo "<th>Emai de l'utilisateur à ajouter en tant que parrain</th>";
      echo "<th>Date de Saisie</th>";
      echo "<th>Action</th>";
      echo "</tr>";

      echo "<form action='" . $_SERVER['SCRIPT_NAME'] . "' method='post'>";
      echo "<td><input type='email' name='emailUtilisateurToAddParrain' placeholder='Email utilisateur'></td>";
      echo "<td><input type='text' name='dateSaisieParrainToAdd' placeholder='Date Saisie' required /></td>";
      echo "<td><button type='submit' name='ajoutParrain' value='Ajouter parrain'>Ajouter parrain</button></td>";

      echo "</form>";
      echo "</table>";

      echo "<br>";
      echo "<br>";
      echo "<br>";

      // Affichage parrains ===========================================================================================
      if ($listeDesParrains) {
        foreach ($listeDesParrains as $parrain) {
          ?>
          <table border=1>
            <tr></tr>
            <!-- ########################### N° parrai  n -->
            <th>Email</th>
            <!-- ########################### ID Utilisateur-->
            <th>Nom parrain</th>
            <th>Date de Saisie</th>
            <th>Ville Parrain</th>
            <th>Code Postal Parrain</th>
            <th>Action</th>
            </tr>
            <?php
            $parrainUtilisateur = null;
            foreach ($listeDesUtilisateurs as $utilisateur) {
              if ($utilisateur->getIdUtilisateur() === $parrain->getIdUtilisateur()) {
                $parrainUtilisateur = $utilisateur;
                break;
              }
            }
            echo "<form action='" . $_SERVER['SCRIPT_NAME'] . "' method='post'>";
            echo "<tr>";
            echo "<td><input type='hidden' name='idUtilisateurParrain' size='20' value='" . $parrain->getIdUtilisateur() . "' readonly/>  <input type='hidden' name='idParrain' size='20' value='" . $parrain->getIdParrain() . "' readonly/>   <input type='mail' name='email' size='20' value='" . ($parrainUtilisateur ? $parrainUtilisateur->getEmail() : '') . "' /></td>";           ###########################
            echo "<td><input type='text' name='nomParrain' size='20' value='" . ($parrainUtilisateur ? $parrainUtilisateur->getNom() : '') . "'/></td>";
            echo "<td><input type='text' name='dateSaisie' size='20' value='" . $parrain->getDateSaisie() . "'/> </td>";
            echo "<td><input type='text' name='villeParrain' size='20' value='" . ($parrainUtilisateur ? $parrainUtilisateur->getVille() : '') . "'/></td>";
            echo "<td><input type='text' name='codePostalParrain' size='20' value='" . ($parrainUtilisateur ? $parrainUtilisateur->getCodePostal() : '') . "' /></td>";       ###########################
            echo "<td><input type='submit' name='detacheParrain' value='Détacher'/> <input type='submit' name='updateParrain' value='Modifier'/> <input type='submit' name='deleteParrain' value='Supprimer'/></td>";
            echo "</tr>";
            echo "</form>";

            // Affichage des filleuls par parrain ============================================
            echo "<tr>";
            echo "<td colspan='7'>";

            $filleulsDuParrain = array_filter($listeDesFilleuls, function ($filleul) use ($parrain) {
              return $filleul->getIdParrain() === $parrain->getIdParrain();
            });
            ?>
            <table border=1>
              <tr>
                <th class="hidden">N° Filleul</th> <!-- ###########################   ID filleuil -->
                <th>Email</th>
                <th>Nom Filleul</th>
                <th>Date de Saisie</th>
                <th>Ville Filleul</th>
                <th>Code Postal Filleul</th>
                <th>Vente</th>
                <th>Montant</th>
                <th class="hidden">ID Utilisateur Filleul</th> <!-- ###########################   ID filleuil -->
                <th>Action</th>
              </tr>
              <?php
              echo "<form action='" . $_SERVER['SCRIPT_NAME'] . "' method='post'>";
              echo "<td><input type='text' name='emailUtilisateurFilleulToAdd' placeholder='Email utilisateur' required /> <input type='hidden' name='idParrainToAddFilleul' value='" . $parrain->getIdParrain() . "'/></td>";
              echo "<td>";
              echo "<td><input type='text' name='dateSaisieFilleulToAdd' placeholder='Date Saisie' required /></td>";
              echo "<td>";
              echo "<td>";
              echo "<td><input type='text' name='venteFilleulToAdd' placeholder='Vente' required /></td>";
              echo "<td><input type='text' name='montantFilleulToAdd' placeholder='Montant'  /></td>";
              echo "<td><button type='submit' name='ajoutFilleul' value='Ajouter Filleul'>Ajouter Filleul</button></td>";
              echo "</form>";
              if (!empty($filleulsDuParrain)) {
                echo "<form action='" . $_SERVER['SCRIPT_NAME'] . "' method='post'>";
                foreach ($filleulsDuParrain as $filleul) {

                  $filleulUtilisateur = null;
                  foreach ($listeDesUtilisateurs as $utilisateur) {
                    if ($utilisateur->getIdUtilisateur() === $filleul->getIdUtilisateur()) {
                      $filleulUtilisateur = $utilisateur;
                      break;
                    }
                  }
                  echo "<tr>";
                  echo "<td><input type='text' name='nomFilleul' size='20' value='" . ($filleulUtilisateur ? $filleulUtilisateur->getEmail() : '') . "' /> <input type='hidden' name='idFilleul' size='20' value='" . $filleul->getIdFilleul() . "' readonly> <input type='hidden' name='idUtilisateurFilleul' size='20' value='" . $filleul->getIdUtilisateur() . "' readonly></td>";
                  echo "<td><input type='text' name='nomFilleul' size='20' value='" . ($filleulUtilisateur ? $filleulUtilisateur->getNom() : '') . "' /></td>";
                  echo "<td><input type='text' name='dateSaisieFilleul' size='20' value='" . $filleul->getDateSaisie() . "' /></td>";
                  echo "<td><input type='text' name='villeFilleul' size='20' value='" . ($filleulUtilisateur ? $filleulUtilisateur->getVille() : '') . "' /></td>";
                  echo "<td><input type='text' name='codePostalFilleul' size='20' value='" . ($filleulUtilisateur ? $filleulUtilisateur->getCodePostal() : '') . "' /></td>";
                  echo "<td><input type='text' name='venteFilleul' size='20' value='" . $filleul->getVente() . "' /></td>";
                  echo "<td><input type='text' name='montantFilleul' size='20' value='" . $filleul->getMontant() . "' /></td>";
                  echo "<td><input type='submit' name='detacheFilleul' value='Détacher'/><input type='submit' name='updateFilleul' value='Modifier'/><input type='submit' name='deleteFilleul' value='Supprimer'/></td>";
                  echo "</tr>";
                }
                echo "</form>";
              } else {
                echo "Aucun filleul trouvé pour ce parrain.";
              }

              echo "</td>";
              echo "</tr>";
              echo "</table>";
              echo "</table>";
              echo "<br>";
              echo "<br>";
              echo "<br>";
        }
      }

      // Gestion modif et supp parrains ===========================================================================================
      
      $result->closeCursor();

      if (isset($_POST['deleteParrain'])) {
        $checkFilleuls = $cnx->prepare("SELECT COUNT(*) FROM filleuls WHERE idParrain = :idParrain");
        $checkFilleuls->bindParam(':idParrain', $_POST['idParrain'], PDO::PARAM_INT);
        $checkFilleuls->execute();
        $filleulCount = $checkFilleuls->fetchColumn();

        if ($filleulCount > 0) {
          echo "Impossible de supprimer le parrain. Un ou plusieurs Filleuls lui sont attribués.";
        } else {
          $deleteParrain = $cnx->prepare("DELETE FROM Parrains WHERE idParrain = :idParrain");
          $deleteParrain->bindParam(':idParrain', $_POST['idParrain'], PDO::PARAM_INT);
          $deleteParrain->execute();

          if ($deleteParrain->rowCount() > 0) {
            echo "✅ L'utilisateur affilié à ce parrain a bien été supprimé";
          } else {
            echo "❌ L'utilisateur affilié à ce parrain n'a pas pu etre supprimé";
          }
          //header("Location: " . $_SERVER['PHP_SELF']);                  
          header("Location: index.php");
          exit();
        }

        // Update parrain ====================================================================================================
      
      } elseif (isset($_POST['updateParrain'])) {
        var_dump($_POST);
        $updateParrain = $cnx->prepare("UPDATE parrains SET dateSaisie=:dateSaisie WHERE idParrain=:idParrain");
        $updateParrain->bindParam(':dateSaisie', $_POST['dateSaisie'], PDO::PARAM_STR);
        $updateParrain->bindParam(':idParrain', $_POST['idParrain'], PDO::PARAM_INT);
        $updateParrain->execute();

        $updateUtilisateur = $cnx->prepare("UPDATE Utilisateurs SET nom=:nomParrain, ville=:villeParrain, codePostal=:codePostalParrain WHERE idUtilisateur=:idUtilisateurParrain");
        $updateUtilisateur->bindParam(':nomParrain', $_POST['nomParrain'], PDO::PARAM_STR);
        $updateUtilisateur->bindParam(':villeParrain', $_POST['villeParrain'], PDO::PARAM_STR);
        $updateUtilisateur->bindParam(':codePostalParrain', $_POST['codePostalParrain'], PDO::PARAM_STR);
        $updateUtilisateur->bindParam(':idUtilisateurParrain', $_POST['idUtilisateurParrain'], PDO::PARAM_INT);
        $updateUtilisateur->execute();

        if ($updateParrain->rowCount() > 0 && $updateUtilisateur->rowCount() > 0) {
          echo "✅ Le parrain a bien été mis à jour";
        } else {
          echo "❌ Le parrain n'a pas pu etre mis à jour";
        }
        echo '<script>window.location.replace("' . $_SERVER['PHP_SELF'] . '");</script>';               
        exit();

        // Detache parrain =========================================================================================================
      
      } elseif (isset($_POST['detacheParrain'])) {

        $checkFilleuls = $cnx->prepare("SELECT COUNT(*) FROM filleuls WHERE idParrain = :idParrain");
        $checkFilleuls->bindParam(':idParrain', $_POST['idParrain'], PDO::PARAM_INT);
        $checkFilleuls->execute();
        $filleulCount = $checkFilleuls->fetchColumn();

        if ($filleulCount > 0) {
          echo "❌ Impossible de détacher le parrain. Un ou plusieurs Filleuls lui sont attribués.";
        } else {
          $idParrainToDetach = $_POST['idParrain'];
          $detacheParrain = $cnx->prepare("DELETE FROM parrains WHERE idParrain=:idParrain");
          $detacheParrain->bindParam(':idParrain', $_POST['idParrain'], PDO::PARAM_STR);
          $detacheParrain->execute();

          if ($detacheParrain->rowCount() > 0) {
            echo "✅ Le parrain a été détaché avec succès";
          } else {
            echo "❌ Le parrain n'a pas pu etre détaché";
          }
          echo '<script>window.location.replace("' . $_SERVER['PHP_SELF'] . '");</script>';
          exit();
        }

        // Ajout Filleul  ======================================================================================
      
      } elseif (isset($_POST['ajoutFilleul'])) {
        $idParrainToAdd = $_POST['idParrainToAddFilleul'];
        $dateSaisieFilleul = $_POST['dateSaisieFilleulToAdd'];
        $venteFilleul = $_POST['venteFilleulToAdd'];
        $montantFilleul = $_POST['montantFilleulToAdd'];
        if($montantFilleul == null){
          $montantFilleul = 0;
        }
        $emailUtilisateurFilleulToAdd = $_POST['emailUtilisateurFilleulToAdd'];

        $findIdUtilisateurByEmail = $cnx->prepare("SELECT idUtilisateur FROM Utilisateurs WHERE email=:emailUtilisateurFilleulToAdd");
        $findIdUtilisateurByEmail->bindParam(':emailUtilisateurFilleulToAdd', $emailUtilisateurFilleulToAdd, PDO::PARAM_STR);
        $findIdUtilisateurByEmail->execute();

        $idUtilisateurTrouvee = $findIdUtilisateurByEmail->fetch(PDO::FETCH_COLUMN);

        $verif = $cnx->prepare("SELECT idParrain FROM Filleuls WHERE idParrain=:idParrainToAddFilleul");
        $verif->bindParam(':idParrainToAddFilleul', $idParrainToAdd, PDO::PARAM_STR);
        $verif->execute();
        $idParrainTrouvee = $verif->fetch(PDO::FETCH_COLUMN);
        //echo $idTrouvee;
        //echo $idParrain;

        if ($idUtilisateurTrouvee) {
          if ($verif) {

            // isertion du filleul dans la bddd
            $insertFilleul = $cnx->prepare("INSERT INTO filleuls (dateSaisie, vente, montant, idParrain, idUtilisateur) VALUES (:dateSaisie, :vente, :montant, :idParrain, :idUtilisateur)");
            $insertFilleul->bindParam(':dateSaisie', $dateSaisieFilleul, PDO::PARAM_STR);
            $insertFilleul->bindParam(':vente', $venteFilleul, PDO::PARAM_STR);
            $insertFilleul->bindParam(':montant', $montantFilleul, PDO::PARAM_STR);
            $insertFilleul->bindParam(':idParrain', $idParrainToAdd, PDO::PARAM_INT);
            $insertFilleul->bindParam(':idUtilisateur', $idUtilisateurTrouvee, PDO::PARAM_INT);
            $insertFilleul->execute();

            if ($insertFilleul->rowCount() > 0) {
              echo "✅ Le filleuil a bien été ajouté au parrain";
            } else {
              echo "❌ Le filleuil n'a pas pu etre ajouté au parrain";
            }
            echo '<script>window.location.replace("' . $_SERVER['PHP_SELF'] . '");</script>';
            exit();
          } else {
            echo "a $idParrainTrouvee";
            echo " b $idParrainToAdd";
            echo "❌ Le filleul est déjà affilié à un parrain.";
          }
        } else {
          echo "❌ Le mail fourni n'est pas référencé.";
        }
      }
      echo "<br>";

      // Gestion modif et supp filleuls ===========================================================================================
      
      if (isset($_POST['deleteFilleul'])) {
        $deleteFilleul = $cnx->prepare("DELETE FROM filleuls WHERE idFilleul=:idFilleul");
        $deleteFilleul->bindParam(':idFilleul', $_POST['idFilleul'], PDO::PARAM_INT);
        $deleteFilleul->execute();

        if ($deleteFilleul->rowCount() > 0) {
          echo "✅ L'utilisateur affilié à ce filleul a bien été supprimé";
        } else {
          echo "❌ L'utilisateur affilié à ce filleul n'a pas pu etre supprimé";
        }
        echo '<script>window.location.replace("' . $_SERVER['PHP_SELF'] . '");</script>';
        exit();

        // Update Filleul =====================================================================================================
      
      } elseif (isset($_POST['updateFilleul'])) {
        var_dump($_POST);
        $updateFilleul = $cnx->prepare("UPDATE filleuls SET dateSaisie=:dateSaisieFilleul, vente=:venteFilleul, montant=:montantFilleul WHERE idFilleul=:idFilleul");
        $updateFilleul->bindParam(':dateSaisieFilleul', $_POST['dateSaisieFilleul'], PDO::PARAM_STR);
        $updateFilleul->bindParam(':venteFilleul', $_POST['venteFilleul'], PDO::PARAM_STR);
        $updateFilleul->bindParam(':montantFilleul', $_POST['montantFilleul'], PDO::PARAM_STR);
        $updateFilleul->bindParam(':idFilleul', $_POST['idFilleul'], PDO::PARAM_INT);
        $updateFilleul->execute();

        $updateUtilisateur = $cnx->prepare("UPDATE Utilisateurs SET nom=:nomFilleul, ville=:villeFilleul, codePostal=:codePostalFilleul WHERE idUtilisateur=:idUtilisateurFilleul");
        $updateUtilisateur->bindParam(':nomFilleul', $_POST['nomFilleul'], PDO::PARAM_STR);
        $updateUtilisateur->bindParam(':villeFilleul', $_POST['villeFilleul'], PDO::PARAM_STR);
        $updateUtilisateur->bindParam(':codePostalFilleul', $_POST['codePostalFilleul'], PDO::PARAM_STR);
        $updateUtilisateur->bindParam(':idUtilisateurFilleul', $_POST['idUtilisateurFilleul'], PDO::PARAM_INT);
        $updateUtilisateur->execute();

        if ($updateFilleul->rowCount() > 0) {
          echo "✅ Le filleul a bien été mis à jour";
        } else {
          echo "❌ Le filleul n'a pas pu etre mis à jour";
        }
        echo '<script>window.location.replace("' . $_SERVER['PHP_SELF'] . '");</script>';
        exit();

        //Detache filleul ================================================================================================================
      
      } elseif (isset($_POST['detacheFilleul'])) {

        $idFilleulToDetach = $_POST['idFilleul'];
        $detacheFilleul = $cnx->prepare("DELETE FROM filleuls WHERE idFilleul=:idFilleul");
        $detacheFilleul->bindParam(':idFilleul', $_POST['idFilleul'], PDO::PARAM_STR);
        $detacheFilleul->execute();

        if ($detacheFilleul->rowCount() > 0) {
          echo "✅ Filleul détaché avec succès.";
        } else {
          echo "❌ Échec du détachement du filleul.";
        }
        echo '<script>window.location.replace("' . $_SERVER['PHP_SELF'] . '");</script>';
        exit();
      }

      echo "<br>";

      //gestion suppr modif utilisateurs ======================================================================
      
      if (isset($_POST['delete'])) {
        $result = $cnx->prepare("DELETE FROM Utilisateurs WHERE idUtilisateur = :id");
        $result->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
        $result->execute();

        if ($result->rowCount() > 0) {
          echo "✅ Utilisateur supprimé";
        } else {
          echo "❌ L'utilisateur n'a pas pu etre supprimé";
        }
        echo '<script>window.location.replace("' . $_SERVER['PHP_SELF'] . '");</script>';
        exit();

      } elseif (isset($_POST['update'])) {
        $result = $cnx->prepare("UPDATE Utilisateurs SET nom=:nom, email=:email, prenom=:prenom WHERE idUtilisateur=:id");
        $result->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
        $result->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $result->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $result->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
        $result->execute();

        if ($result->rowCount() > 0) {
          echo "✅ Utilisateur MàJ";
        } else {
          echo "❌ L'utilisateur n'a pas pu etre MàJ";
        }
        echo '<script>window.location.replace("' . $_SERVER['PHP_SELF'] . '");</script>';
        exit();

        // Ajout parrain ====================================================================================================================
      
      } elseif (isset($_POST['ajoutParrain'])) {

        $dateSaisieParrainToAdd = $_POST['dateSaisieParrainToAdd'];
        $emailUtilisateurToAddParrain = $_POST['emailUtilisateurToAddParrain'];

        $findIdUtilisateurByEmail = $cnx->prepare("SELECT idUtilisateur FROM Utilisateurs WHERE email=:emailUtilisateurToAddParrain");
        $findIdUtilisateurByEmail->bindParam(':emailUtilisateurToAddParrain', $emailUtilisateurToAddParrain, PDO::PARAM_STR);
        $findIdUtilisateurByEmail->execute();

        $idUtilisateurTrouvee = $findIdUtilisateurByEmail->fetch(PDO::FETCH_COLUMN);

        if ($idUtilisateurTrouvee) {

          $insertParrain = $cnx->prepare("INSERT INTO Parrains (dateSaisie, idUtilisateur) VALUES (:dateSaisie, :idUtilisateur)");
          $insertParrain->bindParam(':dateSaisie', $dateSaisieParrainToAdd, PDO::PARAM_STR);
          $insertParrain->bindParam(':idUtilisateur', $idUtilisateurTrouvee, PDO::PARAM_INT);
          $insertParrain->execute();

          if ($insertParrain->rowCount() > 0) {
            echo "✅ Le parrain a bien été ajouté.";
          } else {
            echo "❌ Le parrain n'a pas pu etre ajouté.";
          }
          echo '<script>window.location.replace("' . $_SERVER['PHP_SELF'] . '");</script>';
          exit();
        } else {
          echo "❌ Le mail fourni n'est pas référencé.";
        }
      }
      echo "</table>";
      echo "<br>";
      ?>
    </div>
  </div>
</body>
</html>