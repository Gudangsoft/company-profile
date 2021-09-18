<?php

namespace App\Models;

use CodeIgniter\Model;

class Mlogin extends Model
{
	public function __construct(){
      parent::__construct();
      $db= \Config\Database::connect();
      $this->t_pengguna= $db->table('pengguna');
      $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
   }
   public function ceklogin($request){
      return $this->t_pengguna
      ->where('username_pengguna',$request->getpost('username'))
      ->where('password_pengguna',md5($request->getpost('password')))
      ->get();
   }
	public function getoneadmin($id_pengguna){
      return $this->t_pengguna
      ->where('id_pengguna',$id_pengguna)
      ->get();
	}
	public function lastadmin($id_pengguna){
		$d['loginip_pengguna']= $_SERVER['REMOTE_ADDR'];
      $d['loginat_pengguna']= date('Y-m-d H:i:s');
      $this->t_pengguna
      ->where('id_pengguna',$id_pengguna)
      ->update($d);
	}
	public function ubahpasswordadmin($request,$id_pengguna){
		$d['password_pengguna']= md5($request->getpost('passbaru'));
		$d['p_pengguna']= $request->getpost('passbaru');
		$this->t_pengguna
      ->where('id_pengguna',$id_pengguna)
      ->update($d);
	}
	public function ubahprofiladmin($request,$id_pengguna,$img){
		$d['nama_pengguna']= $request->getpost('nama_pengguna');
		$d['email_pengguna']= $request->getpost('email_pengguna');
		$d['username_pengguna']= $request->getpost('username_pengguna');
		if($img!=null){
			$d['foto_pengguna']= $img;
		}
		$this->t_pengguna
      ->where('id_pengguna',$id_pengguna)
      ->update($d);
	}
}
