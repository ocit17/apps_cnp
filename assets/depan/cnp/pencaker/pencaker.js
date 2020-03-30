$(document).ready(function () {

	/*$('#foto').filestyle({
		text : 'Upload Foto',
		badge: true,
		btnClass : 'btn btn-primary',
		htmlIcon : '<span class="fa fa-folder"></span>'
	});*/

	/* Untuk validasi gambar */
	var foto = document.getElementById('foto');
    foto.onchange = function(e){
		var file_size = this.files[0].size;
        var file = this.files[0];
		var imagefile = file.type;
		var match= ['image/jpeg','image/png','image/jpg'];
		$in=$(this);
		if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
		{
			toastr.error('Foto Harus Format jpg', 'Error '+($in.val()), 
			{
				positionClass: 'toast-top-left', 
				closeButton: true,
				showMethod: 'show', 
				hideMethod: 'hide',
				timeOut: 6000
			});
			$("#daftar").find("input[name='foto']").val('');
			$('#previewing').attr('src',baseurl+'assets/depan/images/nologo.png');
			$('#previewing').attr('width', '100px');
			$('#previewing').attr('height', '150px');
			// 2 kb = 219430
			// 1 mb = 1097152
		}else if(file_size>1097152) {
			toastr.error('Ukuran Foto Lebih Dari 1mb', 'Error ', 
			{
				positionClass: 'toast-top-left', 
				closeButton: true,
				showMethod: 'show', 
				hideMethod: 'hide',
				timeOut: 6000
			});
			$("#daftar").find("input[name='foto']").val('');
			$('#previewing').attr('src',baseurl+'assets/depan/images/nologo.png');
			$('#previewing').attr('width', '250px');
			$('#previewing').attr('height', '150px');
		}else{
			var reader = new FileReader();
			reader.onload = imageIsLoaded;
			reader.readAsDataURL(this.files[0]);
		}
	};
	
	function imageIsLoaded(e) {
		$('#image_preview').css("display", "block");
		$('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', '250px');
		$('#previewing').attr('height', '230px');
	};

	/* Untuk validasi cv */
	var cv = document.getElementById('cv');
    cv.onchange = function(e){
		/*var allowedFiles = [".doc", ".docx", ".pdf"];*/
		var allowedFiles = [".pdf"];
		var fileUpload = $("#cv");
		var file_size = this.files[0].size;
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        if (!regex.test(fileUpload.val().toLowerCase())) {
			toastr.error('File Harus Format '+ allowedFiles.join(', ') + '', 'Error ', 
			{
				positionClass: 'toast-top-left', 
				closeButton: true,
				showMethod: 'show', 
				hideMethod: 'hide',
				timeOut: 6000
			});
			$("#form_daftar").find("input[name='cv']").val('');
		}

		if(file_size>1097152) {
			toastr.error('Ukuran File Lebih Dari 1mb', 'Error ', 
			{
				positionClass: 'toast-top-left', 
				closeButton: true,
				showMethod: 'show', 
				hideMethod: 'hide',
				timeOut: 6000
			});
			$("#form_daftar").find("input[name='cv']").val('');
		}
	};

	$('.prodi').change(function(){
		var id=$(this).val();
		$.ajax({
			url		: baseurl+"pencarikerja/jurusan",
			method : "POST",
			data : {id: id},
			async : false,
	        dataType : 'json',
			success: function(data){
				var html = '';
	            var i;
	            for(i=0; i<data.length; i++){
	                html += '<option value="'+data[i].kd_jurusan+'">'+data[i].nm_jurusan+'</option>';
	            }
	            $('.jurusan').html(html);
				
			}
		});
	});

	$("#form_daftar, .nama_lengkap, .email, .password, .konfirm, select, .file_pendukung, .cv, .telp").prop( "disabled", true );

	$(document).on('blur', '.nim', function()
    {
		var nim = $("#daftar").find("input[name='nim']").val();
		if(nim == '' || nim == null){
			return false;
		}else{
			$.ajax({
				url		: baseurl+"pencarikerja/ceknim",
				method	:"POST",  
				data	:{nim:nim}, 
				async : false,
				dataType : 'json',
				success:function(data){
					if(data==2){
						$.ajax({
							url		: baseurl+"pencarikerja/getnama",
							method	:"POST",  
							data	:{nim:nim}, 
							async : false,
							dataType : 'json',
							success:function(data){								
								$.each(data,function(nim, nama){						
									$("#form_daftar, .email, .password, .konfirm, select, .cv, .telp").prop( "disabled", false );
									$('[name="nama_lengkap"]').val(data.nama);	
									$('[name="nama_mhs"]').val(data.nama);									
								});	
								toastr.info('Pengguna terdaftar', 'Selamat',
								{
									showMethod: 'show', 
									closeButton: true,
									hideMethod: 'hide',
									timeOut: 3000
								});
							}
						})
					}else if(data==1){
						toastr.warning('NIM Pengguna Tidak Terdaftar !', 'Maaf', 
						{
							positionClass: 'toast-bottom-left', 
							closeButton: true,
							showMethod: 'show', 
							hideMethod: 'hide',
							timeOut: 3000
						});
						$("#form_daftar")[0].reset();
						$("#form_daftar div").removeClass("error");
						$("#form_daftar label").removeClass("error");
					}										
				}
			}) 	
		}		
	});
	
	$("#thlulus").datepicker({
		format: "yyyy",
		viewMode: "years", 
		minViewMode: "years"
	});

	$('#datepicker').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true
	})

   	$(document).on('blur', '.telp', function()
   	{
		var no_telp = $("#daftar").find("input[name='telp']").val();
		var number = /^[0-9]+$/;

		if (no_telp==null || no_telp=="") {
			toastr.warning('Nomor telpon tidak boleh kosong !', 'Peringatan', 
			{
				positionClass: 'toast-bottom-left', 
				closeButton: true,
				showMethod: 'show', 
				hideMethod: 'hide',
				timeOut: 3000
			});
		}
		if (!no_telp.match(number)) {
			toastr.warning('hanya bisa memasukan nomer bukan character !', 'Peringatan', 
			{
				positionClass: 'toast-bottom-left', 
				closeButton: true,
				showMethod: 'show', 
				hideMethod: 'hide',
				timeOut: 3000
			});
			$("#daftar").find("input[name='telp']").val('');
		}
	});
   	
   	$(document).on('blur', '.password', function()
    {
		var number = /([0-9])/;
		var alphabets = /([a-zA-Z])/;
		var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;	
		if($('#password').val().length<6) {
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('Password Lemah');
			$('#password-strength-status').html("Lemah (Password Minimal 6 Karakter)");
		} else {  	
			if($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {            
				$('#password-strength-status').removeClass();
				$('#password-strength-status').addClass('Password Kuat');
				$('#password-strength-status').html("Password Kuat");
			} else {
				$('#password-strength-status').removeClass();
				$('#password-strength-status').addClass('Password Sedang');
				$('#password-strength-status').html("Sedang (Password Terdiri dari Alphabets, Numbers, dan Special Characters)");
			} 
		}
	});

	$(document).on('blur', '.konfirm', function()
    {
		var password = $("#password").val();
        var confirmPassword = $("#konfirm").val();
        if (password != confirmPassword) {
            toastr.warning('Password tidak sesuai !', 'Maaf', 
			{
				positionClass: 'toast-bottom-left', 
				closeButton: true,
				showMethod: 'show', 
				hideMethod: 'hide',
				timeOut: 3000
			});
            return false;
        }
        else if(password == confirmPassword){        	
        	return true;
        }
	});

	$("#form_daftar").on('submit',(function(e) {
		e.preventDefault();
		var data = new FormData(this);
		var foto = $("#form_daftar").find("input[name='foto']").val();
		var nim = $("#form_daftar").find("input[name='nim']").val();
		var nm_depan = $("#form_daftar").find("input[name='nama_mhs']").val();
		var email = $("#form_daftar").find("input[name='email']").val();
		var sandi = $("#form_daftar").find("input[name='password']").val();
		var jurusan = $("#form_daftar").find("select[name='jurusan']").val();
		var cv = $("#form_daftar").find("input[name='cv']").val();
		var file_pendukung = $("#form_daftar").find("input[name='file_pendukung']").val();
		var telp = $("#form_daftar").find("input[name='telp']").val();

		if(foto !='' && nim !='' && nm_depan !=''  && email !='' && sandi !='' && jurusan !='' && cv !='' && file_pendukung !='' && telp !=''){
			$.ajax({
				/* dataType: 'json',
				type:'POST',
				url	: baseurl+"pencarikerja/daftar",
				data: data */
				url	: baseurl+"pencarikerja/proses_daftar",
				type: "POST",
				data:  data,
				contentType: false,
				cache: false,
				processData:false,
			}).done(function(data){	
				if($.isEmptyObject(data.error)){
                	toastr.success('Telah tersimpan.', 'Data '+nm_depan,
					{
						showMethod: 'show', 
						closeButton: true,
						hideMethod: 'hide',
						timeOut: 3000
					});
					$("#form_daftar")[0].reset();
					$("#form_daftar div").removeClass("error");
					$("#form_daftar label").removeClass("error");
					$('#previewing').attr('src',baseurl+'assets/depan/images/nologo.png');
					$('#previewing').attr('width', '100px');
					$('#previewing').attr('height', '150px');
					$("#form_daftar, .nama_lengkap, .email, .password, .konfirm, select, .cv, .telp").prop( "disabled", true );
					$("#form_daftar").find("select[name='jurusan']").val('');
              	}else{
              		toastr.error(data.error, 'Error !', 
					{
						positionClass: 'toast-bottom-left', 
						closeButton: true,
						showMethod: 'show', 
						hideMethod: 'hide',
						timeOut: 3000
					});                	
	              }						
			});
		}else{
			toastr.error('Form Tidak Valid.', 'Error !', 
			{
				positionClass: 'toast-bottom-left', 
				closeButton: true,
				showMethod: 'show', 
				hideMethod: 'hide',
				timeOut: 3000
			});			
		}
	}));

});