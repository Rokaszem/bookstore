<?php 
/*INSERT INTO kategoriak_has_konyv(konyv_id,kategoriak_id) VALUES(13,5), (13,9), (13,20), (13,21)
ON DUPLICATE KEY update `konyv_id`=values(`konyv_id`)*/
unset($_SESSION['konyvkezel']);
error_reporting(E_ALL ^ E_NOTICE);
if($_GET['sub']=='ujkonyv'){
	if(isset($_GET['konyvid'])){
		$res=mysql_query('SELECT k.*, ko.nev as kiadonev, ir.nev as ironev from konyv as k
		left join kiado as ko on (ko.id=kiado_id) 
		left join iro as ir on (ir.id=iro_idiro) 
		WHERE k.id='.$_GET['konyvid']);
		$row=mysql_fetch_assoc($res);
		$_SESSION['konyvkezel']=$row;
		$selectkat='
			SELECT ka.* FROM `kategoriak_has_konyv`
				LEFT JOIN kategoriak as ka on(ka.id=`kategoriak_id`)
				RIGHT JOIN konyv as ko on(ko.id=`konyv_id`)
				WHERE ko.id='.$_GET['konyvid'];
		$reskategoriaksess=mysql_query($selectkat);
		while($rowkategoraikess=mysql_fetch_assoc($reskategoriaksess)){
			$_SESSION['kategoriak']=$rowkategoraikess;
		};
		if(isset($_POST['konyvkezeles'])){
			$update='UPDATE konyv SET ';
			unset($_POST['konyvkezeles']);
			$_SESSION['konyvkezel']=$_POST;
			foreach($_SESSION['konyvkezel'] as $key =>$value){
				if(!is_array($value)){
					if($value!=''){
						$update.=' '.$key.'="'.$value.'", ';
					}
				}
			}
			$update2=substr($update,0,-2);
			$update2.=' WHERE id='.$_GET['konyvid'];
			mysql_query($update2);
			if($_POST['kivalasztottkategoriak']!=''){
				mysql_query('DELETE FROM `kategoriak_has_konyv` WHERE konyv_id='.$_GET['konyvid']);
				$updatekat='INSERT INTO kategoriak_has_konyv(konyv_id,kategoriak_id) VALUES';
				foreach($_POST['kivalasztottkategoriak'] as $key => $value){
					$updatekat.='('.$_GET['konyvid'].','.$value.'), ';
				}
				$updatekat2=substr($updatekat,0,-2);
				$updatekat2.='ON DUPLICATE KEY update konyv_id=values(konyv_id)';
				mysql_query($updatekat2);
			}
			//echo $updatekat2;
			header('Location:../bookstore2/?oldal=adminfelulet&&sub=konyvek');
		}
	}
	/*echo $update.' | '.$update2.' | ';
	echo '<br />post: ';var_dump($_POST);echo '|<br />session:';
	var_dump($_SESSION);*/
	if(isset($_POST['konyvkezeles'])){
			$resiro=mysql_query('SELECT * FROM iro WHERE nev="'.$_POST['iro'].'"');
			if(!$resiro){
				echo mysql_error();
			}
			if(mysql_num_rows($resiro)<=0){
				mysql_query('INSERT INTO iro (nev) VALUES ("'.$_POST['iro'].'")');
			}
			
			$resiro2=mysql_query('SELECT * FROM iro WHERE nev="'.$_POST['iro'].'"');
			$rowiro=mysql_fetch_assoc($resiro2);
			
			
			
			
			
			$reskiado=mysql_query('SELECT * FROM kiado WHERE nev="'.$_POST['kiado'].'"');
			if(!$reskiado){
				echo mysql_error();
			}
			if(mysql_num_rows($reskiado)<=0){
				mysql_query('INSERT INTO kiado (nev) VALUES ("'.$_POST['kiado'].'")');
			}
			$reskiado2=mysql_query('SELECT * FROM kiado WHERE nev="'.$_POST['kiado'].'"');
			$rowkiado=mysql_fetch_assoc($reskiado2);
			if($_POST['darab']>=0){
				$statusz=1;
			}else{
				$statusz=0;
			}
			//konyv
			$insertkonyv='INSERT INTO konyv (nev,isbn,oldalak,megjelenes,nyelv,ismerteto,darab,ar,molylink,iro_idiro,kiado_id,statusz) VALUES (
			"'.$_POST['nev'].'",
			'.$_POST['isbn'].',
			'.$_POST['oldalak'].',
			"'.$_POST['megjelenes'].'",
			"'.$_POST['nyelv'].'",
			"'.$_POST['ismerteto'].'",
			'.$_POST['darab'].',
			'.$_POST['ar'].',
			"'.$_POST['molylink'].'",
			'.$rowiro['id'].',
			'.$rowkiado['id'].',
			'.$statusz.'
			)';
			
			
			$res=mysql_query($insertkonyv);
			if(!$res){
				echo mysql_error();
			}
			
			//borito
			$selectborito='SELECT * FROM konyv WHERE nev="'.$_POST['nev'].'"';
			$resborito=mysql_query($selectborito);
			$rowborito=mysql_fetch_assoc($resborito);
			
			//kategoriak
			$insertkonykat='INSERT INTO kategoriak_has_konyv (konyv_id,kategoriak_id) VALUES';
			foreach($_POST['kivalasztottkategoriak'] as $key => $value){
				$insertkonykat.='('.$rowborito['id'].','.$value.'), ';
			}
			$insertkonykat2=substr($insertkonykat,0,-2);
			mysql_query($insertkonykat2);
			
			if(isset($_FILES['borito'])){
				$file=$_FILES['borito'];
				$filenev=$file['name'];
				$filetmp=$file['tmp_name'];
				$filesize=$file['size'];
				$filehiba=$file['error'];	
				$fileext=explode('.',$filenev);
				$filetipus=strtolower(end($fileext));
				$engedelyezett=array('jpg','png');
				if(in_array($filetipus,$engedelyezett)){
					if($filehiba==0){
						if($file_size <= 2097152){
							$fileujnev=$rowborito['id'].'.'.$filetipus;
							$filecel='../bookstore2/konyv/'.$fileujnev;
							move_uploaded_file($filetmp,$filecel);
						}
					}
				}
			}
		header('Location:../bookstore2/?oldal=adminfelulet&&sub=konyvek');
	}
}
?>
<style>
#tags{
	min-width:100%;
}
#tags2{
	min-width:100%;
}
</style>
<table>
	<form action='' method='post' enctype="multipart/form-data">
		<tr><th>Név:</th><td><input type='text' name='nev' placeholder='<?php echo $_SESSION['konyvkezel']['nev']; ?>' /></td></tr>
		<tr><th>ISBN:</th><td><input type='text' name='isbn' placeholder='<?php echo $_SESSION['konyvkezel']['isbn']; ?>' /></td></tr>
		<tr><th>Oldalak száma:</th><td><input type='number' min='1' name='oldalak' placeholder='<?php echo $_SESSION['konyvkezel']['oldalak']; ?>' /></td></tr>
		<tr><th>Megjelenés:</th><td><input type='text' placeholder='<?php echo $_SESSION['konyvkezel']['megjelenes']; ?>' name='megjelenes' /></td></tr>
		<tr><th>Nyelv:</th><td><input type='text' name='nyelv' placeholder='<?php echo $_SESSION['konyvkezel']['nyelv']; ?>' /></td></tr>
		<tr><th>Író:</th><td><?php include('../bookstore2/autocomplate2.php'); ?></td></tr>
		<tr><th>Kiadó:</th><td><?php include('../bookstore2/autocomplate.php'); ?></td></tr>
		<tr><th>Darab:</th><td><input type='text' name='darab' placeholder='<?php echo $_SESSION['konyvkezel']['darab']; ?>' /></td></tr>
		<tr><th>Ár:</th><td><input type='number' name='ar' placeholder='<?php echo $_SESSION['konyvkezel']['ar']; ?>' /> Ft</td></tr>
		<tr><th>Moly:</th><td><input type='text' name='molylink' placeholder='<?php echo $_SESSION['konyvkezel']['molylink']; ?>' /></td></tr>
		<tr><th>Ismertető:</th><td><textarea name='ismerteto' placeholder='<?php echo $_SESSION['konyvkezel']['ismerteto']; ?>' ></textarea></td></tr>
		<tr><th>Borítókép(maximum méret 2MB):</th><td><input type="file" name="borito" /></td></tr>
		<tr><th>Kategóriák:</th><td>
		 <select data-placeholder="Kategóriák..." multiple class="chosen-select" name='kivalasztottkategoriak[]' tabindex="8">
			<option value=""></option>
<?php
//1193
$reskategoriak=mysql_query('SELECT * FROM kategoriak');
while($rowkategoraik=mysql_fetch_assoc($reskategoriak)){ 
?>
			<option value='<?php echo $rowkategoraik['id']; ?>'
<?php
			if(isset($_GET['konyvid'])){
				$reskat=mysql_query($selectkat);
				while($rowkat=mysql_fetch_assoc($reskat)){
					echo ' rel="1" ';if($rowkat['id']==$rowkategoraik['id']){
						echo ' selected ';
					};
				}
			};
			?>
			><?php echo $rowkategoraik['nev']; ?></option>
<?php
};
?>
		</select>
		</td></tr>
	</table>
	<input style='float:right' type='submit' name='konyvkezeles' value='OK' />
</form>