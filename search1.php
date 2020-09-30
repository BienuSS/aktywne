<?session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="ikonka.png" type="image/x-icon">    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="XwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-5110351972427317",
            enable_page_level_ads: true
          });
    </script>

    <title>Aktywne Dziecko - znajdź zajęcia dla swojej pociechy!</title>

  </head>

<body>
    
<?
require("Db.class.php");
$db = new Db();
?>

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


<div id="search-box">

    <div style="width:80%;height:100px;margin-left:10%;margin-top:3%;display:inline-block;background:#5DC1C2;border-radius:5px;">

    <input id="" type="text" style="margin-top:3%;width:18%;margin-left:6%;border-style:solid;border-width:medium;border-color: #5DC1C2;" name="miasto" placeholder=" Nazwa"/>

    <input id="" type="text" style="margin-top:3%;width:18%;margin-left:1.5%;border-style:solid;border-width:medium;border-color: #5DC1C2;" name="miasto" placeholder=" Lokalizacja" list="miasta"/>

                    <datalist id="miasta">
                                            <option>Bielawa  </option>
                                            <option>Bogatynia  </option>
                    </datalist>

    <input id="" type="text" style="margin-top:3%;width:18%;margin-left:1.5%;border-style:solid;border-width:medium;border-color:;border-color: #5DC1C2;" name="miasto" placeholder=" Kategoria" list="kategoria"/>

                    <datalist id="kategoria">
                                            <option>Zajęcia muzyczne</option>
                                            <option>Zajęcia językowe</option>
                                            <option>Zajęcia taneczne</option>
                                            <option>Zajęcia edukacyjne</option>
                                            <option>Zajęcia dla niemowlaków</option>
                                            <option>Zajęcia sportowe</option>
                                            <option>Sklepy</option>
                                            <option>Sale zabaw</option>
                    </datalist>

     <input id="" type="text" style="margin-top:3%;width:18%;margin-left:1.5%;border-style:solid;border-width:medium;
border-color:;border-color: #5DC1C2;" name="miasto" placeholder=" Wiek" list="wiek1"/>

                    <datalist id="wiek1">
                                            <option>Niemowlak</option>
                                            <option>1-3 lat</option>
                                            <option>4-5 lat</option>
                                            <option>6-8 lat</option>
                                            <option>9-11 lat</option>
                                            <option>Od 12 lat</option>
                    </datalist>



        <a href="search.php"><button id="" style="display:inline-block;margin-left:3%;margin-top:1.5%;">Szukaj</button></a>            

    </div>



    <div style="width:80%;height:60px;margin-left:10%;margin-top:1%;display:block;background:#C7EDE6;margin-bottom:0;border-radius:5px;">
        <span style="float:right;margin-right:10%; font-weight:bold;margin-top:1.5%;">Sortuj według:</span>
    </div>


    <div style="width:80%;height:1200px;margin-left:10%;margin-top:1%;display:block;background:#78A0CF;;margin-right:0.5%;margin-bottom:5%;float:left;">
        
        <div style="width:80%;display:block;margin-left:10%;height:150px;border-style:solid;border-width:medium;border-color:black;margin-top:5%;border-radius:5px;background:#C7EDE6;">
        </div>
        <div style="width:80%;display:block;margin-left:10%;height:150px;border-style:solid;border-width:medium;border-color:black;margin-top:5%;border-radius:5px;background:#C7EDE6;">
        </div>
        <div style="width:80%;display:block;margin-left:10%;height:150px;border-style:solid;border-width:medium;border-color:black;margin-top:5%;border-radius:5px;background:#C7EDE6;">
        </div>
        <div style="width:80%;display:block;margin-left:10%;height:150px;border-style:solid;border-width:medium;border-color:black;margin-top:5%;border-radius:5px;background:#C7EDE6;">
        </div>
                <div style="width:80%;display:block;margin-left:10%;height:150px;border-style:solid;border-width:medium;border-color:black;margin-top:5%;border-radius:5px;background:#C7EDE6;">
        </div>

    </div>

</div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>