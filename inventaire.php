<?php 

session_start();
include 'security.php';
include 'user.php';


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sac</title>
</head>
<body>
	<h1>Sac</h1>
 		<ul>
 		<?php
		$link =create_link();
		$sql = mysqli_query($link,'SELECT * FROM listeinventaire');
		$sqld= mysqli_query($link,'SELECT * FROM Sac WHERE Dresseur="'.$nomcompte.'"');
		$valued=mysqli_fetch_assoc($sqld);	
		while ($value=mysqli_fetch_assoc($sql)) {
			if($valued['nb'.$value['Objet']]>0){
				echo '<fieldset><li>'.$value['Objet'].'<br>Type d\'Objet: '.$value['TypeO'].'<br>';
				if($value['TypeO']=="Pokeball") {
					echo "Permet de capturer des pokémons sauvages.";
					if($value['Objet']=="SuperBall") echo "Plus efficace qu'une PokeBall classique";
					if($value['Objet']=="HyperBall") echo "Plus efficace qu'une PokeBall et qu'une SuperBall";
				}
				else if($value['TypeO']=="Soin"){
					if($value['Objet']=="PotionMax") echo "Permet de redonner tous ses PV à un pokémon";
					else echo "Permet de redonner ".$value['PVSoin']." Pv à un pokémon";
				}
				else if($value['TypeO']=="Statut"){
					if($value['Objet']=="Antidote") echo "Permet de soigner un pokémon de l'empoisonnement";
					else if($value['Objet']=="AntiPara") echo "Permet de soigner un pokémon de la paralysie";
					else if($value['Objet']=="AntiBrule") echo "Permet de soigner un pokémon d'une brûlure";
					else if($value['Objet']=="AntiGel") echo "Permet de soigner un pokémon du gel";
					else if($value['Objet']=="Reveil") echo "Permet de réveiller un pokémon endormi";
				}
				else if($value['TypeO']=="Rappel"){
					echo "Permet de réanimer un pokémon K.O. et lui rendre ";
					if($value['Objet']=="Rappel") echo "la moitié de ses PV";
					else echo "tous ses PV";
				}
				else if($value['TypeO']=="PP"){
					if($value['Objet']=="Huile") echo "Rend 10 PP à une attaque d'un pokémon";
					else if($value['Objet']=="HuileMax") echo "Rend tous ses PP à une attaque d'un pokémon";
					else if($value['Objet']=="Elexir") echo "Rend 10 PP à toutes les attaques d'un pokémon";
					else echo "Rend tous ses PP à toutes les attaques d'un pokémon";
				}
				echo "<br>Quantité : ".$valued["nb".$value['Objet']]."<br>";
				echo "</li></fieldset>";
			}
		}
		?>
	</ul>
	<a href="log.php"><input type="button" name="menu" value="menu"></a>
</body>
</html>