<?php

	session_start();
	require("Db.class.php");
    $db = new Db();

   $id = $_POST['id'];
   $imie = $_POST['imie'];
   $nazwisko = $_POST['nazwisko'];
   $miasto = $_POST['miasto'];
   $telefon = $_POST['telefon'];
   $email = $_POST['email'];
   $haslo = $_POST['haslo'];
   $haslo2 = $_POST['haslo2'];
   $image_tmp = $_FILES['user_img']['tmp_name']; 
   $image_nazwa = $_FILES['user_img']['name']; 
   $image_rozmiar = $_FILES['user_img']['size'];
   $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
   $token = str_shuffle($token);
   $token = substr($token, 0, 15);

   $email1 = $db->single("SELECT `email` FROM `uzytkownicy` WHERE login=:id",
				array("id"=>$id ));	

function checktoken(){
       $db->bind("token", $token);
       $ilosctoken=$db->single("SELECT COUNT(*) FROM uzytkownicy WHERE kod = :token");
       $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
       $token = str_shuffle($token);
       $token = substr($token, 0, 15);

}


if(!empty($imie))
   {

   	$update = $db->query("UPDATE `uzytkownicy` SET imie = :imie WHERE login=:id",
				array("imie"=>$imie,"id"=>$id ));
   }
   else{}

if(!empty($nazwisko))
   {

   	$update = $db->query("UPDATE `uzytkownicy` SET nazwisko = :nazwisko WHERE login=:id",
				array("nazwisko"=>$nazwisko,"id"=>$id ));
   }
   else{}

if(!empty($miasto))
   {

   	$update = $db->query("UPDATE `uzytkownicy` SET miasto = :miasto WHERE login=:id",
				array("miasto"=>$miasto,"id"=>$id ));
   }
   else{}

if(!empty($telefon))
   {

   	$update = $db->query("UPDATE `uzytkownicy` SET telefon = :telefon WHERE login=:id",
				array("telefon"=>$telefon,"id"=>$id ));
   }
   else{}

if((!empty($email)) && $email != $email1)
   {

   	$update = $db->query("UPDATE `uzytkownicy` SET email = :email, confirm = :confirm, kod = :kod WHERE login=:id",
				array("email"=>$email, "confirm"=>0,"kod"=> $token, "id"=>$id ));

   					$to   =    $email ;
                    $adres_od= "admin@aktywnedziecko.pl";
                    $subject = "Aktywacja konta";


              $message = '<html><body><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />';

              $message .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';

              $message .= "<tr><td style='background-color:white;'><center><img src='https://aktywne-dziecko.pl/logo2.jpg' height='150px'' alt='Aktywne Dziecko' /></center></td></tr>";

              $message .= "<tr><td colspan=2 style='background-color:white;'>Witamy ".$login.",<br /><br />Prosimy o potwierdzenie zmiany adresu e-mail poprzez kliknięcie w link poniżej<br><br> <a href ='http://www.aktywne-dziecko.pl/verify.php?hash=".$token."'>Aktywuj</a><br><br> Jeżeli link nie działa proszę wkleić do przeglądarki poniższy adres:<br>http://http://www.aktywne-dziecko.pl/verify.php?hash=".$token."<br><br></td></tr>";

              $message .= "<tr><td colspan=2 font='colr:#999999;' style='background-color:white;'><center>Niniejszy e-mail został automatycznie wygenerowany przez system powiadomień<br> serwisu aktywne-dziecko.pl. <br><br>

              Prosimy nie odpowiadać na tę wiadomość.<br><br>Wrazie jakich kolwiek problemów prosze pisać na adres: info@aktywne-dziecko.pl</center></td></tr>"; 

              $message .= "</table>";

              $message .= "</body></html>";


                                                 
                
                  $headers = 'From: "Aktywne Dziecko" <administrator@aktywne-dziecko.pl>'."\r\n";
                  $headers .= 'MIME-Version: 1.0' . "\r\n";
                  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                            
                  $tmp = mail($to, $subject, $message, $headers);
                  if($tmp) $_SESSION["msg"] =' Konto zostało założone sprawdź skrzynke email!';
                  else $_SESSION["msg"] ='Wystąpił błąd';
   }
	 else{}

if((!empty($haslo)) && (!empty($haslo2)))
   {
   	if($haslo == $haslo2){
   	$update = $db->query("UPDATE `uzytkownicy` SET haslo = :haslo WHERE login=:id",
				array("haslo"=>md5($haslo),"id"=>$id ));

   	   		$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:green;font-size:1.1em;font-weight:bold;text-align:center; ">Hasło zostało zaktualizowane!</div>'; 

   }
   	else{

   		$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Wprowadź poprawne hasła!</div>'; 

   	}

   }
   else{


   }


$maxrozmiar = 5*1024*1024;
   $nazwazdjecie = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
   $nazwazdjecie = str_shuffle($token);
   $nazwazdjecie = substr($token, 0, 3);

if(is_uploaded_file($image_tmp)) { 

	if($image_rozmiar < $maxrozmiar){

		$odczyt = pathinfo($image_nazwa);
		$ext = $odczyt['extension'];

			if($ext == "jpg" || $ext == "jpeg" ||$ext == "png"){

					if(!file_exists("img/".$image_nazwa)){

							move_uploaded_file($image_tmp, "img/".$image_nazwa);

							$update = $db->query("UPDATE `uzytkownicy` SET zdjecie = :zdjecie WHERE login=:id",
										array("zdjecie"=>$image_nazwa,"id"=>$id )); 

							$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:green;font-size:1.1em;font-weight:bold;text-align:center; ">Wizytówka została zaktualizowana!</div>';
						}

					else{
				
						$image_nazwa=$nazwazdjecie.$image_nazwa;

						move_uploaded_file($image_tmp, "img/".$image_nazwa);

							$update = $db->query("UPDATE `uzytkownicy` SET zdjecie = :zdjecie WHERE login=:id",
										array("zdjecie"=>$image_nazwa,"id"=>$id )); 

							$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:green;font-size:1.1em;font-weight:bold;text-align:center; ">Wizytówka została zaktualizowana!</div>';
						}
						

					}
				

			else{

				$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Zły format zdjęcia!</div>';
			}		

		}

	else
		{
		$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Za duży rozmiar pliku!</div>'; 

		}
					    
	}	
else{

	$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Zdjęcie nie zostalo wczytane!</div>';
}	

 header("Location:ustawienia.php"); 

?> 