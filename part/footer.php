		<div class="footer-wrapper transparent-80">
			<!--nav class="navbar navbar-default navbar-static-bottom" role="navigation"></nav-->
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div class="menu-item">
								<a href = "../tour"><p>Tour</p></a>
							</div>
						</div>
						<div class="col-md-offset-1 col-md-2">
							<div class="menu-item">
								<a href = "../home"><p>Home</p></a>
							</div>
						</div>
						<div class="col-md-offset-1 col-md-2">
							<div class="menu-item">
								<a href = "../about"><p>About</p></a>
							</div>
						</div>
						<div class="col-md-offset-1 col-md-2">
							<div class="menu-item">
								<a href = "#"><p>Share</p></a>
							</div>
							<div>
								<a href = "http://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://152.66.244.83/mer&p[images][0]=http://152.66.244.83/mer/img/bp-bg2.jpg&p[title]=Budapest%20nevezetességei%20videoportál&p[summary]=" target="_blank"><p>facebook</p></a>
								
								<a href = "https://twitter.com/intent/tweet?via=gabor_dobrei&source=tweetbutton&original_referer=http://152.66.244.83/mer&text=Budapest%20nevezetességei%20videoportál&url=http://152.66.244.83/mer" target="_blank"><p>twitter</p></a>
								<!-- http://twitter.com/home?status=Budapest%20nevezetességei%20videoportál%20via%20@gabor_dobrei -->
								
							</div>
						</div>
					</div>
					
				</div>
			
		</div>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.js"></script>
		<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script type="text/javascript">
			
		    <?php if(!empty($elso['start_time']))
		    	echo 'videocontent.addEventListener("loadedmetadata", function () {'
		    		. 'videoContent.jump(' . $elso['start_time'] . ');'
				. '}, false);'; ?>
			
			$(function() {
				$("[data-toggle='tooltip']").tooltip();
				var availableTags = [
					"Parlament",
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
					"Déli pályaudvar"
				];
				$( "#search" ).autocomplete({
					source: availableTags
				});
				
				$( "#search_button" ).click(function(){
					// Ami a search-ben van, azt használjuk
					var q = $("#search").val();
		
					
	
				});
			});
	</script>
	</body>
</html>
