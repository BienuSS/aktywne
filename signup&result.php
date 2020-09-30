<?session_start();          

            if($_SESSION['zalogowany'] == true)
            {
                
                    header('Location: https://aktywne-dziecko.pl'); 

                
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="XwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Aktywne Dziecko</title>

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


       <div id="validacja-haslo">
                <h3>Hasło musi zawierać:</h3>
                <p id="letter" class="invalid"><b>Małą</b> literę</p>
                <p id="capital" class="invalid"><b>Dużą</b> literę</p>
                <p id="number" class="invalid"><b>Cyfrę</b></p>
                <p id="length" class="invalid">Minimum <b>8 znaków</b></p>
        </div> 

        <div id="signup-result" style="width:30%;
  margin-left:35%;
  margin-top:5%;
  height:auto;
  background-color: #5DC1C2;
  border-radius:10px;
  border-style:solid;
  border-color:black;
  border-width:1px;text-align:center; ">

            <div><?
            if(isset($_SESSION["msg"]))
              
                echo "<span style='font-weight:bold;display:block;margin-top:12%;'>".$_SESSION["msg"]."</span>";
              
              else
                
                  echo"Wystąpił nieoczekiwany błąd!"
                
              ?>
                

              <a href="index.php"><button style=";margin-left:auto;margin-right:auto;margin-top:12%;width:35%;border-radius:5px;border-color:black;border-style:solid;background-color:#C7EDE6;cursor:pointer;margin-bottom:5%;display:inline-block;">Do strony głównej</button></a>
              <a href="<? echo $_SESSION["button"];?>"><button style="margin-left:auto;margin-right:auto;margin-top:12%;width:35%;border-radius:5px;border-color:black;border-style:solid;background-color:#C7EDE6;cursor:pointer;margin-bottom:5%;display:inline-block;">Powrót</button></a>
              </div>  

        </div>

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
