<?php

	session_start();
	require("Db.class.php");
    $db = new Db();

    $db->bind("login", $_SESSION['login']);
    $id =$db->single("SELECT id FROM uzytkownicy WHERE login = :login");

   $nazwa = $_POST['nazwa'];
   $opis = $_POST['opis'];
   $kategoria = $_POST['kategoria'];
   $wiek = $_POST['wiek'];
   $telefon = $_POST['telefon'];
   $strona = $_POST['strona'];
   $wojewodztwo = $_POST['wojewodztwo'];
   $powiat = $_POST['powiat'];
   $gmina = $_POST['gmina'];
   $miasto = $_POST['miasto'];
   $ulica = $_POST['ulica'];
   $kodpocztowy = $_POST['kodpocztowy'];
   $tytul_1 = $_POST['tytul_1'];
   $tytul_2 = $_POST['tytul_2'];
   $tytul_3 = $_POST['tytul_3'];
   $tytul_4 = $_POST['tytul_4'];
   $opis_1 = $_POST['opis_1'];
   $opis_2 = $_POST['opis_2'];
   $opis_3 = $_POST['opis_3'];
   $opis_4 = $_POST['opis_4'];

		$image_tmp = $_FILES['image_1']['tmp_name']; 
		$image_nazwa = $_FILES['image_1']['name']; 
		$image_rozmiar = $_FILES['image_1']['size']; 
		$image2_tmp = $_FILES['image_2']['tmp_name']; 
		$image2_nazwa = $_FILES['image_2']['name']; 
		$image2_rozmiar = $_FILES['image_2']['size'];
		$image3_tmp = $_FILES['image_3']['tmp_name']; 
		$image3_nazwa = $_FILES['image_3']['name']; 
		$image3_rozmiar = $_FILES['image_3']['size']; 
		$image4_tmp = $_FILES['image_4']['tmp_name']; 
		$image4_nazwa = $_FILES['image_4']['name']; 
		$image4_rozmiar = $_FILES['image_4']['size'];
		$image5_tmp = $_FILES['image_5']['tmp_name']; 
		$image5_nazwa = $_FILES['image_5']['name']; 
		$image5_rozmiar = $_FILES['image_5']['size'];



