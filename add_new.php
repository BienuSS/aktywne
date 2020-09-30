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
              $db->bind("login", $_SESSION["login"]);
                $query1 = "SELECT `zdjecie` FROM `uzytkownicy` WHERE login = :login";
                $zdjecieav = $db->single($query1);
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
<form action='add_new_check.php' ENCTYPE = "multipart/form-data" method='post' class='add_new_card'>
<center>
    <span class="title-add-new" >Nazwa<font color="red"> *</font></span>

        <input type="text" id="nazwa-add-new-input" name="nazwa" required>

    <span class="title-add-new" >Opis<font color="red"> *</font></span>

        <textarea id="opis-new-add-textarea" name="opis" required></textarea>

    <span class="title-add-new" >Zdjecia</span>

      <div id="images-upload-1" class="images-add-new" style="margin-left:0%;border-color:red;"><img id="img-new-1" src ="plus.jpg" style="width:100%;height:100%;" ></div>
      <div id="images-upload-2" class="images-add-new" ><img id="img-new-2" src ="plus.jpg"style="width:100%;height:100%;" ></div>
      <div id="images-upload-3" class="images-add-new" ><img id="img-new-3" src ="plus.jpg"style="width:100%;height:100%;" ></div>
      <div id="images-upload-4" class="images-add-new" ><img id="img-new-4" src ="plus.jpg"style="width:100%;height:100%;" ></div>
      <div id="images-upload-5" class="images-add-new" ><img id="img-new-5" src ="plus.jpg"style="width:100%;height:100%;" ></div><br>

        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" /> 
        <input type="file" id="images-upload-input-1" accept=".png, .jpg, .jpeg" name="image_1" onchange="validateFileType('img-new-1');" style="display: none;" required/>
        <input type="file" id="images-upload-input-2" accept=".png, .jpg, .jpeg" name="image_2" onchange="previewFile('img-new-2')" style="display: none;" />
        <input type="file" id="images-upload-input-3" accept=".png, .jpg, .jpeg" name="image_3" onchange="previewFile('img-new-3')" style="display: none;" />
        <input type="file" id="images-upload-input-4" accept=".png, .jpg, .jpeg" name="image_4" onchange="previewFile('img-new-4')" style="display: none;" />
        <input type="file" id="images-upload-input-5" accept=".png, .jpg, .jpeg" name="image_5" onchange="previewFile('img-new-5')" style="display: none;" />

      <span class="span-add-new" style="margin-right:10%;">Kategoria<font color="red"> *</font></span>

      <span class="span-add-new" style="margin-left:8%;">Wiek<font color="red"> *</font></span><br>
    </center>
      <select name="kategoria" style="margin-left:16%;" class="input-datalist-add-new" required>
            <option value="default">Rodzaj zajęć</option>
            <option value="zajecia_muzyczne">Zajęcia muzyczne</option>
            <option value="zajecia_jezykowe">Zajęcia językowe</option>
            <option value="zajecia_taneczne">Zajęcia taneczne</option>
            <option value="zajecia_edukacyjne">Zajęcia edukacyjne</option>
            <option value="zajecia_niemowlakow">Zajęcia dla niemowlaków</option>
            <option value="zajecia_sportowe">Zajęcia sportowe</option>
            <option value="sklepy">Sklepy</option>
            <option value="sale_zabaw">Sale zabaw</option>
      </select>
  
      <select name="wiek" style="margin-left:3%;" class="input-datalist-add-new" required><br><br>
                        <option value="default">Wiek</option>
                        <option value="niemowlak">Niemowlak</option>
                        <option value="1_3">1-3 lat</option>
                        <option value="4_5">4-5 lat </option>
                        <option value="6_8">6-8 lat</option>
                        <option value="9_11">9-11 lat</option>
                        <option value="12">Od 12 lat</option>
        </select>

        <center>
      <span class="span-add-new" style="margin-right:10%;" >Telefon<font color="red"> *</font></span>
      <span class="span-add-new" style="margin-left:8%;">Strona</span><br><br>
    </center>
      <input type="text" name="telefon" class="input-datalist-add-new" style="margin-left:16%;" placeholder="601-102-203" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"  required>
      <input type="text" name="strona" class="input-datalist-add-new" style="margin-left:3%;" placeholder="www.strona.pl"><br><br>
      <center>




      <span class="contact-add-new" >Województwo<font color="red"> *</font></span>
      <span class="contact-add-new" >Powiat<font color="red"> *</font></span>
      <span class="contact-add-new" >Gmina<font color="red"> *</font></span>
      <select name="wojewodztwo" class="input-contact-add-new" required>
            <option value="default">---</option>
            <option value="Kujawsko-Pomorskie">Kujawsko-Pomorskie</option>
            <option value="Lubelskie">Lubelskie</option>
            <option value="Lubuskie">Lubuskie</option>
            <option value="Łódzkie">Łódzkie</option>
            <option value="Małopolskie">Małopolskie</option>
            <option value="Mazowieckie">Mazowieckie</option>
            <option value="Opolskie">Opolskie</option>
            <option value="Podkarpackie">Podkarpackie</option>
            <option value="Podlaskie">Podlaskie</option>
            <option value="Pomorskie">Pomorskie</option>
            <option value="Śląskie">Śląskie</option>
            <option value="Świętokrzyskie">Świętokrzyskie</option>
            <option value="Warmińsko-mazurskie">Warmińsko-mazurskie</option>
            <option value="Wielkopolskie">Wielkopolskie</option>
            <option value="Zachodniopomorskie">Zachodniopomorskie</option>
      </select>
      <input type="text" name="powiat" class="input-contact-add-new" required>
      <input type="text" name="gmina" class="input-contact-add-new" required><br><br>

      <span class="contact-add-new" >Miasto<font color="red"> *</font></span>
      <span class="contact-add-new" >Ulica i numer budynku<font color="red"> *</font></span>
      <span class="contact-add-new" >Kod pocztowy<font color="red"> *</font></span><br><br>
      <input type="text" name="miasto" class="input-contact-add-new" required>
      <input type="text" name="ulica" class="input-contact-add-new" required>
      <input type="text" name="kodpocztowy" class="input-contact-add-new" placeholder="00-000" pattern="[0-9]{2}\-[0-9]{3}" required><br><br>


     <span id="information-span-add-new">Informacje</span>

     <input type="text" name="tytul_1" class="information-add-new" style="margin-right:5%;">
     <input type="text" name="tytul_2" class="information-add-new" style="margin-right:2.5%;">
     <input type="text" name="tytul_3" class="information-add-new" style="margin-left:2.5%;">
     <input type="text" name="tytul_4" class="information-add-new" style="margin-left:5%;"><br>

     <textarea name="opis_1" class="information-textarea-add-new" style="margin-right:5%;"></textarea>
     <textarea name="opis_2" class="information-textarea-add-new" style="margin-right:2.5%;"></textarea>
     <textarea name="opis_3" class="information-textarea-add-new" style="margin-left:2.5%;"></textarea>
     <textarea name="opis_4" class="information-textarea-add-new" style="margin-left:5%;"></textarea>
    </center>

    <input type="submit" id="add-new-button" value="Dodaj">
      <div id="footer-add-new">@AktywneDziecko</div>

</form>





  </div>
</div>
<script type="text/javascript">
    function validateFileType(q1){
        var fileName = document.getElementById("images-upload-input-1").value;
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
            document.getElementById('images-upload-input-1').value="";
            alert("Tylko pliki z rozszerzeniem jpg/jpeg i png są dozwolone!");

        }   
    }
</script>
<script>
  function previewFile(q1) {

  var preview = document.getElementById(q1);
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}
  </script>
<script>
$(document).ready(function(){
    $('#images-upload-1').on('click', function() 
    {
    $('#images-upload-input-1').trigger('click');
    });

    $('#images-upload-2').on('click', function() 
    {
    $('#images-upload-input-2').trigger('click');
    });

    $('#images-upload-3').on('click', function() 
    {
    $('#images-upload-input-3').trigger('click');
    });

    $('#images-upload-4').on('click', function() 
    {
    $('#images-upload-input-4').trigger('click');
    });

    $('#images-upload-5').on('click', function() 
    {
    $('#images-upload-input-5').trigger('click');
    });
});
</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>