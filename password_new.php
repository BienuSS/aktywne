<?php
    session_start();
    require("Db.class.php");
    $db = new Db();

  $login  = $_SESSION["login"]; 
  $haslo1 = $_POST['haslo1'];
  $haslo2 = $_POST['haslo2'];

  $db->bind("login", $login);
  $ilelogin=$db->single("SELECT COUNT(*) FROM uzytkownicy WHERE login = :login");


   if ( $ilelogin != 0)
   {  
      if($haslo1 !='' && $haslo2 !=''){
            if ($haslo1 == $haslo2) 
                {
                  $insert  =  $db->query("UPDATE uzytkownicy SET haslo = :haslo  WHERE login = :login",
                              array("haslo"=>md5($haslo1),"login"=> $login ));

                  $delete  =  $db->query("UPDATE uzytkownicy SET kod_haslo = :kod_haslo  WHERE login = :login",
                              array("kod_haslo"=>0,"login"=> $login));

                               $_SESSION["msg"] ='Hasło zostało zmienione';


                  
                }

            else
                    $_SESSION["msg"] ='Hasła nie są takie same'; 

                    
            
         }

      else{
      $_SESSION["msg"] ='Wypełnij poprawnie formularz';
          }
    }

    else  $_SESSION["msg"] ='Błędny login';  
                
      unset($_SESSION["login"]);
      header('Location: https://aktywne-dziecko.pl/signup&result.php'); 
?>