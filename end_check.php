<?php

	session_start();
	require("Db.class.php");
  $db = new Db();

 $id = $_GET['id'];

  if(!empty($id)){

               

                $db->bind("login", $_SESSION["login"]);
                $query1 = "SELECT `id` FROM `uzytkownicy` WHERE login = :login";
                $login = $db->single($query1);

                $db->bind("id", $id);
                $query2 = "SELECT `uzytkownik` FROM `wizytowki` WHERE id = :id";
                $iduser = $db->single($query2);

              if($login == $iduser)
                            {

                              $db->bind("id", $id);
                              $delete = $db->query("DELETE FROM `wizytowki` WHERE `id` = :id");
                              exit(header("Location: /user.php"));


                            }

                            else
                            {

                               exit(header("Location: /index.php"));

                            }
              }
              else{
                  exit(header("Location: /index.php"));
              }

?> 