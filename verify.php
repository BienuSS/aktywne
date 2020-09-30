<?php
    session_start();
    require("Db.class.php");
    $db = new Db();

    $hash = $_GET['hash'];

    $db->bind("hash", $hash);
    $confirm=$db->single("SELECT COUNT(*) FROM uzytkownicy WHERE kod = :hash");
    
    if($confirm == 1)
    {
      $update_4 = $db->query("UPDATE uzytkownicy SET confirm=:confirm WHERE kod = :kod",
                          array("confirm"=>1,"kod"=>$hash));

      $_SESSION["msg"] ='Konto zostało potwierdzone
      ';
    }

    else {
      $_SESSION["msg"] ='Wystąpił błąd';

    }
    
    header("Location:signup&result.php"); 
?>