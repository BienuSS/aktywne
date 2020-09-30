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
        

<div id="mainmenu-up">

        <div id="logo-container">
            <a href="index.php"><img src="logo2.jpg" ></a>
     </div>

        <div id="login-panel">
            <a href="signup.php"><button id="signup"><span style="font-size:1em; font-weight:bold;">Dołacz do nas!</span></button></a>
            <a href="login.php"><button id="login"><span style="font-size:1em; font-weight:bold;">Zaloguj sie</span></button></a>
        </div>


</div>


        <div id="signup-result" style="width:30%;margin-left:35%;margin-top:5%;height:200px;background-color:#5DC1C2;border-radius:10px;
  border-style:solid;border-color:black;border-width:1px;text-align:center; ">

            
              <form action='resetpsswd.php' method='post' class='resetowanie_hasla'>

                    <span style="font-weight:bold;float:center;margin-top:7%;display:block;">E-mail</span>

                    <input  id="email-reset-psswd" style="display:block;width:50%;border-radius:5px;border-color:black;border-style:solid;height:8%;margin-top:4%;margin-left:auto;margin-right:auto;" type="email" name="email_reset" onblur="validate();" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Niepoprawny format adresu e-mail!" required >

                    <div id="result-email" style="display:block;width:90%;margin-left:5%;margin-top:1%;margin-bottom:1%;height:8%;font-weight:bold;padding-left:1%;font-size:0.85em;"></div>

                    <input type="submit" id="reset-pssw-button" style="float:center;border-radius:5px;border-color:black;border-style:solid;width:30%;  margin-top:2%;margin-bottom:5%;height:10%;background-color:#C7EDE6;cursor:pointer;" value="Resetuj hasło" name="resetuj">

                      
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
  var email = $("#email-reset-psswd").val();
  $result.text("");

  if (validateEmail(email))
  {
    $('#email-reset-psswd').css('border-color', 'green');
    $result.text("Adres e-mail jest poprawny");
    $result.css("color", "green");

  } 
  
  else 
  {
    $('#email-reset-psswd').css('border-color', 'red');
    $result.text("Adres e-mail jest niepoprawny");
    $result.css("color", "red");
  }
  return false;
}

</script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
