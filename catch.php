<?php 
session_start();
include 'security.php';
include 'user.php';
if (!isset($_SESSION['idpokemonsauvage'])) {
	header("location: login.php");
}
$idpokemonsauvage = $_SESSION['idpokemonsauvage'];
$nompoke=NomDepuisID($idpokemonsauvage);
Catch_Pokemon($nomcompte,$idpokemonsauvage);
$_SESSION['idpokemonsauvage']=NULL;
unset($_COOKIE['idpokemonsauvage']);
setcookie('idpokemonsauvage', '', time() - 3600);
unset($_COOKIE['pokemonsauvage[HP]']);
setcookie('pokemonsauvage[HP]', '', time() - 3600);
unset($_COOKIE['pokemonsauvage[ID]']);
setcookie('pokemonsauvage[ID]', '', time() - 3600);


unset($_COOKIE['pokemonjoueur[ID]']);
setcookie('pokemonjoueur[ID]', '', time() - 3600);
unset($_COOKIE['pokemonjoueur[HP]']);
setcookie('pokemonjoueur[HP]', '', time() - 3600);
unset($_COOKIE['pokemonjoueur[GAINXP]']);
setcookie('pokemonjoueur[GAINXP]', '', time() - 3600);


unset($_COOKIE['tour']);
setcookie('tour', '', time() - 3600);


for ($i=0; $i < 5  ; $i=$i+1) { 
	unset($_COOKIE['team['.$i.'][HP]']);
	setcookie('team['.$i.'][HP]', '', time() - 3600);
	unset($_COOKIE['team['.$i.'][ID]']);
	setcookie('team['.$i.'][ID]', '', time() - 3600);
	unset($_COOKIE['team['.$i.'][GAINXP]']);
	setcookie('team['.$i.'][GAINXP]', '', time() - 3600);
}

 ?>


 <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p id="texte"></p>
</body>
<script type="text/javascript">
var text = "... <?php echo $nompoke; ?> a été attrapé";
setTimeout(function(){Texte_catch(0);},1000);
function Texte_catch(a) {
	p = document.getElementById("texte");
	p.innerHTML=p.innerHTML+text.charAt(a);
	if (a<text.length) {
	if (a>2) {setTimeout(function(){Texte_catch(a+1);},50)}
	else{setTimeout(function(){Texte_catch(a+1);},1000);}
	}
	else if (a == text.length){setTimeout(function(){window.location="log.php";},3000);}
	


}








</script>
</html>