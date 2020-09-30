<?php
    session_start();
    require("Db.class.php");
    $db = new Db();

   $login = $_POST['email_reset'];
   $kodhaslo = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
   $kodhaslo = str_shuffle($kodhaslo);
   $kodhaslo = substr($kodhaslo, 0,15);
  

    $db->bind("login1", $login);
    $confirm=$db->single("SELECT COUNT(*) FROM uzytkownicy WHERE login = :login1");


if($confirm != 0)
{
          $update = $db->query("UPDATE uzytkownicy SET kod_haslo=:kod_haslo WHERE login = :login",
                          array("kod_haslo"=>$kodhaslo,"login"=>$login));



          $to   =    $login ;
                    $adres_od= "admin@aktywnedziecko.pl";
                    $subject = "Przypomnienie hasła";


              $message = '<html><body><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />';

              $message .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';

              $message .= "<tr><td style='background-color:white;'><center><img src='https://aktywne-dziecko.pl/logo2.jpg' height='150px'' alt='Aktywne Dziecko' /></center></td></tr>";

              $message .= "<tr><td colspan=2 style='background-color:white;'>Witamy ".$login.",<br /><br />Aby zmienić hasło dostępu do konta proszę kliknąć w poniższy link:<br><br><a href='https://aktywne-dziecko.pl/password_change.php?kzh=".$kodhaslo."&id=".$login."'>https://aktywne-dziecko.pl/password_change.php?kzh=".$kodhaslo."&id=".$login."</a><br><br></td></tr>";

              $message .= "<tr><td colspan=2 font='colr:#999999;' style='background-color:white;'><center>Niniejszy e-mail został automatycznie wygenerowany przez system powiadomień<br> serwisu aktywne-dziecko.pl.<br><br>

              Prosimy nie odpowiadać na tę wiadomość.<br><br>Wrazie jakich kolwiek problemów prosze pisać na adres: info@aktywne-dziecko.pl</center></td></tr>"; 

              $message .= "</table>";

              $message .= "</body></html>";


                                                 
                
                  $headers = 'From: "Aktywne Dziecko" <administrator@aktywne-dziecko.pl>'."\r\n";
                  $headers .= 'MIME-Version: 1.0' . "\r\n";
                  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                            
                  $tmp = mail($to, $subject, $message, $headers);
                  if($tmp) $_SESSION["msg"] ='E-mail z hasłem został wysłany!';
                  else $_SESSION["msg"] ='Wystąpił błąd';  
}
else
{
  $_SESSION["msg"] ='Na podany adres e-mail nie zostało założone konto!';  

}

header("Location:signup&result.php"); 
?>