<?php
	echo '<script>console.log(' . $_POST['query'] . ');</script>';
	if(!empty($_POST['query'])) {
			
		$db = new PDO('mysql:host=localhost;dbname=mer;charset=utf8', 'webuser', 'budapest');

		$sql = "SELECT video.name as 'title', video.author as 'author', link.ID as 'link_id' "
		. "FROM video, link, object "
		. "WHERE link.object_ID = object.ID and link.video_ID = video.ID and object.ID = " . $_POST['query'] . " "
		. "ORDER BY 1/(((link.end-link.start)/video.length)*(link.width*link.height))";

		$sidebar = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}
					
	foreach($sidebar as &$val){
		echo '<a href="index.php?link_id=' . $val['link_id'] . '" class="list-group-item">'
				. '<div class="row">'
					. '<div class="col-md-5">'
						. '<img src="//danii.jumper.hu/~mer/img/' . $val['link_id'] . '.png" alt="' . $val['title'] . ' - ' . $val['author'] . '" class="img-responsive"/>'
					. '</div>'
					. '<div class="col-md-7">'
							. '<h4 class="panel-title">' . $val['title'] . '</h4>'
							. '<p>from ' . $val['author'] . '</p>'
					. '</div>'
				. '</div>'
			. '</a>';
	}
?>
