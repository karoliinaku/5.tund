<?php

	require("functions.php");
	
	//kas on sisse loginud, kui ei ole, siis suunata login lehele
	
	if (!isset ($_SESSION["userId"])) {
		
		header("Location: login.php");
	}
	
	//kas ?logout on aadressireal
	if (isset($_GET["logout"])) {
		
		session_destroy ();
		header ("Location: login.php");
	}

	//ei ole tühjad väljad, mida salvestada (sugu ja värv)
	if(isset($_POST["gender"]) &&
			isset($_POST["color"]) &&
			!empty($_POST["gender"]) &&
			!empty($_POST["color"])
		) {
			savePeople($_POST["gender"], $_POST["color"]);
			
		}
	
	
?>
<h1>Data</h1>
<p> 
	Tere tulemast <?=$_SESSION["email"];?>!
	<a href="?logout=1">Logi välja</a>
</p>

<form method="POST"> 
<label>Sugu</label><br>
			
		<input type="text" name="gender" > <br><br>
	
<label>Värv</label><br>
		
		<input type="color" name="color" > <br><br>
	
	<input type="submit" value="Salvesta">	
</form>















			 
		