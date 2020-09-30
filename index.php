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
        google_ad_client: "ca-pub-9096771103106588",
        enable_page_level_ads: true
      });
    </script>

        <title>Aktywne Dziecko - znajdź zajęcia dla swojej pociechy!</title>
        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129431453-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-129431453-1');
    </script>


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
                $db->bind("login", $_SESSION["login"]);
                $query1 = "SELECT `zdjecie` FROM `uzytkownicy` WHERE login = :login";
                $zdjecieav = $db->single($query1);

                ?>
                     <a href="logout.php"><button id="logout"><span style="font-size:1em; font-weight:bold;">Wyloguj się</span></button></a>
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




    <div id="categories-container">

    	<span id="wyszukiwarka">Wyszukiwarka</span>

    	<form action='searching.php' method='post' class='searching'>

        <input id="wojewodztwo-input" type="text" name="miasto" placeholder=" Miasto" />

    	<select id="wiek-input" name="wiek" >
                    <option value="default">Wiek</option>
    				<option value="niemowlak">Niemowlak</option>
    				<option value="1-3">1-3 lat</option>
    				<option value="4-5">4-5 lat </option>
    				<option value="6-8">6-8 lat</option>
    				<option value="9-11">9-11 lat</option>
                    <option value="12">Od 12 lat</option>
        </select>            



    <button id="search" type="submit"><img src="search.png" id="search-img"></button>
</form>




		<div id="category-div" style="z-index:0;"> 
         <div  class="category-list">

            <a href="search.php?kategoria=Zajęcia muzyczne"><div class="category-container">
                <img src="nuta.png" class="rozrywka-img">
                <span class="category-name"><center>Zajęcia muzyczne</span>
            </div></a>

            <a href="search.php?kategoria=Zajęcia językowe"><div class="category-container">
                <img src="jezyk.png" class="rozrywka-img">
                <span class="category-name"><center>Zajęcia językowe</span>
            </div></a>

            <a href="search.php?kategoria=Zajęcia taneczne"><div class="category-container">
                <img src="dance.png" class="rozrywka-img">
                <span class="category-name"><center>Zajęcia taneczne</span>
            </div></a>


            <a href="search.php?kategoria=Zajęcia edukacyjne"><div class="category-container">
                <img src="edukacja1.png" class="rozrywka-img">
                <span class="category-name"><center>Zajęcia edukacyjne</span>
            </div></a>

        </div>
		
		<div class="category-list category-list2">

            <a href="search.php?kategoria=Zajęcia dla niemowlaków"><div class="category-container">
                <img src="niemowlakv1.png" class="rozrywka-img">
                <span class="category-name"><center>Zajęcia dla niemowlaków</span>
            </div></a>



            <a href="search.php?kategoria=Zajęcia sportowe"><div class="category-container">
                <img src="sportv1.png" class="rozrywka-img">
                <span class="category-name"><center>Zajęcia sportowe</span>
            </div></a>

            <a href="search.php?kategoria=Sklepy"><div class="category-container">
                <img src="sklepyv1.png" class="rozrywka-img">
                <span class="category-name"><center>Sklepy</span>
            </div></a>

            <a href="search.php?kategoria=Sale zabaw"><div class="category-container">
                <img src="salazabawv1.png" class="rozrywka-img">
                <span class="category-name"><center>Sale zabaw</span>
            </div></a>


    	</div>
    </div>
	

    </div>

    <div class="proponowane-wizytowki">
        <center>
            <span id="promowane-napis">PROPONOWANE WIZYTÓWKI</span>
        </center>

        

<?php

$db = new Db();

$query="SELECT * FROM `wizytowki` ORDER BY `opinie` LIMIT :ilosc  ";
$wizytowki = $db->query($query, ['ilosc' =>6]);

foreach($wizytowki as $i => $wizytowka) {
  echo"
                <a href='wizytowka.php?id=".$wizytowka['id']."'><div class='promo-wizytowka'>
                    <span class='promo-wizytowka-nazwa'>".$wizytowka['nazwa']."</span>

                    <img class='promo-wizytowka-obrazek' src='img/".$wizytowka['zdjecie']."'>

                    <div class='stars'>
                        <input type='radio' id='star5' name='star' value='5'>
                        <label for='star5'> Five Stars </label>
                        <input type='radio' id='star4' name='star' value='4'>
                        <label for='star4'> Four Stars </label>
                        <input type='radio' id='star3' name='star' value='3'>
                        <label for='star3'> Three Stars </label>
                        <input type='radio' id='star2' name='star' value='2'>
                        <label for='star2'> Two Stars </label>
                        <input type='radio' id='star1' name='star' value='1'>
                        <label for='star1'> One Star </label>
                      </div>

                    <div class='telefon'>
                        <img src='telefon.png'>
                        <span>".$wizytowka['telefon']."</span>
                    </div>

                    <div class='adres'>
                        <img src='adres.png'>
                        <span >".$wizytowka['miasto'].", ".$wizytowka['ulica']."</span>
                    </div>

                    <div class='opis'>
                        <span>".$wizytowka['opis']."</span>
                    </div>
                </div></a>";
}


?>   
                               
            

    </div>

<div id="footer">
    <span  style="font-weight:bold;"><a target="_blank" href="jakdziala.php">Jak działa aktywne-dziecko.pl</a></span>
    <span  style="font-weight:bold;"><a target="_blank" href="regulamin.pdf">Regulamin</a></span>
    <span  style="font-weight:bold;"><a target="_blank" href="polityka.pdf">Polityka Prywatności</a></span>
    <span  style="font-weight:bold;"><a target="_blank" href="pomoc.php">Pomoc</a></span>
    <span style="font-weight:bold;"><a target="_blank" href="kontakt.php">Kontakt</a></span>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>