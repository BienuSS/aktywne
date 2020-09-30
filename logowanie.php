<?php
session_start();
	require("Db.class.php");
    $db = new Db();



   $login = $_POST['login'];
   $haslo = $_POST['haslo'];
   $ip = $_SERVER['REMOTE_ADDR'];


  $db->bind("login", $login);
  $db->bind("haslo", md5($haslo));
  $loginhaslo =$db->single("SELECT COUNT(*) FROM uzytkownicy WHERE login = :login AND haslo = :haslo ");

  $db->bind("login", $login);
  $kontoconfirm =$db->single("SELECT confirm FROM uzytkownicy WHERE login = :login");



if ($loginhaslo > 0)

   {

    $update = $db->query("UPDATE uzytkownicy SET logowanie=:logowanie WHERE login=:login",
                          array("logowanie"=> time() ,"login"=>$login ));

    $update2 = $db->query("UPDATE uzytkownicy SET ip=:ip WHERE login=:login",
                          array("ip"=> $ip ,"login"=>$login ));

            if($kontoconfirm == 1)
              {
                  
                  $_SESSION['zalogowany'] = true;
                  $_SESSION['login'] = $login;
                  $response_array['status'] = 'success';    
                  echo json_encode($response_array);
                  header("Location:index.php"); 
              }
            else
            
            $_SESSION["msg"] ='Potwierdz konto!<form action="sendemail.php" method="post" class="email_again"><input id="email-button" type="submit" style="border-radius:5px;border-color:#C7EDE6;border-style:solid;width:50%;  margin-top:2%;height:10%;margin-left:auto;margin-right:auto;background-color:white;cursor:pointer;" value="Wyslij ponownie email" name="loguj">

          </form>';
            $_SESSION["login"]=$login; 
             header("Location:signup&result.php"); 
             

   }

      else
    {
          $_SESSION["msg"] ='Wprowadzono złe dane'; 
          header("Location:signup&result.php"); 
    }
    
    $_SESSION["button"] = 'login.php';

?>