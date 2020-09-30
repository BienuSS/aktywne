<?
session_start();
	require("Db.class.php");
    $db = new Db();

$_SESSION['zalogowany'] = false;

header('Location: https://aktywne-dziecko.pl'); 
session_destroy();
?>