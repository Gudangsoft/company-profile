<?php

namespace App\Models;

use CodeIgniter\Model;

class Mmenu extends Model
{
	public function __construct(){
      parent::__construct();
      $db= \Config\Database::connect();
      $this->t_menu= $db->table('menu');
      $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
   }
   public function dataparent(){
		return $this->t_menu->where('parent_menu',1)->orderby('urutan_menu','asc')->get();
	}
	public function tambah($request){
		$d['parent_menu']= 1;
		$d['parentid_menu']= 0;
		$d['nama_menu']= $request->getpost('nama_menu');
		$d['url_menu']= $request->getpost('url_menu');
		$d['target_menu']= $request->getpost('target_menu');
		$d['urutan_menu']= $request->getpost('urutan_menu');
		$this->t_menu->insert($d);
	}
	public function edit($request){
		$d['nama_menu']= $request->getpost('nama_menu');
		$d['url_menu']= $request->getpost('url_menu');
		$d['target_menu']= $request->getpost('target_menu');
		$d['urutan_menu']= $request->getpost('urutan_menu');
		$this->t_menu->where('id_menu',$request->getpost('id_menu'))->update($d);
	}
	public function hapus($id_menu){
		$this->t_menu->where('id_menu',$id_menu)->delete();
		$this->t_menu->where('parentid_menu',$id_menu)->delete();
	}
	public function getone($id_menu){
		return $this->t_menu->where('id_menu',$id_menu)->get();
	}
	public function submenu($id_menu){
		return $this->t_menu->where('parent_menu',0)->where('parentid_menu',$id_menu)->orderby('urutan_menu','asc')->get();
	}
	public function addsub($request){
		$d['parent_menu']= 0;
		$d['parentid_menu']= $request->getpost('parentid_menu');
		$d['nama_menu']= $request->getpost('nama_menu');
		$d['url_menu']= $request->getpost('url_menu');
		$d['target_menu']= $request->getpost('target_menu');
		$d['urutan_menu']= $request->getpost('urutan_menu');
		$this->t_menu->insert($d);
	}
}
