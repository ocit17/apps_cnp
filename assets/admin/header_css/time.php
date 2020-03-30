<?php
	date_default_timezone_set('Asia/Jakarta');
	$hari=date('w');
	$tgl =date('d');
	$bln =date('m');
	$thn =date('Y');
	switch($hari){      
		case 0 : {
					$hari='Minggu';
				}break;
		case 1 : {
					$hari='Senin';
				}break;
		case 2 : {
					$hari='Selasa';
				}break;
		case 3 : {
					$hari='Rabu';
				}break;
		case 4 : {
					$hari='Kamis';
				}break;
		case 5 : {
					$hari="Jum'at";
				}break;
		case 6 : {
					$hari='Sabtu';
				}break;
		default: {
					$hari='UnKnown';
				}break;
	}
	 
	switch($bln){       
		case 1 : {
					$bln='Januari';
				}break;
		case 2 : {
					$bln='Februari';
				}break;
		case 3 : {
					$bln='Maret';
				}break;
		case 4 : {
					$bln='April';
				}break;
		case 5 : {
					$bln='Mei';
				}break;
		case 6 : {
					$bln="Juni";
				}break;
		case 7 : {
					$bln='Juli';
				}break;
		case 8 : {
					$bln='Agustus';
				}break;
		case 9 : {
					$bln='September';
				}break;
		case 10 : {
					$bln='Oktober';
				}break;     
		case 11 : {
					$bln='November';
				}break;
		case 12 : {
					$bln='Desember';
				}break;
		default: {
					$bln='UnKnown';
				}break;
	}
$sekarang= $hari.", ".$tgl." ".$bln." ".$thn.",";
echo $sekarang;
?>
<script type="text/javascript">
  var detik = <?php echo date('s'); ?>;
  var menit = <?php echo date('i'); ?>;
  var jam   = <?php echo date('H'); ?>;
   
  function clock()
  {
	  if (detik!=0 && detik%60==0) {
		  menit++;
		  detik=0;
	  }
	  second = detik;
	   
	  if (menit!=0 && menit%60==0) {
		  jam++;
		  menit=0;
	  }
	  minute = menit;
	   
	  if (jam!=0 && jam%24==0) {
		  jam=0;
	  }
	  hour = jam;
	   
	  if (detik<10){
		  second='0'+detik;
	  }
	  if (menit<10){
		  minute='0'+menit;
	  }
	   
	  if (jam<10){
		  hour='0'+jam;
	  }
	  waktu = hour+':'+minute+':'+second;
	   
	  document.getElementById("clock").innerHTML = waktu;
	  detik++;
  }

  setInterval(clock,1000);
</script>
<span id="clock"></span>
