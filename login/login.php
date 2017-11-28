<?php
if(isset($_POST['bejelentkezes'])){
	login($_POST['email'],$_POST['jelszo']);
}
if(isset($_POST['regisztracio'])){
	$insert='INSERT INTO emberek(nev,jelszo,email,tel,cim,szulido) VALUES (
	"'.$_POST['nev'].'",
	MD5("'.$_POST['jelszo'].'"),
	"'.$_POST['email'].'",
	"'.$_POST['telefonszam'].'",
	"'.$_POST['cim'].'",
	"'.$_POST['ev'].'.'.$_POST['honap'].'.'.$_POST['nap'].'")';
	$res=mysql_query($insert);
	if(!$res){
		echo mysql_error();
	}else{
		header("Location: /bookstore2/");
		exit();
	}
	
}?>
					
				<div id="main" style='overflow:auto;min-height:300px;padding-bottom:0;'>
					<div class="inner" style='width:73%;'>
						<div style='padding-bottom:25px;'>
						<button class='kivalasztbejelentkezes'>Bejelentkezés</button>
						<button class='kivalasztregisztracio'>Regisztráció</button>
						</div>
						<form action='' method='post'> 
								<div class='bejelentkezes'>
								<input type='email' name='email' placeholder='E-mail' />
								<input type='password' name='jelszo' placeholder='Jelszó' />
								<input type='submit' name='bejelentkezes' value='Bejelentkezés' style='margin-top:5px;' />
								</div>
							</form>
						<form action='' method='post'> 
								<div class='regisztrácio' style='display:none;height:100%;'>
								<input type='text' name='nev' placeholder='Név'>
								<input type='email' name='email' placeholder='E-mail' />
								<input type='password' name='jelszo' placeholder='Jelszó' />
								<input type='text' name='telefonszam' placeholder='Telefonszám' />
								<input type='text' name='cim' placeholder='Cím' />
								<div class='szuletesiido' >
									<input type='text' style='float:left;' name='ev' placeholder='ÉÉÉÉ' maxlength='4' style='width:3.5%;' />
									<input type='text' style='float:left;' name='honap' placeholder='HH' maxlength='2' style='width:2.5%;' />
									<input type='text' style='float:left;' name='nap' placeholder='NN' maxlength='2' style='width:2.5%;' />
								</div>
								<input type='submit' name='regisztracio' value='Regisztráció' style='margin-top:5px;' />
								</div>
							</form>
					</div>
				</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
			<script type='text/javascript'>
			$(document).ready(function(){
				$('button.kivalasztregisztracio').click(function(){
					$('div.bejelentkezes').hide('fast');
					$('.regisztrácio').show('fast');
				});//end_regisztracio
				$('button.kivalasztbejelentkezes').click(function(){
					$('.regisztrácio').hide('fast');
					$('div.bejelentkezes').show('fast');
				});//end_bejelentkezes
			});//end_documnet
			</script>
