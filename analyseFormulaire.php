<!DOCTYPE html>
<html>
<link rel="stylesheet" media="screen" type="text/css" title="design" href="design.css" />

<?php



include_once ("config/mysql.php");

$connect = mysql_connect($host,$login,$mdp)
or die("probleme de connexion");
$db = mysql_select_db($db ,$connect );
if (!$db)
die ('Impossible de selectionner la base de donnees :'.mysql_error());

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$commentaire = $_POST['commentaire'];

$requete="select idu from livreor where nom='$nom' and prenom='$prenom' and mail='$mail'";
$rep = mysql_query($requete,$connect);


if (mysql_num_rows($rep)==0)
{
// l'utilisateur n'existe pas dans la base, il faut l'inserer
$requete2="select max(idu) from livreor";
$rep2=mysql_query($requete2,$connect);
//$ligne=mysql_fetch_row($rep2);
$newidu=(int)($ligne[0])+1;

// on insere l'utilisateur avec ce $newidu
$requete3="INSERT INTO `livreor`(`idu`, `nom`, `prenom`, `mail`, `commentaire`) VALUES ('$idu','$prenom','$nom','$mail', '$commentaire')";
$rep3=mysql_query($requete3,$connect);



}

else
{
// l'utilisateur existe on recupere son idu
$enreg = mysql_fetch_row($rep);
$newidu=$enreg[0];

echo "Vous êtes déjà enregistré : <br/>";

//echo '<p><strong>' . $nom . '</strong> a écrit :<br />' . $commentaire . '</p>';

}



mysql_close();



?>
<meta charset="utf-8" />
<br/>
<br/>
<h1> votre message a bien été envoyé ! </h1>
<a href="contact.html"> Retour : page contact </a>
</html>



