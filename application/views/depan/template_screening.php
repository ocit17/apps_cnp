<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo !empty ($title) ? $title : ''; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="description" content="A multipurpose alert, confirm plugin, alternative to the native alert() and confirm() functions. Supports features like auto-close, themes, animations, and more.">
  <link rel="canonical" href="https://craftpip.github.io/jquery-confirm"/>
  <link rel="icon" type="img/png" href="<?php echo base_url()?>assets/depan/images/logolp3i.png">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="robots" content="index,follow,noodp,noydir"/>
  <meta name="google-site-verification" content="T_M_Ym5DQ-cEQQhx_jswyCBTssIdgtewICcvb3sgh8g"/>
  <meta name="Keywords" content="jquery.confirm, jquery confirm, jquery alert, jquery prompt, jquery dialog, javascript, bootstrap"/>    
  <meta property="og:title" content="jquery-confirm.js | The multipurpose alert &amp; confirm"/>
  <meta property="og:type" content="website"/>
  <meta property="og:image" content="http://craftpip.com/i/apple-touch-icon-57x57.png"/>
  <meta property="og:url" content="https://craftpip.github.io/jquery-confirm"/>
  <meta property="og:description" content="A multipurpose alert & confirm plugin, alternative to the native alert() and confirm() functions. Supports features like auto-close, themes, animations, and more."/>
  <meta property="og:site_name" content="craftpip.github.io"/>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/depan/demo/libs/bundled.css">
  <script src="<?php echo base_url()?>assets/depan/demo/libs/bundled.js"></script>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/depan/demo/demo.css">
  <script>
      var version = '3.3.4';
  </script>
  <!-- jquery-confirm files -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/depan/css/jquery-confirm.css"/>
  <script type="text/javascript" src="<?php echo base_url()?>assets/depan/js/jquery-confirm.js"></script>      
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/dist/css/skins/_all-skins.min.css">
  <!-- Toaster -->
  <link href="<?php echo base_url()?>assets/AdminLTE-2.4.12/plugins/toastr/toastr.min.css" rel="stylesheet">
  <!-- Toaster validato jquery-->
  <script type="text/javascript" src="<?php echo base_url()?>assets/AdminLTE-2.4.12/plugins/toastr/toastr.min.js"></script>
  <script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/plugins/toastr/validator.min.js"></script>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/select2/dist/css/select2.min.css">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>SCREENING TES-</b>ONLINE</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">                       
            <li class="dropdown user user-menu">              
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">                
                <img src="<?php echo base_url()?>assets/depan/images/logolp3i.png" class="user-image" alt="User Image">                
                <span class="hidden-xs"><?php echo ! empty($this->session->userdata('nm_dosen')) ? $this->session->userdata('nm_dosen'): ''; ?></span>               
              </a>
              <input id="nm_dosen" type="hidden" value="<?php echo $this->session->nm_dosen;?>"/><input id="nim" type="hidden" value="<?php echo $this->session->nim_mhs;?>"/><input id="kd_jurusan" type="hidden" value="<?php echo $this->session->jurusan;?>"/>             
            </li>
          </ul>
        </div>
      </div>    
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <section class="content-header">
        <h1>
          Screening <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><a href="#">Screening</a></li>
          <?php if(! empty($this->session->userdata('nm_dosen')) ){?> <li><?php echo $this->session->userdata('jurusan');?></li><li><?php echo $this->session->userdata('nama_mhs');?></li> <?php }?>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">       
        <?php echo $contents;?>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
      Screening <b>Online</b> 1.0
      </div>
      <strong>Copyright &copy; 2019 <a href="#">Abdul rosid</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/dist/js/demo.js"></script>
