<?php
function connect_bd($nomBd)
{
	$nomServeur='localhost'; 		//nom du seveur
	$login='root'; 			//login de l'utilisateur 
	$passWd=''; 			// mot de passe
	try
	{
		$cnx = new PDO("mysql:host=localhost;dbname=$nomBd", $login, $passWd);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnx->exec("SET CHARACTER SET utf8");

    // echo "connecté !";
    return $cnx;
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    echo $nomBd;
    die();
  }
}
function deconnect_bd($nomBd)
{
  $nomBd = null;
}
