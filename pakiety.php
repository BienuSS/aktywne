<?session_start();
                       

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
                ?>
                    <a href="logout.php"><button id="login"><span style="font-size:1em; font-weight:bold;">Wyloguj się</span></button></a>  
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

        <a href="pakiety.php"><div class="user-menu-div" style="background:#C7EDE6;">Pakiety
        </div></a>

        <a href="pomoc.php"><div class="user-menu-div">Pomoc
        </div></a>

        <a href="ustawienia.php"><div class="user-menu-div">Ustawienia
        </div></a>

  </div>

  <div style="height:300px;text-align:center;width:100%;padding:140px;font-size:30px;">W trakcie budowy...</div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>