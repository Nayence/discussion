<?php
session_start();
if(!isset($_SESSION['username'])){
	if(!isset($_POST['username']) || !isset($_POST['salon'])){
		header("Location: index.php"); 
	}
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['salon'] = $_POST['salon'];
}
if (isset($_POST['submit']) && $_POST['submit']=='Valider'){
	setcookie('username',$_POST['username'], time() + 365*24*3600, null, null, false, true);
}

$salon = $_SESSION['salon'];

if ($_SESSION['salon'] == 'salon1'){
	$fichier = fopen('salon1.txt', 'r+');
	$lignes = file('salon1.txt');
	$n = count($lignes);
}

else if ($_SESSION['salon'] == 'salon2'){
	$fichier = fopen('salon2.txt', 'r+');
	$lignes = file('salon2.txt');
	$n = count($lignes);
}

else if ($_SESSION['salon'] == 'salon3'){
	$fichier = fopen('salon3.txt', 'r+');
	$lignes = file('salon3.txt');
	$n = count($lignes);
}
?>



<!DOCTYPE html>
<html>

<html lang="fr">
<head>
  <meta charset="utf-8"  >
  <title>Salon</title>
  <link rel="stylesheet" lang="fr">
</head>

<body style="text-align: center;">
<h3><?= $salon?></h3>
	 Ton username: <?php echo $_SESSION['username']  ?> <br><br><br>



	<div id="msg"> 
	<p>Chat:</p> </div>
	<?php
	$nligne = 1;
	while ($nligne <= $n){
		$pages = fgets($fichier);
		echo $pages;
		echo "<br />";
		$nligne++;
	}
?>
<div><label for="message">Message :</label>
		<form action="index.php" method="post">
		<textarea id="message" name="message" rows="4" cols="50" placeholder="Poste un message" value="">
</textarea>
   <input type="submit" id="entrer" value="Entrer" name="enter" > 
</form>
	 	 <form action="index.php" method="get">
	 <input type="submit" value="Se déconnecter" name="deco" />
      </form>
	 	 </div>
</body>
</html>