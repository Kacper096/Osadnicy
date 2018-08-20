<?php
    session_start();

    if ((isset($_SESSION['zalogowany'])) &&($_SESSION['zalogowany']==true))
    {
        header('Location: gra.php');
        exit(); //od razu wychodzimy, dalszy kod się nie wykona
    }

   
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <title>Osadnicy - gra przeglądarkowa</title>
    <link href="css/default.css" rel="stylesheet" />
</head>
<body>
    Tylko martwi ujrzeli koniec wojny - Platon<br /><br />

    <a href="rejestracja.php"> Rejestracja - załóż darmowe konto!</a>

    <form action="zaloguj.php" method="post">
        Login:<br />
        <input type="text" name="login" /><br />
        Hasło:<br />
        <input type="password" name="haslo" /><br /><br />
        <input type="submit" value="Zaloguj się" />
    </form>

    <?php
    if (isset($_SESSION['blad'])) {
    echo $_SESSION['blad'];
    }
    ?>
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>
