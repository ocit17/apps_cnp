<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	<title class="title"><?php echo (!empty($judul)) ? $judul : ''; ?></title>
	<link rel="icon" type="image/png" sizes="310x310" href="<?php echo base_url()?>assets/depan/images/logolp3i.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="C&P"/>
	<!--=============================== Default Themes ====================================================-->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/depan/css/bootstrap.css" type="text/css" media="all">
	<!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css" media="all"> -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/depan/css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/depan/css/font-awesome.min.css" />	
	<link href="//fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!--===============================================================================================-->
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/depan/plugins/Ionicons/css/ionicons.min.css">
	<link href="<?php echo base_url()?>assets/depan/plugins/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
	<!--=============================== Registari form ====================================================-->		
    <!-- Toaster -->
  	<link href="<?php echo base_url()?>assets/depan/plugins/toastr/toastr.min.css" rel="stylesheet">
	<!-- Date Picker -->
  	<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!--===================================================================================================-->


	
</head>
<body>
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
						// Query untuk mencari data sub menu
						$sub_menu = $this->db->get_where('fmenu', array('parent_id' => $main->id));
						// periksa apakah ada sub menu
							if ($sub_menu->num_rows() > 0) {
							// main menu dengan sub menu
								echo "<li class='dropdown'>".anchor($main->link,$main->nama_menu.'<b class="caret">
								</b>',array('class'=>'dropdown-toggle', 'data-hover'=>'Pages','data-toggle'=>'dropdown'));
							// sub menu nya disini
							echo "<ul class='dropdown-menu'>";
							foreach ($sub_menu->result() as $sub) {
							   echo "<li>".anchor($sub->link,$sub->nama_menu);
							}
								echo"</ul></li>";
							} else {
								// main menu tanpa sub menu
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
	<!-- copyright -->
	<div class="copyright">
		<div class="container">		
			<div class="copyrightbottom">
				<p>Hak Cipta &copy Penempatan & Kerjasama Politeknik LP3I Cileungsi <?php echo date("Y");?></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //copyright -->
	
	<!--==================================== Default Themes ===========================================-->
	<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/depan/js/jquery-2.1.4.min.js"></script> -->
	
	<script src="<?php echo base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url()?>assets/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>	
	<script type="text/javascript" src="<?php echo base_url();?>assets/depan/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/depan/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/depan/js/jarallax.js"></script>
	<script src="<?php echo base_url();?>assets/depan/js/jquery.picEyes.js"></script>
	<script src="<?php echo base_url();?>assets/depan/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/depan/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/depan/js/easing.js"></script>
	<!--buat gambar -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/depan/js/bootstrap-filestyle.min.js"></script>
	<!--===============================================================================================-->
	
	<!--=============================== Registari form ====================================================-->       
    <!-- Toaster validato jquery-->
	<!--<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/toastr/jquery/1/jquery.min.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/depan/plugins/toastr/toastr.min.js"></script>
	<!--<script src="<?php echo base_url()?>assets/plugins/toastr/jquery.js"></script>-->
	<script src="<?php echo base_url()?>assets/depan/plugins/toastr/validator.min.js"></script>
	<!--===================================================================================================-->

	<!--=============================== cnp js ====================================================-->     
	<script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>  
   	<script src="<?php echo base_url()?>assets/depan/cnp/pencaker/pencaker.js"></script>
	   <script src="<?php echo base_url()?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!--===================================================================================================-->

	
	
	<script type="text/javascript">
		$(document).ready(function () {
			var url = window.location;
			$('ul.nav a[href="'+ url +'"]').parent().addClass('active');
			$('ul.nav a').filter(function() {
				 return this.href == url;
			}).parent().addClass('active');
			
			$('.jarallax').jarallax({
				speed: 0.5,
				imgWidth: 1366,
				imgHeight: 768
			});
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});			
		});
	</script>
	
</body>
</html>