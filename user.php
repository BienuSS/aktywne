<?
session_start();
require("Db.class.php");
$db = new Db();
                       

            if($_SESSION['zalogowany'] == false)
            {
                
                    header('Location: http://aktywne-dziecko.pl/login.php'); 

                
            }

            else
            {
                ?> 
                    
                <?
            }
            



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="ikonka.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Aktywne Dziecko - Profil</title>

  </head>

<body>


<div id="mainmenu-up">

        <div id="logo-container">
            <a href="index.php"><img src="logo2.jpg" ></a>
	   </div>

        <div id="login-panel">
            
                        <? 

            if($_SESSION['zalogowany'] == true)
            {
                ?>
                    <a href="user.php"><button id="signup"><span style="font-size:1em; font-weight:bold;">Mój Profil</span></button></a>
                <?
            }

            else
            {
                ?> 
                    <a href="signup.php"><button id="signup"><span style="font-size:1em; font-weight:bold;">Dołącz do nas!</span></button></a>
                <?
            }
            ?>

            

            

            <? 

            if($_SESSION['zalogowany'] == true)
            {
                $db->bind("login", $_SESSION["login"]);
                $query1 = "SELECT `zdjecie` FROM `uzytkownicy` WHERE login = :login";
                $zdjecieav = $db->single($query1);
                ?>
                    <a href="logout.php"><button id="login"><span style="font-size:1em; font-weight:bold;">Wyloguj się</span></button></a>
                    <a href="user.php"><div style="width:15%;max-height:70px;border-radius:3px;border-style:solid;border-width:medium;border-color:black;display:inline-block;float:right;margin-right:15%;margin-top:-5%;overflow-y:hidden;"><img src="img/<?if(!empty($zdjecieav)){echo $zdjecieav;}else{echo"user.png";}?>" style="width:100%;height:auto;"></div> </a>  
                <?
            }

            else
            {
                ?> 
                    <a href="login.php"><button id="login"><span style="font-size:1em; font-weight:bold;">Zaloguj się</span></button></a> 
                <?
            }
            ?>


            

        </div>



</div>

<div id="user-panel">
  <div id="user-menu">

        <a href="user.php"><div class="user-menu-div" style="background:#C7EDE6;">Wizytówki
        </div></a>

        <a href="wiadomosci.php"><div class="user-menu-div">Wiadomości
        </div></a>

        <a href="pakiety.php"><div class="user-menu-div">Pakiety
        </div></a>

        <a href="pomoc.php"><div class="user-menu-div">Pomoc
        </div></a>

        <a href="ustawienia.php"><div class="user-menu-div">Ustawienia
        </div></a>

  </div>




  <span class="moje-wizytowki-napis">Moje wizytówki:</span>


  <a href="add_new.php"><button class="dodaj-button">+ Dodaj wizytówkę</button></a>


<?php

    
  $db->bind("login", $_SESSION["login"]);
  $iduser =$db->single("SELECT `id` FROM `uzytkownicy` WHERE login = :login");

  $db->bind("uzytkownik", $iduser);
  $mojewizytowki =$db->query("SELECT * FROM `wizytowki` WHERE uzytkownik = :uzytkownik");


if(!empty($mojewizytowki)){
foreach($mojewizytowki as $i => $moje) {

    echo"  <div class='moje-wizytowki'>

                <div>
                
                    <img class='wizytowka-obrazek' src='img/".$moje['zdjecie']."' >
                    <span style='width:40%;margin-top:1.5%; margin-left:5%;float:left;font-weight:bold;border-bottom-width:thick;
                    border-bottom-color:#5DC1C2;border-bottom-style:solid;text-align:center;font-size:1.5em;max-height:40px;overflow-y:hidden;'>".$moje['nazwa']."</span><br>

                    
                    <form type='post' action='end.php'>

                    <input type='hidden' value='".$moje['id']."' name='id'>

                    <input type='submit' value='Zakończ' style='display:block;float:right;width:7%; margin-top:2%;font-weight:bold;color:black;margin-right:4%;  border-width:2px;border-style:solid;border-color:black;border-radius:3px;text-align:center;padding:2px;background:white;cursor:pointer;'>
                    </form>
                    

                    <input type='submit' value='Wyróżnij' style='display:block;float:right;width:7%; margin-top:2%;font-weight:bold;color:black;margin-right:4%;  border-width:2px;border-style:solid;border-color:black;border-radius:3px;text-align:center;padding:2px;background:white;opacity:0.5;' disabled>
                    
                    <form type='post' action='edit.php'>

                    <input type='hidden' value='".$moje['id']."' name='id'>

                    <input type='submit' value='Edytuj' style='display:block;float:right;width:7%; margin-top:2%;font-weight:bold;color:black;margin-right:4%;  border-width:2px;border-style:solid;border-color:black;border-radius:3px;text-align:center;padding:2px;background:white;cursor:pointer;
                    '>
                    
                    </form>


                    <div style='display:block;width:40%;margin-top:4.5%;margin-left:21%;text-align:center;margin-bottom:3%;max-height:195px;overflow-y:hidden;'><span>".$moje['opis']."</span>
                    

                </div>

                    

                </div>



  </div>";

}
}
else{


    echo"<center><span style='display:block;padding:10%;font-weight:bold;text-align:center;font-size:2em;'>Nie posiadasz wizytówek :(</span></center>";
}

?>

                
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>