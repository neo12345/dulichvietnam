	<html>
        <head>
			<meta charset="utf-8">
			<title>Du lịch Việt Nam</title>
			
		<script src="http://localhost/dulichvietnam/assets/jquery/jquery-1.12.3.min.js"></script>
		<script src="http://localhost/dulichvietnam/assets/bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="http://localhost/dulichvietnam/assets/bootstrap/css/bootstrap.min.css">
		<script src="http://localhost/dulichvietnam/assets/tinymce/js/tinymce/tinymce.min.js"></script>
		
		<script type="text/javascript">
			  tinymce.init({
				selector: 'textarea',
    			width: 800,
    			height: 300,
				plugins: [
				  'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
				  'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
				  'save table contextmenu directionality emoticons template paste textcolor'
				],
				language_url : 'http://localhost/dulichvietnam/assets/tinymce/js/tinymce/langs/vi_VN.js'
			  });
		</script>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		</head>
		
        <body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=255471407837749";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
					
		<div class="container-fluid">
 			<div class="row">
				<div class="col-lg-12 .col-md-12 .col-xs-12">
					<div align = "center">
						<a href="<?php echo base_url();?>"><img class="img-responsive" src="<?php echo base_url('images/bn.jpg'); ?>"/></a><br/>
					</div>
				</div>
			</div>
					<nav class="navbar navbar-default">
					  <div class="container-fluid">
					  	<nav class="nav navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>                        
							 </button>
						 </nav>
						 <div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav">
							  <li class="active"><a href="<?php echo base_url();?>">Trang chủ</a></li>
							  <li><a href="<?php echo base_url('index.php/news/index');?>">Tin tức du lịch</a></li>
							  <li><a href="<?php echo base_url('index.php/posts/index');?>">Bài viết du lịch</a></li> 
							  <li><a href="<?php echo base_url('index.php/places/index');?>">Địa điểm du lịch</a></li> 
							  <li><a href="<?php echo base_url('index.php/tours/index');?>">Tour du lịch</a></li>						  
							</ul>
							
							<ul class="nav navbar-nav navbar-right">
							  <li>
							    <div class="form-inline">
								  <?php
									 echo form_open('search/index'); ?>
										<label for="search">Tìm kiếm </label>
										<input class="form-control" type="input" name="key" /> 
										<button type="submit" class="btn btn-default">Tìm</button>
									</form>
								</div>	
							  </li>
							</ul>
						  </div>
					  </div>
					</nav>
		</div> 