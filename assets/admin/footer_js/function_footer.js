$(document).ready(function() {
		// browser window scroll (in pixels) after which the "back to top" link is shown
		var offset = 300,
			//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
			offset_opacity = 1200,
			//duration of the top scrolling animation (in ms)
			scroll_top_duration = 700,
			//grab the "back to top" link
			$back_to_top = $('.cd-top');

		//hide or show the "back to top" link
		$(window).scroll(function(){
			( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
			if( $(this).scrollTop() > offset_opacity ) { 
				$back_to_top.addClass('cd-fade-out');
			}
		});

		//smooth scroll to top
		$back_to_top.on('click', function(event){
			event.preventDefault();
			$('body,html').animate({
				scrollTop: 0 ,
				}, scroll_top_duration
			);
		});
		
		$.widget.bridge('uibutton', $.ui.button);
		
		$('input.nilaiuts').on('blur',function(x){
			//alert($(this).val());
			var form_data = new FormData();
			form_data.append('th', $(this).parent().find('#thn').val());
			form_data.append('tk', $(this).parent().find('#infotk').val());
			form_data.append('siswa', $(this).parent().find('#infosiswa').val());
			form_data.append('kelas', $(this).parent().find('#infokelas').val());
			form_data.append('nilaiuts', $(this).val());
			form_data.append('mapel', $(this).parent().find('#infomapel').val());
			form_data.append('cu', $(this).parent().find('#infosesi').val());
			form_data.append('kkm',$(this).parent().parent().parent().parent().parent().parent().find('#kkm').val());
			//alert('yy');
			$.ajax({
				url: 'http://localhost:/uassdit/ajax/savenilaiuts.php', // point to server-side controller method
				dataType: 'text', // what to expect back from the server
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(e) {
					//alert(e);
					//x.preventDefault();
				}
			});
		});
		$('select.nilaiuas').change(function(x){
			//alert($(this).val());
			var form_data = new FormData();
			form_data.append('th', $(this).parent().find('#thn').val());
			form_data.append('tk', $(this).parent().find('#infotk').val());
			form_data.append('siswa', $(this).parent().find('#infosiswa').val());
			form_data.append('kelas', $(this).parent().find('#infokelas').val());
			form_data.append('nilaiuas', $(this).val());
			form_data.append('mapel', $(this).parent().find('#infomapel').val());
			form_data.append('cu', $(this).parent().find('#infosesi').val());
			form_data.append('khusus',$(this).parent().find('#khusus').val());
			//form_data.append('kkm',$(this).parent().parent().parent().parent().parent().parent().find('#kkm').val());
			//alert('yy');
			$.ajax({
				url: 'http://localhost:/uassdit/ajax/savenilaiuas.php', // point to server-side controller method
				dataType: 'text', // what to expect back from the server
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(e) {
					//alert(e);
					//x.preventDefault();
				}
			});
		});
		$('.tambahpelajaran').click(function(){
			$(this).parent().find('.tambahpelajaran').css({"display":"none"});
			$(this).parent().find('#tambahhafalan').css({"display":"block"});
			$(this).parent().find('#simpanpelajaran').css({"display":"block"});
		});
		$('.savepelajaran').click(function(){
			var form_data = new FormData();
			form_data.append('kategori', $(this).parent().find('#kathidden').val());
			form_data.append('mapelhafalan', $(this).parent().find('#tambahhafalan').val());
			form_data.append('tk', $(this).parent().find('#tkhidden').val());
			$.ajax({
				url: 'http://localhost:/uassdit/ajax/savemapelhafalan.php', // point to server-side controller method
				dataType: 'text', // what to expect back from the server
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(e) {
					window.location = 'http://localhost:/uassdit/home.php?control=nilai&act=inputnilai_uts';
				}
			});
		});
		$('.tambahnarasi').click(function(){
			$(this).parent().find('#narasis').css({"display":"block"});
			$(this).parent().find('#narasid').css({"display":"block"});
			$(this).parent().find('#narasit').css({"display":"block"});
			$(this).parent().find('#narasie').css({"display":"block"});
			$(this).parent().find('.simpannarasi').css({"display":"block"});
			$(this).css({"display":"none"});
		});
		$('.simpannarasi').click(function(){
			var form_data = new FormData();
			form_data.append('narasi1', $(this).parent().find('#narasis').val());
			form_data.append('narasi2', $(this).parent().find('#narasid').val());
			form_data.append('narasi3', $(this).parent().find('#narasit').val());
			form_data.append('narasi4', $(this).parent().find('#narasie').val());
			form_data.append('tingkat', $(this).parent().find('#nrstk').val());
			form_data.append('kelas', $(this).parent().find('#nrskls').val());
			form_data.append('mapel', $(this).parent().find('#nrspel').val());
			form_data.append('sesi', $(this).parent().find('#nrssesi').val());
			//alert('siap');
			$.ajax({
				url: 'http://localhost:/uassdit/ajax/savenarasi.php', // point to server-side controller method
				dataType: 'text', // what to expect back from the server
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(e) {
					//alert(e);
					window.location = 'http://localhost:/uassdit/home.php?control=nilai&act=inputnilai_uts';
				}
			});
		});
		$('.tambahguruuas').click(function(){
			$(this).parent().find('#kelas').css({"display":"block"});
			$(this).parent().find('#guruuas').css({"display":"block"});
			$(this).parent().find('#semesteruas').css({"display":"block"});
			$(this).parent().find('#tauas').css({"display":"block"});
			$(this).parent().find('.simpanguruuas').css({"display":"block"});
			$(this).css({"display":"none"});
			
			
		});
		$('.simpanguruuas').click(function(){
			var form_data = new FormData();
			form_data.append('guru', $(this).parent().find('#guruuas').val());
			form_data.append('semester', $(this).parent().find('#semesteruas').val());
			form_data.append('tahunajaran', $(this).parent().find('#tauas').val());
			form_data.append('kelas', $(this).parent().find('#klsuas').val());
			form_data.append('tk', $(this).parent().find('#tkuas').val());
			form_data.append('kategori', $(this).parent().find('#ktguas').val());
			$.ajax({
				url: 'http://localhost:/uassdit/ajax/saveguruuas.php', // point to server-side controller method
				dataType: 'text', // what to expect back from the server
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(e) {
					alert(e);
					window.location = 'http://localhost:/uassdit/home.php?control=nilai&act=inputnilai_uas';
				}
			});
		});
		$('.tambahmapeluas').click(function(){
			$(this).parent().find('#tambahkomponenmapel').css({"display":"block"});
			$(this).parent().find('.savemapeluas').css({"display":"block"});
			$(this).css({"display":"none"});
		});
		$('.savemapeluas').click(function(){
			var form_data = new FormData();
			form_data.append('kategori', $(this).parent().find('#katuashidden').val());
			form_data.append('tingkat', $(this).parent().find('#tkuashidden').val());
			form_data.append('mapel', $(this).parent().find('#tambahkomponenmapel').val());
			$.ajax({
				url: 'http://localhost:/uassdit/ajax/savepelajaranuas.php', // point to server-side controller method
				dataType: 'text', // what to expect back from the server
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(e) {
					//alert(e);
					window.location = 'http://localhost:/uassdit/home.php?control=nilai&act=inputnilai_uas';
				}
			});
		});
		$('.tambahnarasiuas').click(function(){
			$(this).parent().find('#narasis').css({"display":"block"});
			$(this).parent().find('#narasid').css({"display":"block"});
			$(this).parent().find('#narasit').css({"display":"block"});
			$(this).parent().find('#narasie').css({"display":"block"});
			$(this).parent().find('#narasil').css({"display":"block"});
			$(this).parent().find('.simpannarasiuas').css({"display":"block"});
			$(this).css({"display":"none"});
		});
		$('.simpannarasiuas').click(function(){
			var form_data = new FormData();
			form_data.append('narasi1', $(this).parent().find('#narasis').val());
			form_data.append('narasi2', $(this).parent().find('#narasid').val());
			form_data.append('narasi3', $(this).parent().find('#narasit').val());
			form_data.append('narasi4', $(this).parent().find('#narasie').val());
			form_data.append('narasi5', $(this).parent().find('#narasil').val());
			form_data.append('tingkat', $(this).parent().find('#nrstk').val());
			form_data.append('kelas', $(this).parent().find('#nrskls').val());
			form_data.append('mapel', $(this).parent().find('#nrspel').val());
			form_data.append('sesi', $(this).parent().find('#nrssesi').val());
			//alert('siap');
			$.ajax({
				url: 'http://localhost:/uassdit/ajax/savenarasiuas.php', // point to server-side controller method
				dataType: 'text', // what to expect back from the server
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(e) {
					//alert(e);
					window.location = 'http://localhost:/uassdit/home.php?control=nilai&act=inputnilai_uas';
				}
			});
		});
		$('textarea#catatan').on('blur',function(x){
			var form_data = new FormData();
			//alert('tes');
			form_data.append('tingkat', $(this).parent().find('#ctttk').val());
			form_data.append('siswa', $(this).parent().find('#cttidsiswa').val());
			form_data.append('kelas', $(this).parent().find('#cttkelas').val());
			form_data.append('nilai', $(this).parent().find('#catatan').val());
			form_data.append('sesi', $(this).parent().find('.sesi').val());
			$.ajax({
				url: 'http://localhost:/uassdit/ajax/savecatatanuas.php', // point to server-side controller method
				dataType: 'text', // what to expect back from the server
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(e) {
					//alert(e);
					//window.location = 'http://localhost/raport/home.php?control=nilai&act=inputnilai_uas';
				}
			});
		});

		$('#showonline').click(function(){
			if ($(this).prop('checked')) {
				var action = $.confirm({
					title: 'Are you sure!',
					content: 'To turn on your status offline!',
					theme: 'supervan' ,
					buttons: {
						YEs: {
							btnClass: 'btn-blue',
							action: function(){
								/* $.alert('Status switch on!'); */
							}
						},
						No: {
							btnClass: 'btn-red',
							action: function () {
								$(':checkbox').prop('checked', false).removeAttr('checked');
							}
						}
						
					}
				});
			}
			else 
			{
				var action = $.confirm({
					title: 'Are you sure!',
					content: 'To turn off your status online!',
					theme: 'supervan',
					buttons: {
						YES: {
							btnClass: 'btn-blue',
							action: function(){
								$(':checkbox').prop('checked', false).removeAttr('checked');
							}
						},
						NO: {
							btnClass: 'btn-red',
							action: function () {
								$(':checkbox').prop('checked', true).attr('checked', 'checked');
							}
						}
						
					}
				});
			}
		});
		
		$(".success").click(function(){
		toastr.success('We do have the Kapua suite available.', 'Success Alert', {timeOut: 5000})
		});

		$(".error").click(function(){
			toastr.error('You Got Error', 'Inconceivable!', {timeOut: 5000})
		});

		$(".info").click(function(){
			toastr.info('It is for your kind information', 'Information', {timeOut: 5000})
		});

		$(".warning").click(function(){
			toastr.warning('It is for your kind warning', 'Warning', {timeOut: 5000})
		});
		
		/* window.onload = function () {
			if (typeof history.pushState === "function") {
				history.pushState("jibberish", null, null);
				window.onpopstate = function () {
					history.pushState('newjibberish', null, null);
					// Handle the back (or forward) buttons here
					// Will NOT handle refresh, use onbeforeunload for this.
				};
			}
			else {
				var ignoreHashChange = true;
				window.onhashchange = function () {
					if (!ignoreHashChange) {
						ignoreHashChange = true;
						window.location.hash = Math.random();
						// Detect and redirect change here
						// Works in older FF and IE9
						// * it does mess with your hash symbol (anchor?) pound sign
						// delimiter on the end of the URL
					}
					else {
						ignoreHashChange = false;   
					}
				};
			}
		} */
		
		//Initialize Select2 Elements
		$('.select2').select2()

		//Datemask dd/mm/yyyy
		$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
		//Datemask2 mm/dd/yyyy
		$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
		//Money Euro
		$('[data-mask]').inputmask()

		//Date range picker
		$('#reservation').daterangepicker()
		//Date range picker with time picker
		$('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
		//Date range as a button
		$('#daterange-btn').daterangepicker(
		  {
			ranges   : {
			  'Today'       : [moment(), moment()],
			  'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			  'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
			  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			  'This Month'  : [moment().startOf('month'), moment().endOf('month')],
			  'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			startDate: moment().subtract(29, 'days'),
			endDate  : moment()
		  },
		  function (start, end) {
			$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
		  }
		)

		//Date picker
		$('#datepicker').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		})
		
		$('#datepicker2').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		})

		//iCheck for checkbox and radio inputs
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		  checkboxClass: 'icheckbox_minimal-blue',
		  radioClass   : 'iradio_minimal-blue'
		})
		//Red color scheme for iCheck
		$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
		  checkboxClass: 'icheckbox_minimal-red',
		  radioClass   : 'iradio_minimal-red'
		})
		//Flat red color scheme for iCheck
		$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		  checkboxClass: 'icheckbox_flat-green',
		  radioClass   : 'iradio_flat-green'
		})

		//Colorpicker
		$('.my-colorpicker1').colorpicker()
		//color picker with addon
		$('.my-colorpicker2').colorpicker()

		//Timepicker
		$('.timepicker').timepicker({
		  showInputs: false
		})
		
		$('#example1').DataTable()
			
		$(document).ajaxStart(function () {
			Pace.restart()
		})
		
		$('.ajax').click(function () {
			$.ajax({
			  url: '#', success: function (result) {
				$('.ajax-content').html('<hr>Ajax Request Completed !')
			  }
			})
		})
		
});
	