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

        <a href="user.php"><div class="user-menu-div" >Wizytówki
        </div></a>

        <a href="wiadomosci.php"><div class="user-menu-div">Wiadomości
        </div></a>

        <a href="pakiety.php"><div class="user-menu-div">Pakiety
        </div></a>

        <a href="pomoc.php"><div class="user-menu-div">Pomoc
        </div></a>

        <a href="ustawienia.php"><div class="user-menu-div" style="background:#C7EDE6;">Ustawienia
        </div></a>

  </div>
<?if((!empty($_SESSION["dodawanie"]))){echo $_SESSION["dodawanie"] ;}else{} unset($_SESSION["dodawanie"]);?>
    <div id="moje-konto">
            <span id="moje-konto-napis">Moje konto</span>


<?php

  $db->bind("login", $_SESSION["login"]);
  $iduser =$db->query("SELECT * FROM `uzytkownicy` WHERE login = :login");

foreach ($iduser as $key) {

echo"      
            <form action='ustawienia_check.php' ENCTYPE = 'multipart/form-data' method='post' > 
            <input type='hidden' value='".$_SESSION["login"]."' name='id'>
            <div id='user-jpg'>

            <img id='user-img' src=";if($key['zdjecie']!=""){echo "img/".$key['zdjecie'];}else{echo"user.png";}echo">
            </div>";?>
            <input type='hidden' name='MAX_FILE_SIZE' value='5000000' />
            <input type='file' value='Wgraj obraz!' onchange="validateFileType('user-img')" accept='.png, .jpg, .jpeg' name='user_img' id='button-obraz'/>
            <?echo"<span class='span-ustawienia' >Imie:</span>
            <span class='span-ustawienia' >Nazwisko:</span><br>
            <input type='text' name='imie' value='";if($key['imie']!=""){echo $key['imie'];}else{}echo"' class='input-ustawienia' >
            <input type='text' name='nazwisko' value='";if($key['nazwisko']!=""){echo $key['nazwisko'];}else{}echo"' class='input-ustawienia' >
            <span class='span-ustawienia' >Miasto:</span>
            <span class='span-ustawienia' >Telefon:</span><br>
            <input type='text' name='miasto' value='";if($key['miasto']!=""){echo $key['miasto'];}else{}echo"' class='input-ustawienia' >
            <input type='text' name='telefon' placeholder='601-102-203' pattern='[0-9]{3}-[0-9]{3}-[0-9]{3}' value='";if($key['telefon']!=""){echo $key['telefon'];}else{}echo"' class='input-ustawienia' ><br><br><br>
            <span class='input-long-ustawienia' >E-mail:</span><br>
            <input type='text' name='email' value='";if($key['email']!=""){echo $key['email'];}else{}echo"' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' class='span-long-ustawienia'><br><br>
            <span class='input-long-ustawienia' >Hasło:</span><br>
            <input type='password' name='haslo' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' class='span-long-ustawienia'><br><br>
            <span class='input-long-ustawienia' >Powtórz hasło:</span><br>
            <input type='password' name='haslo2' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' class='span-long-ustawienia'><br><br>

            <input type='submit' value='Zaktualizuj dane' id='button-update-ustawienia' >
            </form>
            ";

}            

?>


    </div>

</div>
<script type="text/javascript">
    function validateFileType(q1){
        var fileName = document.getElementById("button-obraz").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
              
              var preview = document.getElementById(q1);
              var file    = document.querySelector('input[type=file]').files[0];
              var reader  = new FileReader();

              reader.addEventListener("load", function () {
                preview.src = reader.result;
              }, false);

              if (file) {
                reader.readAsDataURL(file);
              }
            
        }else{
            document.getElementById('button-obraz').value="";
            alert("Tylko pliki z rozszerzeniem jpg/jpeg i png są dozwolone!");

        }   
    }
</script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>