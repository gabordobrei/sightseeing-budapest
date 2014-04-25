<?php

	$sidebar = array(
		array(
			'title' => 'elso',
			'author' => '@elso_auth',
			'link_id' => '1_link_id',
		),
		array(
			'title' => 'ketto',
			'author' => '@ketto_auth',
			'link_id' => '2_link_id',
		),
		array(
			'title' => 'harom',
			'author' => '@harom_auth',
			'link_id' => '3_link_id',
		),
		array(
			'title' => 'negy',
			'author' => '@negy_auth',
			'link_id' => '4_link_id',
		),
		array(
			'title' => 'ot',
			'author' => '@ot_auth',
			'link_id' => '5_link_id',
		),
	);
					
	foreach($sidebar as &$val){
		echo '<a href="index.php?link_id=' . $val['link_id'] . '" class="list-group-item">'
				. '<div class="row">'
					. '<div class="col-md-5">'
						. '<img src="' . $val['link_id'] . '.png" alt="' . $val['title'] . ' - ' . $val['author'] . '" class="img-responsive"/>'
					. '</div>'
					. '<div class="col-md-7">'
							. '<h4 class="panel-title">' . $val['title'] . '</h4>'
							. '<p>from ' . $val['author'] . '</p>'
					. '</div>'
				. '</div>'
			. '</a>';
	}
?>
