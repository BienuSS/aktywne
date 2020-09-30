<?php
    session_start();
    require("Db.class.php");
    $db = new Db();

   $login = $_POST['email'];
   $haslo1 = $_POST['haslo1'];
   $haslo2 = $_POST['haslo2'];
   $checkbox1 = isset($_POST['regulamin'])?$_POST['regulamin']:0;
   $checkbox2 = isset($_POST['polityka'])?$_POST['polityka']:0;
   $ip = $_SERVER['REMOTE_ADDR'];
   $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
   $token = str_shuffle($token);
   $token = substr($token, 0, 15);
  

  $db->bind("login", $login);
  $ilelogin=$db->single("SELECT COUNT(*) FROM uzytkownicy WHERE login = :login");

       $db->bind("token", $token);
       $ilosctoken=$db->single("SELECT COUNT(*) FROM uzytkownicy WHERE kod = :token");
       
function checktoken(){
       $db->bind("token", $token);
       $ilosctoken=$db->single("SELECT COUNT(*) FROM uzytkownicy WHERE kod = :token");
       $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
       $token = str_shuffle($token);
       $token = substr($token, 0, 15);

}


  if($ilosctoken != 0){
    checktoken();
  }
  else{

  }


if($login !='' && $haslo1 !='' && $haslo2 !='' && $checkbox1 == on && $checkbox2 == on){
   if ( $ilelogin == 0)
   {
      if ($haslo1 == $haslo2) 
      {
        $insert  =  $db->query("INSERT INTO uzytkownicy(login,haslo,email,rejestracja,logowanie,ip,kod)               
                    VALUES(:login,:haslo,:email,:rejestracja,:logowanie,:ip,:kod)",
                    array("login"=>$login,"haslo"=>md5($haslo1) ,"email"=> $login,"rejestracja"=>time(),"logowanie"=>time(),"ip"=>$ip,"kod"=>$token ));
              
                    $to   =    $login ;
                    $adres_od= "admin@aktywnedziecko.pl";
                    $subject = "Aktywacja konta";


              $message = '<html><body><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />';

              $message .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';

              $message .= "<tr><td style='background-color:white;'><center><img src='https://aktywne-dziecko.pl/logo2.jpg' height='150px'' alt='Aktywne Dziecko' /></center></td></tr>";

              $message .= "<tr><td colspan=2 style='background-color:white;'>Witamy ".$login.",<br /><br />Dziękujemy za założenie konta, po aktywacji będziesz mógł się zalogować używając poniższych danych<br><br> Login:  ".$login." <br><br> Haslo: ".$haslo1." <br><br> Aby aktywować swoje konto kliknij w link poniżej:<br> <a href ='http://www.aktywne-dziecko.pl/verify.php?hash=".$token."'>Aktywuj</a><br><br> Jeżeli link nie działa proszę wkleić do przeglądarki poniższy adres:<br>http://http://www.aktywne-dziecko.pl/verify.php?hash=".$token."<br><br></td></tr>";

              $message .= "<tr><td colspan=2 font='colr:#999999;' style='background-color:white;'><center>Niniejszy e-mail został automatycznie wygenerowany przez system powiadomień<br> serwisu aktywne-dziecko.pl. <br><br>

              Prosimy nie odpowiadać na tę wiadomość.<br><br>Wrazie jakich kolwiek problemów prosze pisać na adres: info@aktywne-dziecko.pl</center></td></tr>"; 

              $message .= "</table>";

              $message .= "</body></html>";


                                                 
                
                  $headers = 'From: "Aktywne Dziecko" <admin@aktywne-dziecko.pl>'."\r\n";
                  $headers .= 'MIME-Version: 1.0' . "\r\n";
                  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                            
                  $tmp = mail($to, $subject, $message, $headers);
                  if($tmp) $_SESSION["msg"] =' Konto zostało założone sprawdź skrzynke email!';
                  else $_SESSION["msg"] ='Wystąpił błąd';


        
      }

      else
              $_SESSION["msg"] ='Hasła nie są takie same'; 

              
      
   }

   else  
   {   
              $_SESSION["msg"] ='Podany email już istnieje'; 
    }

}
else{
 $_SESSION["msg"] ='Wypełnij poprawnie formularz';
 }            
              $_SESSION["button"] = 'signup.php';
              $response_array['status'] = 'success';    
              echo json_encode($response_array);
              
              

?>