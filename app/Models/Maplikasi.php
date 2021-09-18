<?php

namespace App\Models;

use CodeIgniter\Model;

class Maplikasi extends Model
{
	public function __construct(){
		parent::__construct();
		$db= \Config\Database::connect();
		$this->t_aplikasi= $db->table('aplikasi');
		$this->t_pengunjung= $db->table('pengunjung');
		$this->uri= new \CodeIgniter\HTTP\URI(uri_string());
	}
   public function data(){
		return $this->t_aplikasi->get();
	}
	public function simpan($request,$fileicon,$filelogo){
		$d['nama_app']= $request->getpost('nama_app');
		$d['deskripsi_app']= $request->getpost('deskripsi_app');
		if($fileicon!='kosong'){
			$d['icon_app']= $fileicon;
		}
		if($filelogo!='kosong'){
			$d['logo_app']= $filelogo;
		}
		$d['widthlogo_app']= $request->getpost('widthlogo_app');
		$d['heightlogo_app']= $request->getpost('heightlogo_app');
		$d['nohp_app']= $request->getpost('nohp_app');
		$d['email_app']= $request->getpost('email_app');
		$d['alamat_app']= $request->getpost('alamat_app');
		$d['atasnamaemail_app']= $request->getpost('atasnamaemail_app');
		$d['alamatemail_app']= $request->getpost('alamatemail_app');
		$d['protocol_app']= $request->getpost('protocol_app');
		$d['smtphost_app']= $request->getpost('smtphost_app');
		$d['smtpuser_app']= $request->getpost('smtpuser_app');
		$d['smtppass_app']= $request->getpost('smtppass_app');
		$d['smtpport_app']= $request->getpost('smtpport_app');
		$d['fb_app']= $request->getpost('fb_app');
		$d['ig_app']= $request->getpost('ig_app');
		$d['yt_app']= $request->getpost('yt_app');
		$d['tw_app']= $request->getpost('tw_app');
		$d['gmap_app']= $request->getpost('gmap_app');
		$this->t_aplikasi->update($d);
	}
	public function pengunjung(){
		$ip= $_SERVER['REMOTE_ADDR'];
		$tgl= date('Y-m-d');
		$cek= $this->t_pengunjung->where('ip_pengunjung',$ip)->where('DATE(tglinput_pengunjung)',$tgl)->get();
		if($cek->getRowCount() <= 0){
			$d['ip_pengunjung']= $ip;
			$d['tglinput_pengunjung']= date('Y-m-d H:i:s');
			$this->t_pengunjung->insert($d);
		}
	}
	public function totalpengunjung(){
		return $this->t_pengunjung->select('count(*) as jumpeng')->get();
	}
	public function pengunjungtgl($tgl){
		return $this->t_pengunjung->where('DATE(tglinput_pengunjung)',$tgl)->get();
	}
}
