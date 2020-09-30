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
        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129431453-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-129431453-1');
    </script>

    <title>Aktywne Dziecko - znajdź zajęcia dla swojej pociechy!</title>

  </head>

<body>
    
<?
require("Db.class.php");
$db = new Db();

$miasto = $_GET['miasto'];
$wiek = $_GET['wiek'];
$category = $_GET['category'];

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


<div id="search-box">

    <div style="width:80%;height:100px;margin-left:10%;margin-top:3%;display:inline-block;background:#5DC1C2;border-radius:5px;">

        <form type="POST">
    <input id="" type="text" style="margin-top:3%;width:18%;margin-left:6%;border-style:solid;border-width:medium;border-color: #5DC1C2;" name="nazwa" placeholder=" Nazwa"/>

    <?
    if($miasto !="")
    {
        echo"<input id='' type='text' style='margin-top:3%;width:18%;margin-left:1.5%;border-style:solid;border-width:medium;border-color: #5DC1C2;'  name='miasto' value='".$miasto."' />";
    }
    else
    echo"<input id='' type='text' style='margin-top:3%;width:18%;margin-left:1.5%;border-style:solid;border-width:medium;border-color: #5DC1C2;'  name='miasto' placeholder=' Lokalizacja' />";
    ?>


    <?
    if($category !="")
    {
    echo"<select name='kategoria' style='margin-top:3%;width:18%;margin-left:1.5%;border-style:solid;border-width:medium;border-color:;border-color: #5DC1C2;' name='category' />
            <option value='default'>Rodzaj zajęć</option>";
            if($category=="Zajęcia muzyczne"){echo"<option value='zajecia_muzyczne' selected >Zajęcia muzyczne</option>";}else{echo"<option value='zajecia_muzyczne'>Zajęcia muzyczne</option>";}

            if($category=="Zajęcia językowe"){echo"<option value='zajecia_jezykowe' selected >Zajęcia językowe</option>";}else{echo"<option value='zajecia_jezykowe'>Zajęcia językowe</option>";}

            if($category=="Zajęcia taneczne"){echo"<option value='zajecia_taneczne'selected >Zajęcia taneczne</option>";}else{echo"<option value='zajecia_taneczne'>Zajęcia taneczne</option>";}

            if($category=="Zajęcia edukacyjne"){echo"<option value='zajecia_edukacyjne'selected >Zajęcia edukacyjne</option>";}else{echo"<option value='zajecia_edukacyjne' >Zajęcia edukacyjne</option>";}

            if($category=="Zajęcia dla niemowlaków"){echo"<option value='zajecia_niemowlakow'selected >Zajęcia dla niemowlaków</option>";}else{echo"<option value='zajecia_niemowlakow' >Zajęcia dla niemowlaków</option>";}

            if($category=="Zajęcia sportowe"){echo"<option value='zajecia_sportowe'selected >Zajęcia sportowe</option>";}else{echo"<option value='zajecia_sportowe'>Zajęcia sportowe</option>";}

            if($category=="Sklepy"){echo"<option value='sklepy'selected >Sklepy</option>";}else{echo"<option value='sklepy' >Sklepy</option>";}

            if($category=="Sale zabaw"){echo"<option value='sale_zabaw'selected >Sale zabaw</option>";}else{echo"<option value='sale_zabaw' >Sale zabaw</option>";}

      echo"</select>";
    }
    else
    echo"<select name='kategoria' style='margin-top:3%;width:18%;margin-left:1.5%;border-style:solid;border-width:medium;border-color:;border-color: #5DC1C2;' name='category' />
            <option value='default'>Rodzaj zajęć</option>
            <option value='zajecia_muzyczne'>Zajęcia muzyczne</option>
            <option value='zajecia_jezykowe'>Zajęcia językowe</option>
            <option value='zajecia_taneczne'>Zajęcia taneczne</option>
            <option value='zajecia_edukacyjne'>Zajęcia edukacyjne</option>
            <option value='zajecia_niemowlakow'>Zajęcia dla niemowlaków</option>
            <option value='zajecia_sportowe'>Zajęcia sportowe</option>
            <option value='sklepy'>Sklepy</option>
            <option value='sale_zabaw'>Sale zabaw</option>
      </select>";
    ?>
    <?
    if($wiek !="")
    {
     echo"<select name='wiek' style='margin-top:3%;width:18%;margin-left:1.5%;border-style:solid;border-width:medium;
border-color:;border-color: #5DC1C2;' name='wiek' />";

                        if($wiek=="default"){echo"<option value='default'selected >Wiek</option>";}else{echo"<option value='default' >Wiek</option>";}
                        if($wiek=="niemowlak"){echo"<option value='niemowlak'selected >Niemowlak</option>";}else{echo"<option value='niemowlak'>Niemowlak</option>";}
                        if($wiek=="1-3"){echo"<option value='1_3'selected >1-3 lat</option>";}else{echo"<option value='1_3' >1-3 lat</option>";}
                        if($wiek=="4-5"){echo"<option value='4_5'selected >4-5 lat </option>";}else{echo"<option value='4_5' >4-5 lat </option>";}
                        if($wiek=="6-8"){echo"<option value='6_8'selected >6-8 lat</option>";}else{echo"<option value='6_8' >6-8 lat</option>";}
                        if($wiek=="9-11"){echo"<option value='9_11'selected >9-11 lat</option>";}else{echo"<option value='9_11' >9-11 lat</option>";}
                        if($wiek=="12"){echo"<option value='12'selected >Od 12 lat</option>";}else{echo"<option value='12' >Od 12 lat</option>";}

        echo"</select> ";
    }
    else
    echo"<select name='wiek' style='margin-top:3%;width:18%;margin-left:1.5%;border-style:solid;border-width:medium;
