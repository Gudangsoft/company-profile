<?php

namespace App\Controllers;
use App\Models\Mkategori;
class Kategori extends BaseController
{
    public function __construct(){
        $this->request= \Config\services::request();
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
        $this->Mkategori= new Mkategori();
    }
    public function tambah(){
        $this->Mkategori->tambah($this->request);
        session()->setflashdata('msg','simpan');
        return redirect()->to(base_url('paneladmin/kategori'));
    }
    public function edit(){
        $this->Mkategori->edit($this->request);
        session()->setflashdata('msg','edit');
        return redirect()->to(base_url('paneladmin/kategori'));
    }
    public function hapus(){
        $this->Mkategori->hapus($this->uri->getsegment(3));
        session()->setflashdata('msg','hapus');
        echo 'oke';
    }
}
