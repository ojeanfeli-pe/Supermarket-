
<html>
    <head>
      <meta charset="utf-8">
      <title>Painel</title>
	  <link href="css/styles.css" rel="stylesheet">
	  <script src="js/jquery-1.11.0.min.js"></script>
	  <script src="js/jquery-migrate-1.2.1.min.js"></script>
      <script type="text/javascript" src="js/slick.min.js"></script>
    </head>
    <body>
		<div class="main">
			<div class="header" style="">
				<div class="logo">
					<img src="images/logo.png" width="200px"/>
				</div>
				<div class="banner">
				</div>
				
			</div>
			<div id="slideshowl">
				<div>
					<div class="content">
					
						<?php
						$arquivo = fopen ('produto.txt', 'r');
						$cont = 0;
						while(!feof($arquivo))
						{
							$linha = fgets($arquivo, 1024);
							$list = explode(";", $linha);
						?>
						
						<div class="product" id="<?php echo $cont; ?>">
							<h1 class="title"><?php echo $list[0]; ?></h1>
							
							<h2 class="price">R$ <?php echo isset($list[1]) ? $list[1] : 0; ?></h2>
						</div>
						<?php
						}
							fclose($arquivo);
						?>
					
					</div>
				</div>
			</div>
			<script>
			var page = 5;
			var pageSize = 12;
			var pageCount =  Math.floor($(".product").length / pageSize);
			//var totalSlidepPage = Math.floor(pageCount / incremSlide);
			
			$(".product").hide();
			 $(".product").each(function(n) {
				 if (n >= pageSize * (page - 1) && n < pageSize * page)
					$(this).show();
			 });
			
			//setInterval(alert(1), 3000);
			setInterval(function() {
				$(".product").hide();
				
				if(page == pageCount + 1){
					page = 1;
					console.log(page);
				}else{
					page = page + 1;
				console.log(page);
				}
				
				$(".product").each(function(n) {
					 if (n >= pageSize * (page - 1) && n < pageSize * page)
						$(this).show();
				});
			  //alert(1);
			}, 5000);
			/*
			$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
  .fadeOut(3000)
  .next()
  .fadeIn(1000)
  .end()
  .appendTo('#slideshow');
}, 3000);*/
			</script>
		</div>
		
    </body>
</html>