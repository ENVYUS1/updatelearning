<?php
function getName($n) { 
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	$randomString = ''; 

	for ($i = 0; $i < $n; $i++) { 
		$index = rand(0, strlen($characters) - 1); 
		$randomString .= $characters[$index]; 
	} 

	return $randomString; 
} 



date_default_timezone_set('asia/jakarta');


function dateEng($date){
	$dateConvert = str_replace('/', '-', $date);
	$newDate = date('Y-m-d', strtotime($dateConvert));
	return $newDate; 
}
function dateTime($date, $sts){
    $dateConvert = str_replace('/', '-', $date);
    if($sts == true){
        $newDate = date('d M Y, H:i', strtotime($dateConvert));
    }else{
        $newDate = date('d M Y', strtotime($dateConvert));
    }
    return $newDate; 
}

function dateIna($date){
	$dateConvert = str_replace('-', '/', $date);
	$newDate = date('d/m/Y', strtotime($dateConvert));
	return $newDate;  
}

function getDay($date){
    $dateConvert = str_replace('-', '/', $date);
    $newDate = date('D', strtotime($dateConvert));
    return $newDate;  
}

function getDayTime($date){
    $dateConvert = str_replace('-', '/', $date);
    $newDate = date('D, H : i', strtotime($dateConvert));
    return $newDate;  
}

function getWeeks($date, $rollover)
{
    $cut = substr($date, 0, 8);
    $daylen = 86400;

    $timestamp = strtotime($date);
    $first = strtotime($cut . "00");
    $elapsed = ($timestamp - $first) / $daylen;

    $weeks = 1;

    for ($i = 1; $i <= $elapsed; $i++)
    {
        $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
        $daytimestamp = strtotime($dayfind);

        $day = strtolower(date("l", $daytimestamp));

        if($day == strtolower($rollover))  $weeks ++;
    }

    return $weeks;
}

function formatBytes($bytes, $precision = 2) { 
	$units = array('B', 'KB', 'MB', 'GB', 'TB'); 
	
	$bytes = max($bytes, 0); 
	$pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
	$pow = min($pow, count($units) - 1); 
	
	$bytes /= pow(1024, $pow); 
	
	return round($bytes, $precision) . ' ' . $units[$pow]; 
} 

function selisihHari($mulai, $selesai){
    $selesai        = strtotime($selesai);
    $mulai          = strtotime($mulai);
    $waktu          = ($selesai - $mulai);
    $hari           = floor($waktu /(60*60*24));
    return $hari;
}

function sisaHari($selesai){
	$tgl = strtotime($selesai);
	$diff= $tgl-time();
	$days = floor($diff/(60*60*24));
	return $days;
}

function waktuIstirahat($istirahat){
	$default 			= strtotime('00:00:00');
	$waktu_istirahat 	= strtotime($istirahat);
	$istirahat 			= ($waktu_istirahat - $default);
	$jam_izin			= floor($istirahat / (60 * 3600));
	$menit_istirahat 	= $istirahat - $jam_izin * floor(60 * 60);
	$hasil_istrirahat 	= $menit_istirahat / 60;	
	return $hasil_istrirahat;
}

function waktuKerja($mulai, $selesai){
	$waktu_sampai	= strtotime($selesai);
	$waktu_dari		= strtotime($mulai);
	$waktu 			= ($waktu_sampai - $waktu_dari);
	$jam			= floor($waktu / (60 * 3600));
	$menit 			= $waktu - $jam * floor(60 * 60);
	$hasil_menit	= $menit / 60 ; 
	return $hasil_menit;
}

function angkaKeBulan($number){
	$bulan = "Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";
	$array = explode(" ", $bulan);
	return $array[$number - 1];
}


function get_time_difference_php($created_time)
{

    $str = strtotime($created_time);
    $today = strtotime(date('Y-m-d H:i:s'));

    // It returns the time difference in Seconds...
    $time_differnce = $today-$str;

    // To Calculate the time difference in Years...
    $years = 60*60*24*365;

    // To Calculate the time difference in Months...
    $months = 60*60*24*30;

    // To Calculate the time difference in Days...
    $days = 60*60*24;

    // To Calculate the time difference in Hours...
    $hours = 60*60;

    // To Calculate the time difference in Minutes...
    $minutes = 60;

    if(intval($time_differnce/$years) > 1)
    {
        return intval($time_differnce/$years)." tahun yang lalu";
    }
    else if(intval($time_differnce/$years) > 0)
    {
        return intval($time_differnce/$years)." tahun yang lalu";
    }
    else if(intval($time_differnce/$months) > 1)
    {
        return intval($time_differnce/$months)." bulan yang lalu";
    }
    else if(intval(($time_differnce/$months)) > 0)
    {
        return intval(($time_differnce/$months))." bulan yang lalu";
    }
    else if(intval(($time_differnce/$days)) > 1)
    {
        return intval(($time_differnce/$days))." hari yang lalu";
    }
    else if (intval(($time_differnce/$days)) > 0) 
    {
        return intval(($time_differnce/$days))." hari yang lalu";
    }
    else if (intval(($time_differnce/$hours)) > 1) 
    {
        return intval(($time_differnce/$hours))." jam yang lalu";
    }
    else if (intval(($time_differnce/$hours)) > 0) 
    {
        return intval(($time_differnce/$hours))." jam yang lalu";
    }
    else if (intval(($time_differnce/$minutes)) > 1) 
    {
        return intval(($time_differnce/$minutes))." menit yang lalu";
    }
    else if (intval(($time_differnce/$minutes)) > 0) 
    {
        return intval(($time_differnce/$minutes))." menit yang lalu";
    }
    else if (intval(($time_differnce)) > 1) 
    {
        return intval(($time_differnce))." detik yang lalu";
    }else
    {
        return "beberapa detik yang lalu";
    }
}
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
     $ipaddress = getenv('HTTP_FORWARDED');
 else if(getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR');
else
    $ipaddress = 'UNKNOWN';
return $ipaddress;
}


function myMonth($tanggal)
{
    $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $bulan[ (int)$split[1] ];
}

function firstSentence($string) {
      $sentences = explode(" ", $string,2);
      $initials=NULL;
      foreach ($sentences as $sentence) {
          $initials.=$sentence[0];
      }
      return $initials;
}

