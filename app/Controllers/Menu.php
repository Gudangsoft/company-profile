<?php

namespace App\Controllers;
use App\Models\Mmenu;
class Menu extends BaseController
{
	public function __construct(){
      $this->request= \Config\services::request();
      $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
      $this->Mmenu= new Mmenu();
    }
	public function tambah(){
		$this->Mmenu->tambah($this->request);
		session()->setflashdata('msg','simpan');
      return redirect()->to(base_url('paneladmin/menu'));
	}
	public function edit(){
		$this->Mmenu->edit($this->request);
		session()->setflashdata('msg','edit');
      return redirect()->to(base_url('paneladmin/menu'));
	}
	public function hapus(){
		$this->Mmenu->hapus($this->uri->getsegment(3));
		session()->setflashdata('msg','hapus');
		echo "oke";
	}
//submenu
	public function loadsubmenu(){
      $d['submenu']= $this->Mmenu->submenu($this->uri->getsegment(3));
      echo view('paneladmin/menu/loadsub',$d);
	}
	public function tambahsubmenu(){
      $d['menu']= $this->Mmenu->getone($this->uri->getsegment(3))->getrow();
      echo view('paneladmin/menu/tambahsub',$d);
	}
	public function editsubmenu(){
      $d['menu']= $this->Mmenu->getone($this->uri->getsegment(3))->getrow();
      echo view('paneladmin/menu/editsub',$d);
	}
	public function addsub(){
		$this->Mmenu->addsub($this->request);
		echo "oke";
	}
	public function updatesub(){
		$this->Mmenu->edit($this->request);
		echo "oke";
	}
}
