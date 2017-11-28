<?php
$row=mysql_fetch_assoc(mysql_query('SELECT k.*, ko.nev as kiadonev, ir.nev as ironev from konyv as k left join kiado as ko on (ko.id=kiado_id) left join iro as ir on (ir.id=iro_idiro) WHERE k.id='.$_GET['konyvid']));
if(isset($_POST['kosarba'])){
	$_SESSION['kosar'][$_GET['konyvid']]=$_POST['darabkonyv'];
	header('Location: ../bookstore2/?oldal=konyv&&konyvid='.$_GET['konyvid']);
};
?>
				<link rel="stylesheet" href="assets/css/konyv.css" />
				
					<div id="main">
						<div class="inner">
							<div id='slider' >
								<img style='height:600px;max-width:500px;' src="../bookstore2/konyv/<?php echo $_GET['konyvid']; ?>.jpg" />
							</div>
							
							
							
							
							
							
							
							<div id='konyvadatok'>
							<table border='0px'>
								<tr>
									<th>Név:</th><td><?php echo $row['nev']; ?></td>
								</tr>
								<tr>
									<th>ISBN:</th><td><?php echo $row['isbn']; ?></td>
								</tr>
									<th>Oldalak:</th><td><?php echo $row['oldalak']; ?></td>
								</tr>
									<th>Megjelenés:</th><td><?php echo $row['megjelenes']; ?></td>
								</tr>
									<th>Nyelv:</th><td><?php echo $row['nyelv']; ?></td>
								</tr>
									<th>Író:</th><td><a href='http://www.google.com/search?q=<?php echo $row['ironev']; ?>' target="_blank"><?php echo $row['ironev']; ?></a></td>
								</tr>
									<th>Kiadó:</th><td><a href='http://www.google.com/search?q=<?php echo $row['kiadonev']; ?>' target="_blank"><?php echo $row['kiadonev']; ?></a></td>
								</tr>
							</table>
							</div>
							<div id='vasarlas'>
								<label style='font-size:150%;'><?php echo $row['ar']; ?> Ft</label>
								<?php
								if($row['darab']!=0){
									?>
								<form name='vasarlas' method='post' style='width:300px;margin-right:0;padding-right:0;border-right:0;'>
									<input name='darabkonyv' type='number' min='1' value='1' max='<?php echo $row['darab'] ?>' />
									<input type='submit' name='kosarba' value='Kosárba' />
								</form>
								<?php
								}else{
									echo 'Ez a könyv nincs raktáron.';
								}
								?>
							</div>
							<div id='konyvleiras'>
							<hr />
							<?php echo $row['ismerteto']; ?><br />
							<a href='<?php echo $row['molylink']; ?>'><img style='-moz-transform: scaleX(-1);-o-transform:scaleX(-1);-webkit-transform: scaleX(-1);transform: scaleX(-1);width:100px;float:right;' src='../bookstore2/images/moly.png' /></a>
							</div>
							
						
					</div>
				</div>
						
						
						
						
						
						
						
						
						
						
			
			