if( (!empty($nazwa)) && (!empty($opis)) && (is_uploaded_file($image_tmp)) && $kategoria!="default" && $wiek!="default" && (!empty($telefon)) && (!empty($wojewodztwo)))

   {

   	$insert  =  $db->query("INSERT INTO wizytowki(nazwa,uzytkownik,strona,wojewodztwo,powiat,gmina,miasto,ulica,kodpocztowy,telefon,opis,kategoria,wiek,promo,zdjecie,zdjecie2,zdjecie3,zdjecie4,zdjecie5,opinie,info_title1,info_text1,info_title2,info_text2,info_title3,info_text3,info_title4,info_text4) VALUES(:nazwa,:id,:strona,:wojewodztwo,:powiat,:gmina,:miasto,:ulica,:kodpocztowy,:telefon,:opis,:kategoria,:wiek,:promo,:zdjecie,:zdjecie2,:zdjecie3,:zdjecie4,:zdjecie5,:opinie,:info_title_1,:info_text_1,:info_title_2,:info_text_2,:info_title_3,:info_text_3,:info_title_4,:info_text_4)",
    array("nazwa"=>$nazwa,"id"=>$id,"strona"=> $strona,"wojewodztwo"=>$wojewodztwo,"powiat"=>$powiat,"gmina"=>$gmina,"miasto"=>$miasto,"ulica"=>$ulica,"kodpocztowy"=>$kodpocztowy,"telefon"=>$telefon,"opis"=>$opis,"kategoria"=>$kategoria,"wiek"=>$wiek,"promo"=> 0,"zdjecie"=>$image_nazwa,"zdjecie2"=>$image2_nazwa,"zdjecie3"=>$image3_nazwa,"zdjecie4"=>$image4_nazwa,"zdjecie5"=>$image5_nazwa,"opinie"=>0,"info_title_1"=>$tytul_1,"info_text_1"=>$opis_1,"info_title_2"=>$tytul_2,"info_text_2"=>$opis_2,"info_title_3"=>$tytul_3,"info_text_3"=>$opis_3,"info_title_4"=>$tytul_4,"info_text_4"=>$opis_4 ));

   			$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:green;font-size:1.1em;font-weight:bold;text-align:center; ">Dodano wizytowke!</div>'; 

			


					$maxrozmiar = 5*1024*1024;


							if(is_uploaded_file($image_tmp)) { 

								if($image_rozmiar < $maxrozmiar){

									$odczyt = pathinfo($image_nazwa);
									$ext = $odczyt['extension'];

										if($ext == "jpg" || $ext == "jpeg" ||$ext == "png"){

												if(!file_exists("img/".$image_nazwa)){

														move_uploaded_file($image_tmp, "img/".$image_nazwa);

													}

												else{
													
													$nazwazdjecie = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
													$nazwazdjecie = str_shuffle($token);
													$nazwazdjecie = substr($token, 0, 3);
													$image_nazwa=$nazwazdjecie.$image_nazwa;

													move_uploaded_file($image_tmp, "img/".$image_nazwa);

													}
													

												}
											

										else{

											$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Zły format zdjęcia!</div>';
										}		

									}

								else
									{
									$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Za duży rozmiar pliku!</div>'; 

									}
												    
								}	


							if(is_uploaded_file($image2_tmp)) { 

								if($image2_rozmiar < $maxrozmiar){

									$odczyt = pathinfo($image2_nazwa);
									$ext = $odczyt['extension'];

										if($ext == "jpg" || $ext == "jpeg" ||$ext == "png"){

												if(!file_exists("img/".$image2_nazwa)){

														move_uploaded_file($image2_tmp, "img/".$image2_nazwa);

													}

												else{
													
													$nazwazdjecie = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
													$nazwazdjecie = str_shuffle($token);
													$nazwazdjecie = substr($token, 0, 3);
													$image2_nazwa=$nazwazdjecie.$image2_nazwa;

													move_uploaded_file($image2_tmp, "img/".$image2_nazwa);

													}
													

												}
											

										else{

											$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Zły format zdjęcia!</div>';
										}		

									}

								else
									{
									$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Za duży rozmiar pliku!</div>'; 

									}
												    
								}	


							if(is_uploaded_file($image3_tmp)) { 

								if($image3_rozmiar < $maxrozmiar){

									$odczyt = pathinfo($image3_nazwa);
									$ext = $odczyt['extension'];

										if($ext == "jpg" || $ext == "jpeg" ||$ext == "png"){

												if(!file_exists("img/".$image3_nazwa)){

														move_uploaded_file($image3_tmp, "img/".$image3_nazwa);

													}

												else{
													
													$nazwazdjecie = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
													$nazwazdjecie = str_shuffle($token);
													$nazwazdjecie = substr($token, 0, 3);
													$image3_nazwa=$nazwazdjecie.$image3_nazwa;

													move_uploaded_file($image3_tmp, "img/".$image3_nazwa);

													}
													

												}
											

										else{

											$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Zły format zdjęcia!</div>';
										}		

									}

								else
									{
									$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Za duży rozmiar pliku!</div>'; 

									}
												    
								}	


							if(is_uploaded_file($image4_tmp)) { 

								if($image4_rozmiar < $maxrozmiar){

									$odczyt = pathinfo($image4_nazwa);
									$ext = $odczyt['extension'];

										if($ext == "jpg" || $ext == "jpeg" ||$ext == "png"){

												if(!file_exists("img/".$image4_nazwa)){

														move_uploaded_file($image4_tmp, "img/".$image4_nazwa);

													}

												else{
													
													$nazwazdjecie = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
													$nazwazdjecie = str_shuffle($token);
													$nazwazdjecie = substr($token, 0, 3);
													$image4_nazwa=$nazwazdjecie.$image4_nazwa;

													move_uploaded_file($image4_tmp, "img/".$image4_nazwa);

													}
													

												}
											

										else{

											$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Zły format zdjęcia!</div>';
										}		

									}

								else
									{
									$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Za duży rozmiar pliku!</div>'; 

									}
												    
								}	


							if(is_uploaded_file($image5_tmp)) { 

								if($image5_rozmiar < $maxrozmiar){

									$odczyt = pathinfo($image5_nazwa);
									$ext = $odczyt['extension'];

										if($ext == "jpg" || $ext == "jpeg" ||$ext == "png"){

												if(!file_exists("img/".$image5_nazwa)){

														move_uploaded_file($image5_tmp, "img/".$image5_nazwa);

													}

												else{
													
													$nazwazdjecie = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
													$nazwazdjecie = str_shuffle($token);
													$nazwazdjecie = substr($token, 0, 3);
													$image5_nazwa=$nazwazdjecie.$image5_nazwa;

													move_uploaded_file($image5_tmp, "img/".$image5_nazwa);

													}
													

												}
											

										else{

											$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Zły format zdjęcia!</div>';
										}		

									}

								else
									{
									$_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Za duży rozmiar pliku!</div>'; 

									}
												    
								}	

          header("Location:add_new.php"); 


   }
else
	      $_SESSION["dodawanie"] ='<div style="width:100%;padding-top:1%;padding-bottom:1%;background-color:red;font-size:1.1em;font-weight:bold;text-align:center; ">Popraw błędy!</div>';  
          header("Location:add_new.php"); 




?> 