<?php
	$title = "Médiatartalom-kezelő rendszerek";
	include("../part/header.php");

	if(!empty($_POST['obj'])) {
		$obj = $_POST['obj'];
	} else {
		$obj = 'parlament';
	}
	if(empty($_SERVER['db'])){
		$db = new PDO('mysql:host=localhost;dbname=mer;charset=utf8', 'webuser', 'budapest');
		$_SERVER['db'] = 'a';
	}

	/* sql query -> $result */
	
	$result = array(
			array(
				'img_src' => 'http://placehold.it/1600x900',
				'title' => 'elso',
				'author' => '@elso_auth',
				'link_id' => '31',
			),
			array(
				'img_src' => 'http://placehold.it/1601x901',
				'title' => 'ketto',
				'author' => '@ketto_auth',
				'link_id' => '32',
			),
			array(
				'img_src' => 'http://placehold.it/1602x902',
				'title' => 'harom',
				'author' => '@harom_auth',
				'link_id' => '33',
			),
			array(
				'img_src' => 'http://placehold.it/1603x903',
				'title' => 'negy',
				'author' => '@negy_auth',
				'link_id' => '34',
			),
			array(
				'img_src' => 'http://placehold.it/1604x904',
				'title' => 'ot',
				'author' => '@ot_auth',
				'link_id' => '35',
			),
		);
	//var_dump($result);
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
								<img src="<?php echo $elso['img_src']; ?>" alt="<?php echo $elso['title'].' - '.$elso['author']; ?>" class="img-responsive"/>
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
			
			<div class="row">
				<?php
					$a = array();
					$a = array_slice($result,1);
					foreach($a as &$val){
						echo '<a href="../tour/index.php?link_id=' . $val['link_id'] . '">'
								. '<div class="col-md-4">'
									. '<div class="panel panel-default transparent">'
										. '<div class="panel-body">'
											. '<img src="' . $val['img_src'] . '" alt="' . $val['title'] . ' - ' . $val['author'] . '" class="img-responsive"/>'
										. '</div>'
										. '<div class="panel-footer">'
											. '<h4 class="panel-title">' . $val['title'] . '</h4>'
											. '<p>from ' . $val['author'] . '</p>'
										. '</div>'
									. '</div>'
								. '</div>'
							. '</a>';
					}
				?>
				<!--div class="col-md-4">
					<div class="panel panel-default transparent">
						<div class="panel-body">
							<img src="http://placehold.it/1600x900" alt="..." class="img-responsive"/>
						</div>
						
						<div class="panel-footer">					
							<h4 class="panel-title">Video title</h4>
							<p>from @author</p>
						</div>
					</div>
				</div-->
				
			</div>
		</div>
<?php
	include("../part/footer.php");
?>
