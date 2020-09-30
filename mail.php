<?php
			$to   = "bienius.234@gmail.com";
 			$from= "admin@aktywnedziecko.pl";

            $subject = "Aktywacja konta"; // Give the email a subject 


$message = '<html><body><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />';

$message .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';

$message .= "<tr><td style='background-color:white;'><center><img src='https://iv.pl/images/77329345592565459575.jpg' height='150px'' alt='Aktywne Dziecko' /></center></td></tr>";

              $message .= "<tr><td colspan=2 style='background-color:white;'>Witamy ".$login.",<br /><br />Dziękujemy za założenie konta, po aktywacji będziesz mógł się zalogować używając poniższych danych<br><br> Login:  ".$login." <br><br> Haslo: ".$haslo1." <br><br> Aby aktywować swoje konto kliknij w link poniżej:<br> <a href ='http://www.aktywne-dziecko.pl/verify.php?email=".$login."&hash=".$token."'>Aktywuj</a><br><br> Jeżeli link nie działa proszę wkleić do przeglądarki poniższy adres:<br>http://http://www.aktywne-dziecko.pl/verify.php?email=".$login."&hash=".$token."<br><br></td></tr>";

              $message .= "<tr><td colspan=2 font='colr:#999999;' style='background-color:white;'><center>Niniejszy e-mail został automatycznie wygenerowany przez system powiadomień<br> serwisu aktywne-dziecko.pl. <br><br>

              Prosimy nie odpowiadać na tę wiadomość.<br><br>Wrazie jakich kolwiek problemów prosze pisać na adres: info@aktywne-dziecko.pl</center></td></tr>"; 

              $message .= "</table>";

              $message .= "</body></html>";


                                   
 	
                
                
                  $headers = 'From: "Aktywne Dziecko" <administrator@aktywne-dziecko.pl>'."\r\n";
                  $headers .= 'MIME-Version: 1.0' . "\r\n";
                  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

              
    $tmp = mail($to, $subject, $message, $headers);
    if($tmp) echo 'Wysłano!';
    else echo $headers;
?>