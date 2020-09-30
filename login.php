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

    <title>Aktywne Dziecko - Logowanie</title>

  </head>

<body>
<script>
jQuery(function ($) { // a
    $(".logowanie").submit(function (event) {
     // b i c
        event.preventDefault();
        var method = this.method;
        var url = this.action;
        var data = $(this).serialize();
        
        

        $.ajax({ // f
            type: "POST",
            url: "logowanie.php",
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





        <div id="login-container">

          <form action='logowanie.php' method='post' class='logowanie'>

            <span id="rejestracja-napis">Logowanie</span>
            <span id="email-napis">E-mail</span>
            <input  id="email-input" type="text" autocomplete="off" name="login" autofocus>
            <span id="haslo-napis">Hasło</span>
            <input id="haslo-input" type="password" name="haslo">
            <a href="resetpassword.php"><span id="reset-psswd" style="text-decoration:none;margin-left:5%;display:block;margin-top:1%;margin-bottom:1%; color:black;">Przypomnij hasło</span></a>
            <input id="login-button" type="submit" value="Zaloguj" name="loguj">

          </form>

        </div>
        
    <div class="error" id="blad"><b>Wpisano złe dane!</b></div>
        

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>