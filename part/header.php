<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />
		
		<title><?php echo $title; ?></title>

		<meta name = "viewport" content = "width = device-width initial-scale = 1.0"/>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/bubbles_styles.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bubbles.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/styles.css" />
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<script type="text/javascript" src="../js/bubbles.js"></script>		
		
	</head>
	<body>
		<!-- a menü-->
		<div class = "navbar navbar-default">
			<div class = "container">
				<a href = "../home" class = "navbar-brand">Budapest nevezetességei videoportál</a>
				<form action="../home/index.php" method="post">
					<div class="input-group navbar-right col-md-7">	
						<input name="obj" id="search" type="text" class="form-control" placeholder="Search..."></input>
						<span class="input-group-btn">
							<button onClick="this.form.submit()" id="search_button" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</span>
					</div>
				</form>
			</div>
		</div>
