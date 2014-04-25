<?php
	$title = "Budapest nevezetességei videoportál";
	
	
	if(!empty($_GET['link_id'])) {
		$get_link_id = $_GET['link_id'];
	} else {
		// default link_id ==> most relevant link of the parliament
		$get_link_id = '40';
	}
	
	/* sql query -> 
		1. post_link_id ==> $elso(vid_src, title, author, descriotion, start time) && obj_id
		2. video_id ==> $links
		2. obj_id ==> $sidebar
	*/

	if(empty($_SERVER['db'])){
		$db = new PDO('mysql:host=localhost;dbname=mer;charset=utf8', 'webuser', 'budapest');
		$_SERVER['db'] = 'a';
	}
	/*$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);*/
	
	$sql = "SELECT video.file as 'video_src', video.ID as 'video_id', video.name as 'title', video.author as 'author', video.description as 'description', link.start as 'start_time', link.object_ID as 'obj_id'"
		. "FROM video, link "
		. "WHERE link.video_ID = video.ID and link.ID = " . $get_link_id . ";";
	$elso = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC)[0];

//echo	"<pre>"; var_dump($elso); echo "</pre>";

	$sql = "SELECT link.width as 'dim_x', link.height as 'dim_y', link.left as 'pos_y', link.top as 'pos_x',  link.start as 'config_x', link.end as 'config_y', link.object_ID as 'obj_id_to', object.DisplayName as 'obj_title_to'"
		. "FROM video, link, object "
		. "WHERE link.object_ID = object.ID and link.video_ID = video.ID and video.ID = " . $elso['video_id'] . ";";
	$links = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//echo "<pre>"; var_dump($links); echo "</pre>";


	$sql = "SELECT video.name as 'title', video.author as 'author', link.ID as 'link_id' "
		. "FROM video, link, object "
		. "WHERE link.object_ID = object.ID and link.video_ID = video.ID and object.ID = " . $elso['obj_id'] . " "
		. "ORDER BY 1/(((link.end-link.start)/video.length)*(link.width*link.height))";
	$sidebar = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//echo "<pre>"; var_dump($sidebar);	echo "</pre>";
	/* $sidebar ==> ../part/asdf.php */
	
	include("../part/header.php");
	
?>
		<div class="container">
			<div class="row">
				<div id="video" class="col-sm-6 col-md-8">
					<div class="panel panel-default">
						<!--video id="videocontent" width="640" height="360" controls="" class="col-centered"-->
						<video id="videocontent" width="100%" height="100%" controls="" class="col-centered" autoplay>
							<source src="//danii.jumper.hu/~mer/<?php echo $elso['video_src'];?>" type="video/mp4" />
						</video>
					
						<div class="panel-heading">
							<h4 class="panel-title"><?php echo $elso['title']; ?></h4>
							<p><?php echo $elso['author']; ?></p>
						</div>

						<div class="panel-body">
							<!--span class="label label-warning">Tag 1</span>
							<span class="label label-success">Tag 2</span>
							<span class="label label-info">Tag 3</span>
							<span class="label label-primary">Tag 4</span-->
							
							<h4>Description</h4>
							<p><?php echo $elso['description']?></p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-4 col-sm-3 col-md-4 sidebar-offcanvas">
					<div class="list-group" id="sidebar">
						<?php
							foreach($sidebar as &$val){
								echo '<a href="index.php?link_id=' . $val['link_id'] . '" class="list-group-item">'
										. '<div class="row">'
											. '<div class="col-md-5">'
												. '<img src="http://danii.jumper.hu/~mer/img/' . $val['link_id'] . '.png" alt="' . $val['title'] . ' - ' . $val['author'] . '" class="img-responsive"/>'
											. '</div>'
											. '<div class="col-md-7">'
													. '<h4 class="panel-title">' . $val['title'] . '</h4>'
													. '<p>from ' . $val['author'] . '</p>'
											. '</div>'
										. '</div>'
									. '</a>';
							}
						?>
						
						
					</div>
				</div>
			</div>
		</div>
		
					
		
		<script type="text/javascript">
			function setSidebar(q){
				
				console.log(q);
				$.ajax({
					type: 'POST',
					url: '../part/asdf.php',
					data: {
						'query': q
					},
					
					success: function(data){
	
						var sidebarVideoContainer = $("#sidebar");
						
						sidebarVideoContainer.html(data);
					}
				});
			}
		
			var videoContent = new Bubbles.video('videocontent',
				{
					<?php
						$i = 0;			
						foreach($links as &$val){
							echo '"object' . ($i++) . '" :	{'
								. 'type		: "content",'
								. 'effect		: "fade",'
								. 'className	: "rectangle",'
								. 'content		: "<span onclick=\"setSidebar(' . $val['obj_id_to'] . ')\" class=\"bubblelink\" title=\"' . $val['obj_title_to'] . '\">&nbsp;</span>",'
								. 'dimensions	: [ "' . $val['dim_x'] . '%", "' . $val['dim_y'] . '%" ],'
								. 'position	: [ "' . $val['pos_x'] . '%", "' .$val['pos_y']  . '%" ],'
								. 'config		: [ ' . $val['config_x'] . ', ' . $val['config_y'] . ' ]'
								. '},';
						}
					?>					
				}
			);
			
			
		</script>

<?php
	include("../part/footer.php");
?>
