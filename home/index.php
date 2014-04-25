<?php
	$title = "Médiatartalom-kezelő rendszerek";
	include("../part/header.php");

	$obj = 'Parlament';
	if(!empty($_POST['obj'])) {
		if(in_array($_POST['obj'], array("Parlament",
					"Hősők tere",
					"Erzsébet híd",
					"Fővárosi Állat- és Növénykert",
					"Dohány utcai zsinagóga",
					"Széchenyi Lánchíd",
					"Szent István-bazilika",
					"Budai Vár",
					"Gellért-hegy",
					"Iparművészeti Múzeum",
					"Citadella",
					"Halászbástya",
					"Mátyás templom",
					"Belvárosi Ferences Templom",
					"Szent István szobor",
					"Széll Kálmán tér",
					"Rákóczi híd",
					"Országos Széchényi Könyvtár",
					"Nyugati pályaudvar",
					"Szabadság híd",
					"Margit híd",
					"Keleti pályaudvar",
					"Szépművészeti múzeum",
					"Hotel Gellért",
					"Nemzeti múzeum",
					"Vígszínház",
					"Vajdahunyad vára",
					"Műjégpálya",
					"Bálna Budapest",
					"Petőfi híd",
					"Budapesti operaház",
					"Margitszigeti szökőkút",
					"Nemzeti Színház",	
					"Budavári Sikló",
					"Budai Váralagút",
					"Vásárcsarnok",
					"Szabadság-szobor",
					"Széchenyi fürdő",
					"Művészetek Palotája",
					"Papp László Budapest Sportaréna",
					"Déli pályaudvar")))
			$obj = $_POST['obj'];	
	}
	
	if(empty($_SERVER['db'])){
		$db = new PDO('mysql:host=localhost;dbname=mer;charset=utf8', 'webuser', 'budapest');
		$_SERVER['db'] = 'a';
	}


	$sql = "SELECT video.name as 'title', video.author as 'author', link.ID as 'link_id' "
		. "FROM video, link, object "
		. "WHERE link.object_ID = object.ID and link.video_ID = video.ID and object.DisplayName LIKE \"%" . $obj . "%\" "
		. "ORDER BY 1/(((link.end-link.start)/video.length)*(link.width*link.height))";
	$result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	/* sql query -> $result */
		$elso = array();
		$elso = $result[0];
?>
		<div class="container">
			<div class="row">
				<a href="<?php echo '../tour/index.php?link_id=' . $elso['link_id']; ?>">
					<div class="col-md-offset-1 col-md-10">
						<div class="panel panel-default transparent">
							<div class="panel-body">
								<!--img src="http://placehold.it/1600x900" alt="fo" class="img-responsive"/-->
								<img src="<?php echo '//danii.jumper.hu/~mer/img/' . $elso['link_id'] . '.png'; ?>" alt="<?php echo $elso['title'].' - '.$elso['author']; ?>" class="img-responsive" style="width: 100%; heigth: auto;"/>
							</div>
						
							<div class="panel-footer">					
								<!--h4 class="panel-title">Video title</h4>
								<p>from @author</p-->
								<h4 class="panel-title"><?php echo $elso['title']; ?></h4>
								<p><?php echo $elso['author']; ?></p>
							</div>
						</div>
					</div>
				</a>
			</div>
			
			<?php
				$a = array();
				$a = array_slice($result,1);
				
				$i = 1;
				
				foreach($a as &$val){
					if($i % 3 == 0)
						echo '<div class="row">';
					echo '<a href="../tour/index.php?link_id=' . $val['link_id'] . '">'
							. '<div class="col-md-4">'
								. '<div class="panel panel-default transparent">'
									. '<div class="panel-body">'
										. '<img src="//danii.jumper.hu/~mer/img/' . $val['link_id'] . '.png' . '" alt="' . $val['title'] . ' - ' . $val['author'] . '" class="img-responsive"/>'
									. '</div>'
									. '<div class="panel-footer">'
										. '<h4 class="panel-title">' . $val['title'] . '</h4>'
										. '<p>from ' . $val['author'] . '</p>'
									. '</div>'
								. '</div>'
							. '</div>'
						. '</a>';
					if($i % 3 == 0)
						echo '</div>';
					$i++;
				}
			?>
		</div>
<?php
	include("../part/footer.php");
?>