<!-- Page script -->
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.12/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script> 
<script type="text/javascript">
  $(document).ready(function() {  
  
    $("#login_screening").on('submit',(function(e) {
			e.preventDefault();
      var data = new FormData(this);
      var jurusan = $("#login_screening").find("select[name='jurusan']").val();
      var mahasiswa = $("#login_screening").find("select[name='mhs']").val();
      var interviewer = $("#login_screening").find("input[name='nm_dosen']").val();
			if(jurusan !='' && mahasiswa !='' && interviewer !='')
			{
				/*Proses login*/
				$.ajax({
						type : 'POST',
						url: baseurl+'screening',
						dataType: 'json',
						data : data,
            processData: false,
            contentType: false,
						beforeSend: function()
						{	
							$("#error").fadeOut();
							$(".login_screening").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Mengirim ...');
						},
						success : function(response){
						var pesan = response.message;
							if(response.error){
								$("#error").fadeIn(1000, function(){						
									$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+pesan+'</div>');
									$(".login_screening").html('Masuk &nbsp;<i class="fa fa-sign-on text-white"></i>');
								});																		
							}else{
								$(".loading").show();
								$(".login_screening").html(' <i class="fa fa-refresh fa-spin"></i> &nbsp; '+pesan );
								setTimeout(function(){
									window.location = baseurl + 'screening/screeningtes';
								}, 3000);								
							}
						}
				});
				return false;
			}
			else
			{
				if(jurusan == ''){				
          $.confirm({
              title: 'PERHATIKAN !',
              icon: 'fa fa-smile-o',
              content: 'Pilih Jurusan',
              theme: 'modern',
              animation: 'scale',
              type: 'orange',
              buttons: {
                  Okey: {
                      btnClass: 'btn-orange',
                      action: function(){
                        
                      }
                  }
              }
          });
				}else if(mahasiswa == '' || mahasiswa == null){					
          $.confirm({
              title: 'PERHATIKAN !',
              icon: 'fa fa-smile-o',
              content: 'Nama Mahasiswa Tidak Boleh Kosong.',
              theme: 'modern',
              animation: 'scale',
              type: 'orange',
              buttons: {
                  Okey: {
                      btnClass: 'btn-orange',
                      action: function(){
                        
                      }
                  }
              }
          });
				}else if(interviewer == ''){
					toastr.error('Masukan Nama Anda.', 'Perhatian !', 
					{
						positionClass: 'toast-top-left', 
						closeButton: true,
						showMethod: 'show', 
						hideMethod: 'hide',
						timeOut: 3000
					});
				}
			}
    }));
    
    $(function(){
      $("#mhs").select2({
        placeholder: 'Pilih Mahasiswa',
        ajax: { 
          url: baseurl+'screening/get_autocomplete',
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
              return {
                searchTerm: params.term // search term
              };
          },
          processResults: function (response) {
              return {
                results: response
              };
          },
        }
      }).on('select2:select', function (evt){
        var response = $("#mhs option:selected").text();
        //$("#mhs").val(data);
      });
    });

    /* $(function(){
      $('.mhs').select2({
        allowClear: true,
        placeholder: 'Pilih Mahasiswa',
        ajax: {
          url: baseurl+'screening/get_autocomplete',
          dataType: 'json',
          delay: 250,
          data: function(params){
                      return {
                          q: params.term
                      }
                  },
          processResults: function (data, page){
            return {
              results: data
            };
          },
        }
      }).on('select2:select', function (evt){
        var data = $(".mhs option:selected").text();
      });
    }); */

    $('#savechecklist').click(function() {            
      //variable isi field
      var aspek_keahlian;
      aspek_keahlian = getChecklistItemsKeahlian();       
      var aspek_umum;
      aspek_umum = getChecklistItemsUmum();
      var isipumum;
      isipumum = pumum();
      var isipjurusan;
      isipjurusan = pjurusan();
      //variable isi field

      //Radio groups
      var names = []
      $('input:radio').each(function () {
          var rname = $(this).attr('name');
          if ($.inArray(rname, names) == -1) names.push(rname);
      });
      var radioError = false;
      $.each(names, function (i, name) {
          if ($('input[name="' + name + '"]:checked').length == 0) {
              radioError = true;
          }
      });

      //Text groups
      var empty = false;
      $('input[type="text"]').each(function(){
        if($(this).val() ==""){
            empty = true;
            return false;
          }
      });
        
      //check for error
      if(radioError) {
        $.confirm({
            title: 'PERHATIKAN !',
            icon: 'fa fa-smile-o',
            content: 'Anda harus memilih jawaban setiap pertanyaan',
            theme: 'modern',
            animation: 'scale',
            type: 'orange',
            buttons: {
                Okey: {
                    btnClass: 'btn-orange',
                    action: function(){
                    
                    }
                }
            }
        });
      }else if(empty){
        $.confirm({
            title: 'PERHATIKAN !',
            icon: 'fa fa-smile-o',
            content: 'Anda harus mengisi setiap pertanyaan',
            theme: 'modern',
            animation: 'scale',
            type: 'orange',
            buttons: {
                Okey: {
                    btnClass: 'btn-orange',
                    action: function(){
                    
                    }
                }
            }
        });
      }else{
        $.ajax({
          url: baseurl+'screening/simpan_screening',
          type: "POST",
          cache: false,
          data:'aspek_umum=' + aspek_umum + '&aspek_keahlian=' + aspek_keahlian + '&isipumum=' + isipumum + '&isipjurusan=' + isipjurusan,      
          dataType:'json',
          success: function(data){
            if(data.status == 1)
            {
              $.confirm({
                title: 'SELAMAT !',
                icon: 'fa fa-smile-o',
                content: data.pesan,
                theme: 'modern',
                animation: 'scale',
                type: 'blue',
                buttons: {
                    Ok: {
                        btnClass: 'btn-blue',
                        action: function(){
                          window.location.replace(baseurl+"screening/logout");
                        }
                    }
                }
              });
            }
            else 
            {
              $.confirm({
                  title: 'PERHATIKAN !',
                  icon: 'fa fa-smile-o',
                  content: data.pesan,
                  theme: 'modern',
                  animation: 'scale',
                  type: 'orange',
                  buttons: {
                      Okey: {
                          btnClass: 'btn-orange',
                          action: function(){
                          
                          }
                      }
                  }
              });
            }	
          }
        });
      }

    });

    function pumum(){       
      var textInput = $(".pumum").map(function() {
        var kdpu = $(this).closest('tr').attr('data-id');  
        return kdpu + ":" + $( this ).val(); 
      }).get().join(';');           
      return textInput;    
    }  

    function pjurusan(){       
      var textInput = $(".pjurusan").map(function() {
        var kdpj = $(this).closest('tr').attr('data-id');  
        return kdpj + ":" + $( this ).val(); 
      }).get().join(';');           
      return textInput;    
    }  

    function getChecklistItemsKeahlian() {
      var result = $("tr.cek_keahlian > td > input:radio:checked").get();            
      var columns = $.map(result, function(element) {
          return $(element).attr("id");
      });
      return columns.join(";");
    }

    function getChecklistItemsUmum() {
      var result = $("tr.cek_umum > td > input:radio:checked").get();            
      var columns = $.map(result, function(element) {
          return $(element).attr("id");
      });
      return columns.join(";");
    }

  });
</script>
</body>
</html>
