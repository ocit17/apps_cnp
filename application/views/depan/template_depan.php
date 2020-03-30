<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
	<title class="title"><?php echo !empty ($title) ? $title : ''; ?></title>
	<link rel="icon" type="image/png" sizes="310x310" href="<?php echo base_url()?>assets/depan/images/logolp3i.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="C&P"/>
	<!--=============================== Default Themes ====================================================-->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/depan/css/bootstrap.css" type="text/css" media="all">
	<!--<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css" media="all">-->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/depan/css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/depan/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/depan/plugins/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/depan/plugins/slick/slick-theme.css">
	<link href="//fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!--===============================================================================================-->
</head>
<body>
	<div class="banner">
		<div class="header-top">
			<div class="container">
				<div class="header-top-right">
					<p><i class="fa fa-users" aria-hidden="true"></i><a href="<?php echo base_url()?>pencarikerja">Pencari Kerja</a>
					&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>pencarikandidat"><i class="fa fa-building-o" aria-hidden="true"></i> Pencari Kandidat</a></p>
				</div>
			</div>
		</div>
		<div class="head">
			<div class="container">
				<div class="navbar-top">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand logo">
							<h1 class="animated wow pulse" data-wow-delay=".5s">
							<a href="<?php echo base_url()?>"><b>P</b>&K<span> Penempatan & Kerjasama LP3I Cileungsi</span></a></h1>
						</div>
					</div>					
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav link-effect-4">
						<?php
							$mainmain = $this->db->get_where('fmenu', array('parent_id' => null));
							foreach ($mainmain->result() as $main2) {
							echo "<li>".anchor($main2->link, $main2->nama_menu);
							$main_menu = $this->db->get_where('fmenu', array('parent_id' => 0));
							foreach ($main_menu->result() as $main) {						
							$sub_menu = $this->db->get_where('fmenu', array('parent_id' => $main->id));							
								if ($sub_menu->num_rows() > 0) {								
									echo "<li class='dropdown'>".anchor($main->link,$main->nama_menu.'<b class="caret">
									</b>',array('class'=>'dropdown-toggle', 'data-hover'=>'Pages','data-toggle'=>'dropdown'));								
								echo "<ul class='dropdown-menu'>";
								foreach ($sub_menu->result() as $sub) {
								   echo "<li>".anchor($sub->link,$sub->nama_menu);
								}
									echo"</ul></li>";
								} else {									
									echo "<li>".anchor($main->link,$main->nama_menu,
									array('data-hover'=>'Contact'));
								}
							}
						}
						?>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>	
			</div>
		</div>	
		<?php echo $contents;?>
		<div class="copyright">
			<div class="container">		
				<div class="copyrightbottom">
					<p>Hak Cipta &copy Penempatan & Kerjasama Politeknik LP3I Cileungsi <?php echo date("Y");?></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

	<!--==================================== Default Themes ===========================================-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/depan/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/depan/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/depan/js/bootstrap.min.js"></script>	
	<script src="<?php echo base_url();?>assets/depan/plugins/slick/slick.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url()?>assets/depan/js/jquery.wmuSlider.js"></script> 
	<script src="<?php echo base_url()?>assets/depan/js/jarallax.js"></script>
	<script src="<?php echo base_url()?>assets/depan/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/depan/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/depan/js/easing.js"></script>
	<!--===============================================================================================-->
	
	<script type="text/javascript">
		$(document).ready(function () {
			var url = window.location;
			$('ul.nav a[href="'+ url +'"]').parent().addClass('active');
			$('ul.nav a').filter(function() {
				 return this.href == url;
			}).parent().addClass('active');
			
			$('.example1').wmuSlider();  
			
			$('.jarallax').jarallax({
				speed: 0.5,
				imgWidth: 1366,
				imgHeight: 768
			});
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			$('.carousel').carousel({
			  interval: 1000 * 10
			});
			$('.autoplay').slick({
				dots: true,
				slidesToShow: 4,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
				prevArrow:"<img class='a-left control-c prev slick-prev' src='<?php echo base_url()?>assets/depan/images/kiri.png'>",
				nextArrow:"<img class='a-right control-c next slick-next' src='<?php echo base_url()?>assets/depan/images/kanan.png'>"
			});
			$(".lazy").slick({
				dots: true,
				infinite: true,
				speed: 500,
				autoplay: true,
				autoplaySpeed: 2000,
				fade: true,
				cssEase: 'linear',
				prevArrow:"<img class='a-left control-c prev slick-prev' src='<?php echo base_url()?>assets/depan/images/kiri.png'>",
				nextArrow:"<img class='a-right control-c next slick-next' src='<?php echo base_url()?>assets/depan/images/kanan.png'>"
			});
			
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
			
		});
	</script>
	
</body>
</html>