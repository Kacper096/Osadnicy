<?php
	session_start();
	require_once"connect.php";

	if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) {	//jesli wyslemy formularz bez wypelnienia
	header('Location: index.php');
	exit();
}



	$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);	// @ operator kontroli bledow, gdy php wyrzuci error uzytkownik nie bedzie tego widzial

	if ($polaczenie->connect_errno!=0) {	//sprawdzamy czy udalo sie polaczyc z baza
	echo "Error: ".$polaczenie->connect_errno;	//wypisanie erroru
	}else {
	$login = $_POST["login"];
	$haslo = $_POST['haslo'];

	$login = htmlentities($login,ENT_QUOTES,"UTF-8");	//ENT_QUOTES zmienia apostrofy i cudzyslowia na encje
	

	if ($rezultat = @$polaczenie->query(
	sprintf( "SELECT * FROM uzytkownicy WHERE user='%s' ",
	mysqli_real_escape_string($polaczenie,$login))))	//funkcja ta chroni przed wstrzykiwaniem SQL, funkcji tej powinno sie uzywac za kazdym razem gdy od uzytkownika oraz gdy uzywamy do zapytan SQL
	{
	$ilu_users = $rezultat->num_rows;
		if ($ilu_users > 0) {

			$wiersz = $rezultat->fetch_assoc();		//tworzy tablicę assocjacyjna o indeksach nazwaych tak jak w bazie


			if (password_verify($haslo, $wiersz['pass']))
			{
			
			

				$_SESSION['zalogowany'] = true;		//okresla czy ktos jest zalogowany

			
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['user'] = $wiersz['user'];
				$_SESSION['drewno'] = $wiersz['drewno'];
				$_SESSION['kamien'] = $wiersz['kamien'];
				$_SESSION['zboze'] = $wiersz['zboze'];
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['dnipremium'] = $wiersz['dnipremium'];

				unset($_SESSION['blad']);
				$rezultat->free_result();	//zwalnia pamięć rezultatu zapytania
				header('Location: gra.php');
			}else 
			{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
			}
		}else {
			
			$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
			header('Location: index.php');
		}
			}

	$polaczenie->close();	//zamykamy polaczenie
}



?>