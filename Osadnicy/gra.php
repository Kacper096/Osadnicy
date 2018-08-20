<?php
	session_start(); 

    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <?php
        echo "<p> Witaj ".$_SESSION['user'].'![<a href="logout.php">Wyloguj się!</a>]</p>';
        echo "<p><b>Drewno</b>: ".$_SESSION['drewno'];
        echo "| <b>Kamień</b>: ".$_SESSION['kamien'];
        echo "| <b>Zboże</b>: ".$_SESSION['zboze']."</p>";
        
        echo "<p><b>E-mail</b>: ".$_SESSION['email'];
        echo "<br/> <b>Dni premium</b>: ".$_SESSION['dnipremium']."</p>";
    ?>
</body>
</html>