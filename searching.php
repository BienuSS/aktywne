<?php

    $miasto = $_POST['miasto'];
    $wiek = $_POST['wiek'];
    if($miasto != "" && $wiek !="")
    header("Location:search.php?miasto=".$miasto."&wiek=".$wiek.""); 
    else
    header("Location:search.php");  
?>