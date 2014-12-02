<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Opisz swoją wycieczkę</title>
<link rel="stylesheet" type="text/css" href="dodaj_wpis.css" media="all">
<script type="text/javascript" src="dodaj_wpis.js"></script>

</head>
<?php

if (!isset($_SESSION['login']) || $_SESSION['login']!=true) header("Location: ../login.php");
?>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Kreator dodawania wpisu</a></h1>
		<form id="form_935503" class="appnitro"  method="post" action="add.php">
					<div class="form_txt">
			<h2>Kreator dodawania wpisu</h2>
			<p>Tutaj możesz podzielić się swoimi przeżyciami</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="txt" for="title">Tytuł </label>
		<div>
			<input id="title" name="title" class="element text large" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Tytuł wycieczki</small></p> 
		</li>		
		<li id="li_1" >
		<label class="txt" for="difficulty">Poziom trudności </label>
		<div>
			<input id="difficulty" name="difficulty" class="element text large" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Poziom trudności wycieczki</small></p> 
		</li>
		<li id="li_1" >
		<label class="txt" for="budget">Budżet </label>
		<div>
			<input id="budget" name="budget" class="element text large" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Budżet wycieczki</small></p> 
		</li>
		<li id="li_1" >
		<label class="txt" for="country">Kraj </label>
		<div>
			<input id="country" name="country" class="element text large" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Kraj wycieczki</small></p> 
		</li>				
		<li id="li_2" >
		<label class="txt" for="txt">Opis </label>
		<div>
			<textarea id="txt" name="txt" class="element textarea large"></textarea> 
		</div><p class="guidelines" id="guide_2"><small>Tutaj możesz opisać swoją wycieczkę</small></p> 
		</li>		<li id="li_3" >
		<label class="txt" for="miniature">Obrazek </label>
		<div>
			<input id="miniature" name="miniature" class="element text large" type="text" maxlength="255" value="http://"/> 
		</div><p class="guidelines" id="guide_3"><small>Podaj link do zdjęcia</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="935503" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Dodaj" />
		</li>
			</ul>
		</form>	
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>