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
                             
                   
                            }

                            else
                            {

                               exit(header("Location: /login.php"));

                            }
              }
              else{
                  exit(header("Location: /search.php"));
              }

 }
            

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="ikonka.png" type="image/x-icon">
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
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
 <?if((!empty($_SESSION["dodawanie"]))){echo $_SESSION["dodawanie"] ;}else{} unset($_SESSION["dodawanie"]);?>

 <?php 

$id = $_GET['id'];

$query = "SELECT `nazwa` FROM `wizytowki` WHERE id = :id";
$db->bind("id", $id);
$nazwa = $db->single($query);

?>

  <span style="display: block;width:60%;margin-left:20%;margin-top:5%;margin-bottom:1%;padding:3%;font-size:1.3vw;font-weight:bold;">Czy napewno chcesz usunąć wizytówkę:  <?echo $nazwa?> ?</span>

  <form type='post' action='end_check.php'>

  <input type='hidden' value="<?echo $id;?>" name='id'>

  <input type='submit' value='Zakończ' style='display:inline-block;margin-left:46.5%;width:7%;font-weight:bold;color:black;border-width:2px;border-style:solid;border-color:black;border-radius:3px;text-align:center;padding:2px;background:white;margin-bottom:3%;cursor:pointer;'>

  </form>

  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>