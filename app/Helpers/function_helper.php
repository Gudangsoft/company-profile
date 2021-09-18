<?php
function jk($jk){
  if($jk=='L'){
    return 'Laki-Laki';
  }
  else if($jk=='P'){
    return 'Perempuan';
  }
} 
function toyoutube($string) {
  return preg_replace(
    "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
    "<iframe width=\"370\" height=\"220\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allowfullscreen></iframe>",
    $string
  );
}
function sub($bat,$text){
  $asli= strip_tags($text);
  return substr($asli, 0,$bat);
}
function aktif($value){
  if($value=='1'){
      return '<span class="badge badge-info">AKTIF</span>';
  }
  else{
      return '<span class="badge badge-danger">NONAKTIF</span>';
  }
}
function tampil($value){
  if($value=='0'){
      return '<span class="badge badge-info">TAMPIL</span>';
  }
  else{
      return '<span class="badge badge-danger">SPAM</span>';
  }
}
function slug($text){
    $string= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $text);
    $trim= trim($string);
    $pre_slug=strtolower(str_replace(" ", "-", $trim));
    $slug= $pre_slug.'.html';
    return $slug;
}
function random_color_part(){
    return str_pad(dechex(mt_rand(0,255)),2,'0', STR_PAD_LEFT);
}
function rancol(){
    return random_color_part().random_color_part().random_color_part();   
}
function hilangtitik($string){
    $hasil= str_replace(".", "", $string);
    return $hasil;
}
function format($format,$date){
    if($date!=null){
        return date($format,strtotime($date));
    }
}
function dmywaktu($date){
    if($date!=null){
        return date('d-m-Y H:i',strtotime($date));
    }
}
function dmy($date){
    if($date!=null){
        return date('d-m-Y',strtotime($date));
    }
}
function dmymiring($date){
    if($date!=null){
        return date('d/m/Y',strtotime($date));
    }
}
function ymd($date){
    if($date!=null){
        return date('Y-m-d',strtotime($date));
    }
}
function mdy($date){
    if($date!=null){
        return date('m/d/Y',strtotime($date));
    }
}
function jam($date){
    if($date!=null){
        return date('H:i',strtotime($date));
    }
}
function y($date){
    if($date!=null){
        return date('Y',strtotime($date));
    }
}
function randomkar($length){
    $data='1234567890AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSstuuUvVwWxXyYyZz';
    $string='';
    for($i=1;$i<=$length;$i++){
      $pos=rand(0,strlen($data)-1);
      $string.=$data{$pos};
    }
    return $string;
}
function random($length){
    $data='1234567890';
    $string='';
    for($i=1;$i<=$length;$i++){
      $pos=rand(0,strlen($data)-1);
      $string.=$data{$pos};
    }
    return $string;
}
function newcolor($no){
    $color= array(
    "#00B5B8","#f1c40f","#3498db","#2ecc71","#d35400","#3c8dbc","#00c0ef","#00a65a","#f56954","#27ae60","#1abc9c","#16a085",
    );
    if($no>0){
        return $color[$no];
    }
    else{
        return "#16a085";
    }
}
function foto($ukuran,$folder,$foto){
    $filegam= str_replace('file/'.$folder.'/', "", $foto);
    return 'file/'.$folder.'/'.$ukuran.'_'.$filegam;
}
function folder($ukuran,$folder,$foto){
  $filegam= str_replace('file/'.$folder.'/', "", $foto);
  return 'file/'.$folder.'/'.$ukuran.'/'.$filegam;
}
function hari($hari){
    $daftar_hari = array( 'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu' );
    $hariini = date('l', strtotime($hari)); 
    return $daftar_hari[$hariini];
}
function bulan($bulan){
    if($bulan=='01'){$namabulan="Januari";}
    elseif($bulan=='01'){$namabulan="Januari";}
    elseif($bulan=='02'){$namabulan="Februari";}
    elseif($bulan=='03'){$namabulan="Maret";}
    elseif($bulan=='04'){$namabulan="April";}
    elseif($bulan=='05'){$namabulan="Mei";}
    elseif($bulan=='06'){$namabulan="Juni";}
    elseif($bulan=='07'){$namabulan="Juli";}
    elseif($bulan=='08'){$namabulan="Agustus";}
    elseif($bulan=='09'){$namabulan="September";}
    elseif($bulan=='10'){$namabulan="Oktober";}
    elseif($bulan=='11'){$namabulan="November";}
    elseif($bulan=='12'){$namabulan="Desember";}
    return($namabulan);
}
function tgl($date){  
    if($date!=null){
        $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
        $date = strtotime($date);
        $tanggal = date ('j', $date);
        $bulan = $array_bulan[date('n',$date)];
        $tahun = date('Y',$date); 
        $result = $tanggal ." ". $bulan ." ". $tahun;       
        return($result);
    }
}
function rp($str){
  if($str==null){
    return 0;
  }
  else{
    $nomi= round($str);
    $jum = strlen($nomi);
    $jumtitik = ceil($jum/3);
    $balik = strrev($nomi);
    
    $awal = 0;
    $akhir = 3;
    for($x=0;$x<$jumtitik;$x++){
      $a[$x] = substr($balik,$awal,$akhir)."."; 
      $awal+=3;
    }
    $hasil = implode($a);
    $hasilakhir = strrev($hasil);
    $hasilakhir = substr($hasilakhir,1,$jum+$jumtitik);
          
    return "".$hasilakhir."";
  }
}
  function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
      $temp = penyebut($nilai - 10). " Belas";
    } else if ($nilai < 100) {
      $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
      $temp = " Seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
      $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
      $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
      $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
      $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
      $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
      $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
  }
 
  function terbilang($nilai) {
    if($nilai<0) {
      $hasil = "minus ". trim(penyebut($nilai));
    } else {
      $hasil = trim(penyebut($nilai));
    }         
    return $hasil.' Rupiah';
  }
