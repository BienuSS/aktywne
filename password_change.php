<?php
    session_start();
    require("Db.class.php");
    $db = new Db();

    $kod = $_GET['kzh'] ;
    $id = $_GET['id'] ;
    $_SESSION["login"] = $id;

    $db->bind("login", $id);
    $db->bind("kod_haslo",$kod);
    $kod_confirm =$db->single("SELECT COUNT(*) FROM uzytkownicy WHERE login = :login AND kod_haslo = :kod_haslo ");

    if($kod_confirm == 0)          
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
    <title>Aktywne Dziecko - Rejestracja</title>

  </head>

<body>
        

<div id="mainmenu-up">

        <div id="logo-container">
            <a href="index.php"><img src="logo2.jpg" ></a>
     </div>

        <div id="login-panel">
            <a href="signup.php"><button id="signup"><span style="font-size:1em; font-weight:bold;">Dołacz do nas!</span></button></a>
            <a href="login.php"><button id="login"><span style="font-size:1em; font-weight:bold;">Zaloguj sie</span></button></a>
        </div>


</div>


       <div id="validacja-haslo">
                <h3>Hasło musi zawierać:</h3>
                <p id="letter" class="invalid"><b>Małą</b> literę</p>
                <p id="capital" class="invalid"><b>Dużą</b> literę</p>
                <p id="number" class="invalid"><b>Cyfrę</b></p>
                <p id="length" class="invalid">Minimum <b>8 znaków</b></p>
        </div> 

        <div id="signup-result" style="width:25%;margin-left:37.5%;margin-top:5%;height:auto;background-color:#5DC1C2;border-radius:10px;
  border-style:solid;border-color:black;border-width:1px;text-align:center; ">

            <div>
              <form action="password_new.php" method="post" class="new_password">
                  
                  <span  style="margin-top:3%;display:block;margin-left:auto;margin-right:auto;font-weight:bold;">Nowe hasło</span>
                  <input  id="haslo-input" style="margin-top:3%;" type="password" name="haslo1" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Hasło musi zawierać jedną małą, jedną dużą literę, cyfrę i mieć minimum 8 znaków" required>

                  <span  style="margin-top:3%;display:block;margin-left:auto;margin-right:auto;font-weight:bold;">Powtórz hasło</span>
                  <input id="haslo-input2" style="margin-top:3%;" type="password" name="haslo2"  autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Hasło musi zawierać jedną małą, jedną dużą literę, cyfrę i mieć minimum 8 znaków" required>

                  <div id="result-psswd" style="display:block;width:90%;margin-left:5%;margin-top:1%;margin-bottom:1%;height:8%;font-weight:bold;padding-left:1%;font-size:0.85em;"></div>

                  <input type="submit" id="reset-pssw-button" style="border-radius:5px;border-color:black;border-style:solid;background-color:#C7EDE6;cursor:pointer;display:block;width:30%;height:10%;margin-top:5%;margin-bottom:5%;margin-left:auto;margin-right:auto;" value="Resetuj hasło" name="resetuj">
                  </div>  
              </form>

        </div>

    

    <script>
        var myInput = document.getElementById("haslo-input");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
          document.getElementById("validacja-haslo").style.display = "inline-block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
          document.getElementById("validacja-haslo").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
          // Validate lowercase letters
          var lowerCaseLetters = /[a-z]/g;
          if(myInput.value.match(lowerCaseLetters)) { 
            letter.classList.remove("invalid");
            letter.classList.add("valid");
          } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

          // Validate capital letters
          var upperCaseLetters = /[A-Z]/g;
          if(myInput.value.match(upperCaseLetters)) { 
            capital.classList.remove("invalid");
            capital.classList.add("valid");
          } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
          }

          // Validate numbers
          var numbers = /[0-9]/g;
          if(myInput.value.match(numbers)) { 
            number.classList.remove("invalid");
            number.classList.add("valid");
          } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
          }

          // Validate length
          if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
          } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
          }
        }
      </script>

          <script>

            $(document).ready(function() {

              
                $('#haslo-input, #haslo-input2').on('keyup', function () {
              if ($('#haslo-input').val() == $('#haslo-input2').val() && $('#haslo-input').val() != "" && $('#haslo-input').val() != "" &&
                letter.classList == "valid" && number.classList == "valid" && capital.classList == "valid" && length.classList == "valid" ) 
              {
                $('#haslo-input, #haslo-input2').css('border-color', 'green');
                $("#result-psswd").text("Hasła są poprawne");
                $("#result-psswd").css("color", "green");
  
                
                
              } 
              else{
                $('#haslo-input, #haslo-input2').css('border-color', 'red');
                $("#result-psswd").text("Hasła są niepoprawne");
                $("#result-psswd").css("color", "red");
              }
                
            });
            });
      </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
