<?php
session_start();
if(isset($_POST['enter'])){
$add = $_POST['message'];
$add2 = $_SESSION['username'];

if ($_SESSION['salon'] == 'salon1'){
  $file = fopen('salon1.txt', 'a');
	file_put_contents('salon1.txt', $add2, FILE_APPEND);
  fwrite($file, " : ");
  file_put_contents('salon1.txt', $add, FILE_APPEND);
	fwrite($file, "\n");
}

else if ($_SESSION['salon'] == 'salon2'){
  $file = fopen('salon1.txt', 'a');
	file_put_contents('salon2.txt', $add2, FILE_APPEND);
  fwrite($file, " : ");
  file_put_contents('salon2.txt', $add, FILE_APPEND);
	fwrite($file, "\n");
}

else if ($_SESSION['salon'] == 'salon3'){
  $file = fopen('salon3.txt', 'a');
	file_put_contents('salon3.txt', $add2, FILE_APPEND);
  fwrite($file, " : ");
  file_put_contents('salon3.txt', $add, FILE_APPEND);
	fwrite($file, "\n");
}

}

if (isset($_GET['deco'])&& $_GET['deco'] == "Se déconnecter")
{
  unset($_SESSION['salon']);
  unset($_SESSION['username']);

}
if (isset($_SESSION['salon']) && isset($_SESSION['username']))
  header('Location: salon.php');

?>




<!DOCTYPE html>
<html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link rel="stylesheet" lang>
</head>

<body style="text-align: center;">
	 <form action="salon.php" method="POST">
	 	 <p><label for="username">Username :</label>

       <span> <input type="text" id="username" name="username"  placeholder="T'es qui?"required minlength="1" maxlength="80" size="10" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>" /></span>
       <span><label for="salon">Salon :</label> </span>
       <span> <select id="salon" name="salon">
            <option value="salon1">Salon 1</option>
            <option value="salon2">Salon 2</option>
            <option value="salon3">Salon 3</option>
        </select></span>
        <br>
        <br>
        <span><input type="submit" value="Valider" name="submit" /></span>
      </form>

</body>
</html>