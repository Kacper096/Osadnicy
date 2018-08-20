<?php
    session_start();

    if (!isset($_SESSION['udanarejestracja']) )  
	{
        header('Location: index.php');
        exit(); //od razu wychodzimy, dalszy kod się nie wykona
	}
	else 
	{
		unset($_SESSION['udanarejestracja']);
		unset($_SESSION['blad']);
	}

	//Usuwamy zmienne pamietające wartości wpisane do formularza
	if (isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
	if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
	if (isset($_SESSION['fr_haslo'])) unset($_SESSION['fr_haslo']);
	if (isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);

	//Usuwanie błędów rejestracji
	if (isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
	if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if (isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
	if (isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
	if (isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
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
    Dziękujemy za rejestrację w serwisie! Możesz już zalogować się do swojego konta! Życzymy udanego grania<br /><br />

    <a href="index.php"> Zaloguj się na swoje konto!</a>


   
</body>
</html>
