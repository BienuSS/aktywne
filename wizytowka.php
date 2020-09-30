<?php
require("Db.class.php");
$db = new Db();

$id = $_GET['id'];

if(!empty($id)){

  $db->bind("id", $id);
  $ilosc=$db->single("SELECT COUNT(*) FROM wizytowki WHERE id = :id");

if ($ilosc==0) {
    exit(header("Location: /index.php"));
}
else{
    
}
}
else{
    exit(header("Location: /index.php"));
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
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-9096771103106588",
        enable_page_level_ads: true
      });
    </script>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-5110351972427317",
            enable_page_level_ads: true
          });
    </script>

    <title>Aktywne Dziecko - Profil</title>

  </head>

<body>

<?

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

<?php

$db = new Db();

$id = $_GET['id'];

if(!empty($id)){

  $db->bind("id", $id);
  $ilosc=$db->single("SELECT COUNT(*) FROM wizytowki WHERE id = :id");

if($ilosc == 1){

$query="SELECT * FROM `wizytowki` WHERE id = :id";
$wizytowka = $db->query($query, ['id'=>$id]);

foreach($wizytowka as $i => $wizytowki) {
echo"<div id='wizytowka-one'>

                    <span id='wizytowka-nazwa'>".$wizytowki['nazwa']."</span>

                      <div class='info-cont-div'>
                        <img src='telefon.png'>
                        <span>".$wizytowki['telefon']."</span>
                    </div>
                    <div class='info-cont-div'>
                        <img src='strona.png'>
                        <span><a target='_blank' href='".$wizytowki['strona']."' style='text-decoration:none;color:black;'>".$wizytowki['strona']."</a></span>
                    </div>

                    <div class='info-cont-div'>
                        <img src='adres.png'>
                         <span >".$wizytowki['miasto'].", ".$wizytowki['ulica']."</span>
                    </div>

                    <div style='width:30%;height:auto;max-height:400px;margin-top:-20%;margin-left:9%; display:block;background-color:white;'>
                    <img id='wizytowka-main-img' src='img/".$wizytowki['zdjecie']."'>
                    </div>

                    <div>
                        <div style='  width:10%;height:auto;max-height:130px;float:left;margin-left:3%;margin-top:2%;'>                   
                            <img class='wizytowka-oth-img-one' src='none.jpg'>
                        </div>

                        <div style='  width:10%;height:auto;float:left;max-height:130px;margin-top:2%;margin-left:0.5%;'>
                            <img class='wizytowka-oth-img' src='none.jpg'>
                        </div>

                        <div style='  width:10%;height:auto;float:left;max-height:130px;margin-top:2%;margin-left:0.5%;'>
                            <img class='wizytowka-oth-img' src='none.jpg'>
                        </div>

                        <div style=' width:10%;height:auto;float:left;max-height:130px;margin-top:2%;margin-left:0.5%;'>
                            <img class='wizytowka-oth-img' src='none.jpg'>
                        </div>


                    </div>

                    <div class='stars-wizyt'>
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

  

                    <button class='zapytaj-wlasciciela-wizyt' style='z-index:1;'>
                    Zadaj pytanie sprzedającemu </button>

                    <img class='user-wizyt' src='user.png'>
                    <span id='wizyt-user' >Użytkownik</span>
                    
                    <div id='wizyt-opis'>
                        <center><span style='padding-bottom:3%;display:inline-block;font-weight:bold;'>Opis</span></center>

                        <span style='max-height:320px;overflow-y:scroll;display:inline-block;'>".$wizytowki['opis']."</span>
                    </div>

                    <div style='margin-left:4%;width:42%;font-weight:bold;margin-top:2%;text-align:center;margin-bottom:2%;font-size:1.35em;border-top-width:2px;border-top-color:white;border-top-style:solid;display:inline-block;padding-top:1.5%;height:350px;'>
                            
                                <center><span style='padding-bottom:3%;display:inline-block;'>Mapa</span></center>

                            
                                <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163975.34506582207!2d19.864790257797488!3d50.046681352759826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471644c0354e18d1%3A0xb46bb6b576478abf!2zS3Jha8Ozdw!5e0!3m2!1spl!2spl!4v1539874990962' width='100%' height='150%' frameborder='0' style='border:0;display:inline-block;height:100%;' allowfullscreen></iframe>
                            
                    </div>

                    <div style='margin-left:3%;width:90%;font-weight:bold;margin-top:4%;text-align:center;margin-bottom:2%;font-size:1.35em;border-top-width:2px;border-top-color:white;border-top-style:solid;display:inline-block;padding-top:1.5%;'>
                        <center><span style='padding-bottom:2%;display:inline-block;'>Informacje</span></center>

                            <div class='wizyt-informacje-one' >
                            </div>

                            <div class='wizyt-informacje' s>
                            </div>

                            <div class='wizyt-informacje' >
                            </div>
                            <div class='wizyt-informacje' >
                            </div>

                            <div class='wizyt-informacje2-one' >
                            </div>

                            <div class='wizyt-informacje2' >
                            </div>

                            <div class='wizyt-informacje2' >
                            </div>
                            <div class='wizyt-informacje2' >
                            </div>

                    </div>

                    
                    <div style='margin-left:4%;width:42%;font-weight:bold;margin-top:2%;text-align:center;margin-bottom:2%;font-size:1.35em;border-top-width:2px;border-top-color:white;border-top-style:solid;display:inline-block;padding-top:1.5%;height:350px;margin-bottom:100px;'>
                        <center><span style='padding-bottom:3%;display:inline-block;'>Opinie</span></center>

                            <div class='opinie-div' style='width:100%;margin-right:3%;display:block;background:#5DC1C2;border-radius:5px;height:100%;overflow:scroll;overflow-x:hidden;'>

                                <div style='width:85%;display:inline-block;margin-left:auto;margin-right:auto;height:120px;border-color:black;border-style:solid;margin-top:4%;border-radius:5px;background:#78A0CF;'>
                                </div>
                                <div style='width:85%;display:inline-block;margin-left:auto;margin-right:auto;height:120px;border-color:black;border-style:solid;margin-top:4%;border-radius:5px;background:#78A0CF;'>
                                </div>
                                <div style='width:85%;display:inline-block;margin-left:auto;margin-right:auto;height:120px;border-color:black;border-style:solid;margin-top:4%;border-radius:5px;background:#78A0CF;'>
                                </div>
                                <div style='width:85%;display:inline-block;margin-left:auto;margin-right:auto;height:120px;border-color:black;border-style:solid;margin-top:4%;border-radius:5px;background:#78A0CF;'>
                                </div>
                                <div style='width:85%;display:inline-block;margin-left:auto;margin-right:auto;height:120px;border-color:black;border-style:solid;margin-top:4%;border-radius:5px;background:#78A0CF;'>
                                </div>
                                <div style='width:85%;display:inline-block;margin-left:auto;margin-right:auto;height:120px;border-color:black;border-style:solid;margin-top:4%;border-radius:5px;background:#78A0CF;'>
                                </div>
                                <div style='width:85%;display:inline-block;margin-left:auto;margin-right:auto;height:120px;border-color:black;border-style:solid;margin-top:4%;border-radius:5px;background:#78A0CF;'>
                                </div>
                                <div style='width:85%;display:inline-block;margin-left:auto;margin-right:auto;height:120px;border-color:black;border-style:solid;margin-top:4%;border-radius:5px;background:#78A0CF;'>
                                </div>
                            </div>




                    </div>
                    <div style='margin-right:10%;width:42%;font-weight:bold;margin-top:1%;text-align:center;margin-bottom:2%;display:inline-block;padding-top:1.5%;height:350px;float:right;'>
                            
                               

                            
                                <img src='opinie.png' style='width:50%;height:auto;margin-left:0%;margin-top:0%;'>
                            
                    </div>





</div>";}

}

else

    header('Location: https://aktywne-dziecko.pl'); 

}

else
header('Location: https://aktywne-dziecko.pl'); 

?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>