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
    <title>Aktywne Dziecko - Rejestracja</title>

  </head>

<body>

<script>
jQuery(function ($) { 
    $(".rejestracja").submit(function (event) {
      event.preventDefault();
        
        
        var method = this.method;
        var url = this.action;
        var data = $(this).serialize();
        
        

        $.ajax({ // f
            type: "POST",
            url: "rejestracja.php",
            data: data,
            dataType: "json"})

                .done(function() {location.href="https://aktywne-dziecko.pl/user.php";})
                
                .fail(function() {location.href="https://aktywne-dziecko.pl/signup&result.php";})


            });
});
  
</script> 

        

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

        <div id="signup-container">

          <form action="rejestracja.php" method="post" class="rejestracja">

            <span id="rejestracja-napis">Rejestracja</span>
            <span id="email-napis">E-mail</span>

            <input  id="email-input" type="email" name="email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Niepoprawny format adresu e-mail!" onblur="validate();" required>

            <div id="result-email" style="display:block;width:90%;margin-left:5%;margin-top:1%;margin-bottom:1%;height:8%;font-weight:bold;padding-left:1%;font-size:0.85em;"></div>

            <span id="haslo-napis">Hasło</span>
            <input  id="haslo-input" type="password" name="haslo1" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Hasło musi zawierać jedną małą, jedną dużą literę, cyfrę i mieć minimum 8 znaków" required>

            <span id="haslo-napis">Powtórz hasło</span>
            <input id="haslo-input2" type="password" name="haslo2"  autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Hasło musi zawierać jedną małą, jedną dużą literę, cyfrę i mieć minimum 8 znaków" required>

            <div id="result-psswd" style="display:block;width:90%;margin-left:5%;margin-top:1%;margin-bottom:1%;height:8%;font-weight:bold;padding-left:1%;font-size:0.85em;"></div>

            <label class="container" style="margin-top:3%;">
            <input  id="regulamin-input" type="checkbox" name="regulamin" required>  
            <span class="checkmark"></span>
            <span id="regulamin-napis">Zgadzam się z <a target="_blank" href="regulamin.pdf">regulaminem</a></span>
          </label>

            <label class="container">
            <input  id="polityka-input" type="checkbox" name="polityka" required>
            <span class="checkmark"></span>
            <span id="polityka-napis">Zgadzam się z<a target="_blank" href="polityka.pdf"> Polityką Prywatności</a></span>
          </label>


                        
                <input type="submit" id="signup-button" value="Utwórz konto" name="rejestruj">
            
          </form>    

        </div>


<script>

function validateEmail(email) 
{
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}


function validate() {

  var $result = $("#result-email");
  var email = $("#email-input").val();
  $result.text("");

  if (validateEmail(email))
  {
    $('#email-input').css('border-color', 'green');
    $result.text("Adres e-mail jest poprawny");
    $result.css("color", "green");

  } 
  
  else 
  {
    $('#email-input').css('border-color', 'red');
    $result.text("Adres e-mail jest niepoprawny");
    $result.css("color", "red");
  }
  return false;
}

</script>

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
