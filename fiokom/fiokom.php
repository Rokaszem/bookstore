<?php
if(isset($_POST['adatvaltoztatas'])){
	$fiokkezeles='UPDATE emberek SET ';
	if($_POST['ujemail']!=''){
		$fiokkezeles.=' email="'.$_POST['ujemail'].'", ';
	}
	if($_POST['ujtelefonszam']!=''){
		$fiokkezeles.=' tel="'.$_POST['ujtelefonszam'].'", ';
	}
	if($_POST['ujcim']!=''){
		$fiokkezeles.=' cim="'.$_POST['ujcim'].'", ';
	}
	if($_POST['jelszo']){
		if($_POST['regijelszo']!='' && md5($_POST['regijelszo'])==$_SESSION['user']['jelszo']){
			$fiokkezeles.=' jelszo=MD5("'.$_POST['ujjelszo'].'"), ';
		}
	}
	$updatefiok=substr($fiokkezeles,0,-2);
	$updatefiok.=' WHERE emberek.nev="'.$_SESSION['user']['nev'].'"';
	if($_POST['regijelszo']!='' && md5($_POST['regijelszo'])==$_SESSION['user']['jelszo']){
		$res=mysql_query($updatefiok);
		if(!$res){
			echo mysql_error();
		}else{
			include('../login/logout.php');
		}
	}
}
?>
				<div id="main">
					<div class="inner">
								<h1>Fiókom</h1>
								<form action='' method='post'>
								<table border='0px'>
									<tr>
										<th>Név:</th>
										<td><?php echo $_SESSION['user']['nev']; ?></td>
									</tr>
									<tr>
										<th>Születési idő:</th>
										<td><?php echo $_SESSION['user']['szulido']; ?></td>
									</tr>
									<tr>
										<th>E-mail cím:</th>
										<td><input type='email' name='ujemail' placeholder='<?php echo $_SESSION['user']['email']; ?>' /></td>
									</tr>
									<tr>
										<th>Telefonszám:</th>
										<td><input type='text' name='ujtelefonszam' placeholder='<?php echo $_SESSION['user']['tel']; ?>' /></td>
									</tr>
									<tr>
										<th>Cím:</th>
										<td><input type='text' name='ujcim' placeholder='<?php echo $_SESSION['user']['cim']; ?>' /></td>
									</tr>
									<tr>
										<th>Jelszó:<br /><label>Jelszó megváltoztatása:<input type="checkbox" id='ujjelszocheckbox' name="jelszo" value="ujjelszo" style='height:21px;margin:5;float:right;' /></label></th>
										<td>
										<input type='password' name='regijelszo' placeholder='Jelszó' />
										
										<input id='ujjelszoinput'  type='password' name='ujjelszo' placeholder='Új jelszó' style='display:none;'/>
										</td>
									</tr>
								</table>
								<input type='submit' name='adatvaltoztatas' value='Mentés' style='float:right;' />
								</form>
					</div>
				</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
			<script type='text/javascript'>
			$(document).ready(function(){
				$('#ujjelszocheckbox').change(function(){
					if($(this).is(":checked")) {
						$('#ujjelszoinput').show();
					}else{
						$('#ujjelszoinput').hide();
					}
				});
			});
			</script>