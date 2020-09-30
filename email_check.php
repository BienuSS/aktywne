<?php
    session_start();
    require("Db.class.php");
    $db = new Db();

   $login = $_POST['email'];

  $db->bind("login", $login);
  $ilelogin=$db->single("SELECT COUNT(*) FROM uzytkownicy WHERE login = :login");


   if ( $ilelogin == 0)
   {
              $response_array['status'] = 'success';    

              echo json_encode($response_array);
   }

   else


?>