border-color:;border-color: #5DC1C2;' name='wiek' />
                        <option value='default'>Wiek</option>
                        <option value='niemowlak'>Niemowlak</option>
                        <option value='1_3'>1-3 lat</option>
                        <option value='4_5'>4-5 lat </option>
                        <option value='6_8'>6-8 lat</option>
                        <option value='9_11'>9-11 lat</option>
                        <option value='12'>Od 12 lat</option>
        </select> ";
    ?>

        <button type="submit" style="display:inline-block;margin-left:3%;margin-top:1.5%;">Szukaj</button>
        <form>

    </div>



    <div style="width:80%;height:60px;margin-left:10%;margin-top:1%;display:block;background:#C7EDE6;margin-bottom:0;border-radius:5px;">

        <span style="float:left;margin-top:1.5%;display:inline-block;margin-left:2%;font-weight:bold;">Widok:</span>
            <div style="float:left;margin-top:1.3%;display:inline-block;margin-left:1.5%;cursor:pointer;" onclick="onecolumn()">
                <img src="column.png">
            </div>

            <div style="float:left;margin-top:1.3%;display:inline-block;margin-left:1%;cursor:pointer;" onclick="twocolumns()">
                <img src="columns.png">
            </div>

            <select name="wybor" style="float:right;margin-right:3%; font-weight:bold;margin-top:1.5%;display:block;">
                <option>Najlepiej Oceniane</option>
                <option>Alfabetycznie</option>
                <option>Trafności</option>
            </select>
        <span style="float:right;margin-right:1%; font-weight:bold;margin-top:1.5%;">Sortuj według:</span>

    </div>


    <div id="wyniki-wyszukiwania">

     <?php

$db = new Db();

$miasto = $_GET['miasto'];
$wiek = $_GET['wiek'];
$category = $_GET['kategoria'];
$nazwa = $_GET['nazwa'];

if($category == 'default'){unset($category);}else{}
if($wiek == 'default'){unset($wiek);}else{}

if(!empty($miasto)||!empty($wiek)||!empty($category)||!empty($nazwa)){
    $query="SELECT * FROM `wizytowki` WHERE";
    }

