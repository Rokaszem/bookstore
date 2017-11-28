<?php
function login($email,$jelszo){
	$checklogin='SELECT * FROM emberek WHERE email="'.$email.'" AND jelszo=MD5("'.$jelszo.'")';
	$res=mysql_query($checklogin);
	if(mysql_num_rows($res)){
			$row=mysql_fetch_assoc($res);
			$_SESSION['user']=$row;
			header("Location: /bookstore2/");
			exit();
	}else{
		echo '<script type="text/javascript">
			alert("Sikertelen bejelentkezés!");
		</script>';
	}
}