else{
    $query="SELECT * FROM `wizytowki`";
    }

if(!empty($miasto)){
    $query.=" miasto LIKE :miasto";
    }

else{}

if(!empty($category)){
    if(!empty($miasto)){
        $query.=" AND kategoria=:kategoria";
        }

    else{
        $query.=" kategoria=:kategoria";
        }
    }
else{}


if(!empty($wiek)){
    if(!empty($category) || !empty($miasto)){
        $query.=" AND wiek=:wiek";
        }

    else{
        $query.=" wiek=:wiek";
        }
    }
else{}


if(!empty($nazwa)){
    if(!empty($wiek)){
        $query.=" AND nazwa LIKE :nazwa";
        }

    else{
        $query.=" nazwa LIKE :nazwa";
        }
    }

else{}

  if(!empty($miasto)){$db->bind("miasto", $miasto);}else{}
  if(!empty($category)){$db->bind("kategoria", $category);}else{}
  if(!empty($wiek)){$db->bind("wiek", $wiek);}else{}
  if(!empty($nazwa)){$db->bind("nazwa", "%".$nazwa."%");}else{}

$wizytowki = $db->query($query);

if(!empty($wizytowki)){
foreach($wizytowki as $i => $wizytowka) {
  echo" <a href='wizytowka.php?id=".$wizytowka['id']."'><div class='wyszukiwarka-wizytowka'>

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

                    <div class='telefon-s'>
                        <img src='telefon.png'>
                        <span>".$wizytowka['telefon']."</span>
                    </div>

                    <div class='adres-s'>
                        <img src='adres.png'>
                         <span >".$wizytowka['miasto'].", ".$wizytowka['ulica']."</span>
                    </div>

                    

                    <div class='opis-s' >
                        <span>".$wizytowka['opis']."</span>
                    </div>
                
            

        </div></a>
";
}
}

else{

    echo"<center><span style='display:block;padding:10%;font-weight:bold;text-align:center;font-size:2em;'>Brak wyników wyszukiwania :(</span></center>";
}
?>   
  
    </div>

    <div id="map-div" style="width:30.5%;height:650px;margin-left:0.5%;margin-top:1%;display:block;background:grey;margin-bottom:5%;float:left;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163975.34506582207!2d19.864790257797488!3d50.046681352759826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471644c0354e18d1%3A0xb46bb6b576478abf!2zS3Jha8Ozdw!5e0!3m2!1spl!2spl!4v1539874990962" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
   
      <div id="onecolum-div">

     <?php


foreach($wizytowki as $i => $wizytowka) {
  echo"
        
        <a href='wizytowka.php?id=".$wizytowka['id']."'><div class='wyszukiwarka-wizytowka-one'>



                    <img class='promo-wizytowka-obrazek-one' src='img/".$wizytowka['zdjecie']."'>

        <span class='promo-wizytowka-nazwa-one'>".$wizytowka['nazwa']."</span>



                    <div class='telefon-s-one'>
                        <img src='telefon.png'>
                        <span>".$wizytowka['telefon']."</span>
                    </div>

                    <div class='adres-s-one'>
                        <img src='adres.png'>
                         <span >".$wizytowka['miasto'].", ".$wizytowka['ulica']."</span>
                    </div>

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

                    <div class='opis-s-one' >
                        <span>".$wizytowka['opis']."</span>
                    </div>



        </div></a>
  
";
}
?> 
</div>


</div>



<script type="text/javascript">
    function onecolumn() 
    {
         document.getElementById("wyniki-wyszukiwania").style.display = "none";
         document.getElementById("map-div").style.display = "none"; 
         document.getElementById("onecolum-div").style.display = "block";

    }

    function twocolumns() 
    {
         document.getElementById("wyniki-wyszukiwania").style.display = "block";
         document.getElementById("map-div").style.display = "block"; 
         document.getElementById("onecolum-div").style.display = "none";         
    }
</script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>